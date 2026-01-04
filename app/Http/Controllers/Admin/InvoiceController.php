<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Models\Invoice;
use App\Repositories\InvoiceRepository;
use App\Services\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    protected InvoiceRepository $repo;
    protected InvoiceService $service;

    public function __construct(InvoiceRepository $repo, InvoiceService $service)
    {
        $this->repo = $repo;
        $this->service = $service;

        // $this->middleware('auth'); // adjust your admin middleware as needed
    }

    /**
     * Show list of invoices (simple index).
     */
    public function index()
    {
        // Basic pagination — adjust query as needed, add filters
        $invoices = Invoice::query()->orderBy('issue_date', 'desc')->paginate(20);
        return view('backend.invoices.index', compact('invoices'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        // You can pass customers, products, templates etc. to the view
        return view('backend.invoices.create');
    }

    /**
     * Store a newly created invoice, optionally generate/save PDF and send email.
     */
    public function store(StoreInvoiceRequest $request)
    {
        // dd($request->all());
        $payload = $request->validated();
        $payload['user_id'] = $request->user()->id ?? null;
        $payload['number'] = Invoice::makeNumber();

        // Create invoice + items (repo handles totals)
        $invoice = $this->repo->createWithItems($payload);

        // Optionally save PDF to storage (public disk by default)
        if ($request->boolean('save_pdf')) {
            $this->service->storePdf($invoice);
        }

        // Optionally send email to customer
        if ($request->boolean('send_email') && $invoice->customer_email) {
            $this->service->sendEmail($invoice);
            // You may want to set status to 'sent'
            $invoice->update(['status' => 'sent']);
        }

        // If user wanted immediate download
        if ($request->boolean('download')) {
            $pdfBinary = $this->service->generatePdf($invoice);
            return response($pdfBinary, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="invoice-' . $invoice->number . '.pdf"'
            ]);
        }

        return redirect()
            ->route('invoices.show', $invoice->id)
            ->with('success', 'Invoice created successfully.');
    }

    /**
     * Show invoice details page.
     */
    public function show($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        return view('backend.invoices.show', compact('invoice'));
    }

    /**
     * Show invoice details PDF page.
     */
    public function showPdf($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        return view('backend.invoices.pdf', compact('invoice'));
    }


    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        return view('backend.invoices.edit', compact('invoice'));
    }

    /**
     * Update invoice with new items / meta.
     */
    public function update(StoreInvoiceRequest $request, $id)
    {
        $payload = $request->validated();

        $invoice = Invoice::with('items')->findOrFail($id);

        $invoice = $this->repo->updateWithItems($invoice, $payload);

        if ($request->boolean('save_pdf')) {
            $this->service->storePdf($invoice);
        }

        if ($request->boolean('send_email') && $invoice->customer_email) {
            $this->service->sendEmail($invoice);
            $invoice->update(['status' => 'sent']);
        }

        return redirect()
            ->route('invoices.show', $invoice->id)
            ->with('success', 'Invoice updated successfully.');
    }

    /**
     * Delete invoice (and items because of cascade).
     */
    public function destroy($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        // Remove stored PDF if exists
        if ($invoice->pdf_path) {
            try {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($invoice->pdf_path);
            } catch (\Throwable $e) {
                // ignore storage delete errors — log if you want
            }
        }

        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted.');
    }

    /**
     * Return PDF for viewing in browser (stream).
     */
    public function viewPdf($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        $pdfBinary = $this->service->generatePdf($invoice);

        return response($pdfBinary, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="invoice-' . $invoice->number . '.pdf"'
        ]);
    }

    /**
     * Force download the PDF.
     */
    public function downloadPdf($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        // If saved to storage, stream from disk for efficiency
        if ($invoice->pdf_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($invoice->pdf_path)) {
            return \Illuminate\Support\Facades\Storage::disk('public')->download($invoice->pdf_path);
        }

        $pdfBinary = $this->service->generatePdf($invoice);

        return response($pdfBinary, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="invoice-' . $invoice->number . '.pdf"'
        ]);
    }

    /**
     * Trigger sending email for an existing invoice.
     */
    public function sendEmail(Request $request, $id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        if (empty($invoice->customer_email)) {
            return back()->with('error', 'No customer email present.');
        }

        $sent = $this->service->sendEmail($invoice);

        if ($sent) {
            $invoice->update(['status' => 'sent']);
            return back()->with('success', 'Invoice emailed successfully.');
        }

        return back()->with('error', 'Failed to send email.');
    }
}
