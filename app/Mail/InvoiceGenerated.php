<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceGenerated extends Mailable
{
    use Queueable, SerializesModels;

    public Invoice $invoice;
    public string $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct(Invoice $invoice, string $pdfBinary)
    {
        $this->invoice = $invoice;
        $this->pdf = $pdfBinary;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Invoice #' . $this->invoice->number)
                    ->view('emails.invoice_generated')
                    ->attachData(
                        $this->pdf,
                        'invoice-' . $this->invoice->number . '.pdf',
                        ['mime' => 'application/pdf']
                    );
    }
}
