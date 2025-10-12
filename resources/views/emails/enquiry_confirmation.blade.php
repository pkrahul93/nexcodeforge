<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquiry Confirmation - NexCodeForge</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f9fc; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .header { background: #007bff; color: #fff; padding: 15px; text-align: center; }
        .content { padding: 20px; line-height: 1.6; }
        .footer { background: #f1f1f1; font-size: 13px; color: #666; text-align: center; padding: 10px; border-top: 1px solid #ddd; }
        .highlight { background: #f8f9fa; border-left: 4px solid #007bff; padding: 10px; border-radius: 5px; margin: 10px 0; }
        .btn { display: inline-block; background: #007bff; color: #fff !important; padding: 10px 15px; border-radius: 5px; text-decoration: none; margin-top: 15px; }
        strong { color: #000; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Enquiry Confirmation</h2>
    </div>
    <div class="content">
        <p>Hi <strong>{{ $enquiry->name }}</strong>,</p>

        <p>Thank you for reaching out to <strong>NexCodeForge</strong>! We’ve received your enquiry and our team will get back to you soon.</p>

        <p><strong>Subject:</strong> {{ $enquiry->subject ?? '—' }}</p>

        <div class="highlight">
            <strong>Your Message:</strong><br>
            {{ $enquiry->message ?? 'No message provided.' }}
        </div>

        <p>We appreciate your interest and will ensure a prompt response.</p>

        <a href="{{ url('/') }}" class="btn">Visit Our Website</a>

        <p style="margin-top: 25px;">Best regards,<br><strong>The NexCodeForge Team</strong></p>
    </div>

    <div class="footer">
        <p>This is an automated acknowledgement email from NexCodeForge. Please do not reply to this message.</p>
    </div>
</div>
</body>
</html>
