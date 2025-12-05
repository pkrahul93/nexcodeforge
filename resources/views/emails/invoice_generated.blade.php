<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoice->number }}</title>
    <style>
        /* body { font-family: Arial, sans-serif; color: #333; } */
        body { font-family: Arial, sans-serif; background: #f7f9fc; color: #333; margin: 0; padding: 0; }
        .container { max-width: 750px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .container { padding: 20px; }
        .header { background: #007bff; color: #fff; padding: 12px 18px; border-radius: 5px 5px 0 0; }
        .content { border: 1px solid #ddd; border-top: none; padding: 18px; border-radius: 0 0 5px 5px; }
        .footer { font-size: 13px; color: #777; margin-top: 15px; }
        .badge { display: inline-block; padding: 4px 8px; border-radius: 4px; color: #fff; font-size: 13px; }
        .bg-warning { background-color: #ffc107; }
        .bg-info { background-color: #17a2b8; }
        .bg-success { background-color: #28a745; }
        .bg-secondary { background-color: #6c757d; }
        .highlight-box {
            background: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin-top: 10px;
        }
        p { margin: 8px 0; }
    </style>
</head>
<body>
<div class="container">

    {{-- HEADER --}}
    <div class="header">
        <h2>Your Invoice Is Ready</h2>
    </div>

    {{-- CONTENT --}}
    <div class="content">
        <p><strong>Dear {{ $invoice->customer_name }},</strong></p>

        <p>Your invoice <strong>#{{ $invoice->number }}</strong> dated
            <strong>{{ $invoice->issue_date->format('d M Y') }}</strong>
            has been generated successfully.
        </p>

        <p><strong>Total Amount:</strong> {{ number_format($invoice->total, 2) }} {{ $invoice->currency }}</p>

        <p><strong>Status:</strong>
            <span class="badge bg-{{
                $invoice->status === 'draft' ? 'warning' :
                ($invoice->status === 'sent' ? 'info' :
                ($invoice->status === 'paid' ? 'success' : 'secondary'))
            }}">
                {{ ucfirst($invoice->status) }}
            </span>
        </p>

        <p>The PDF copy of your invoice is attached to this email.</p>

        @if($invoice->notes)
            <p><strong>Additional Notes:</strong></p>
            <div class="highlight-box">
                {!! nl2br(e($invoice->notes)) !!}
            </div>
        @endif

        <p style="margin-top: 15px;">If you have any questions or need support, feel free to reply to this message.</p>

        <p><strong>Thank you,<br>NexCodeForge</strong></p>
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <p>This is an automated message regarding Invoice #{{ $invoice->number }}.</p>
    </div>

</div>
</body>
</html>
