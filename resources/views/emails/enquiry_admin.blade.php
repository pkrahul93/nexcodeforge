<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Enquiry Received - NexCodeForge</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f9fc; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .header { background: #007bff; color: #fff; padding: 15px; text-align: center; }
        .content { padding: 20px; line-height: 1.6; }
        .footer { background: #f1f1f1; font-size: 13px; color: #666; text-align: center; padding: 10px; border-top: 1px solid #ddd; }
        .highlight { background: #f8f9fa; border-left: 4px solid #007bff; padding: 10px; border-radius: 5px; margin: 10px 0; }
        strong { color: #000; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>New Enquiry Received</h2>
    </div>

    <div class="content">
        <p>Hello Admin,</p>

        <p>A new enquiry has been submitted through the <strong>NexCodeForge</strong> website. Below are the details:</p>

        <div class="highlight">
            <p><strong>Name:</strong> {{ $enquiry->name }}</p>
            <p><strong>Email:</strong> {{ $enquiry->email }}</p>
            <p><strong>Mobile:</strong> {{ $enquiry->mobile ?? '—' }}</p>
            <p><strong>Subject:</strong> {{ $enquiry->subject ?? '—' }}</p>
            <p><strong>Website:</strong> {{ $enquiry->website ?? '—' }}</p>
            <p><strong>Document:</strong>
                @if(!empty($enquiry->document))
                    <a href="{{ asset('storage/' . $enquiry->document) }}" target="_blank">View Attachment</a>
                @else
                    No attachment
                @endif
            </p>
            <p><strong>Message:</strong><br>{{ $enquiry->message ?? 'No message provided.' }}</p>
        </div>

        <p>Please follow up with the customer as soon as possible.</p>
        <p>Best regards,<br><strong>NexCodeForge System</strong></p>
    </div>

    <div class="footer">
        <p>This is an automated notification email from the NexCodeForge system.</p>
    </div>
</div>
</body>
</html>
