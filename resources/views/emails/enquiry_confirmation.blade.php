<!DOCTYPE html>
<html>

<body>
    <h2>Hi {{ $enquiry->name }},</h2>
    <p>Thanks for reaching out to <strong>NexCodeForge</strong>! We’ve received your enquiry and will contact you soon.
    </p>
    <p><strong>Subject:</strong> {{ $enquiry->subject ?? '—' }}</p>
    <p><strong>Your Message:</strong></p>
    <p>{{ $enquiry->message ?? 'No message provided.' }}</p>
    <p>Best regards,<br>The NexCodeForge Team</p>

</body>

</html>
