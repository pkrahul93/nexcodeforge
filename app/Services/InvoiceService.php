<?php

namespace App\Services;

use App\Models\Invoice;
use App\Mail\InvoiceGenerated;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class InvoiceService
{
    /**
     * Generate PDF for given invoice (returns binary)
     */
    public function generatePdf(Invoice $invoice, string $view = 'backend.invoices.pdf'): string
    {
        // Ensure invoice has fresh relations
        $invoice->load('items');

        $pdf = Pdf::loadView($view, compact('invoice'))
                  ->setPaper('a4', 'portrait');

        return $pdf->output();
    }

    /**
     * Store generated PDF to storage and update invoice.pdf_path
     */
    public function storePdf(Invoice $invoice, ?string $filename = null, string $disk = 'public'): string
    {
        $filename = $filename ?? 'invoices/invoice-'.$invoice->number.'.pdf';
        $pdfBinary = $this->generatePdf($invoice);

        Storage::disk($disk)->put($filename, $pdfBinary);

        $invoice->update(['pdf_path' => $filename]);

        return $filename;
    }

    /**
     * Send invoice email with attached PDF. Returns bool success.
     */
    public function sendEmail(Invoice $invoice, ?string $pdfBinary = null): bool
    {
        if (empty($invoice->customer_email)) {
            return false;
        }

        $pdfBinary = $pdfBinary ?? $this->generatePdf($invoice);

        Mail::to($invoice->customer_email)
            ->send(new InvoiceGenerated($invoice, $pdfBinary));

        return true;
    }
}
