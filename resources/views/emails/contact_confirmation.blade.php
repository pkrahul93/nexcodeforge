<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact Confirmation - NexCodeForge</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    /* Minimal, email-safe styling */
    body { font-family: Arial, Helvetica, sans-serif; background: #f7f9fc; color: #333; margin:0; padding:20px; }
    .wrap { max-width:600px; margin:0 auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 0 10px rgba(0,0,0,0.05); }
    .header { background:#0d6efd; color:#fff; padding:18px; text-align:center; }
    .content { padding:20px; line-height:1.6; }
    .highlight { background:#f8f9fa; border-left:4px solid #0d6efd; padding:12px; border-radius:6px; margin:12px 0; word-break:break-word; }
    .btn { display:inline-block; background:#0d6efd; color:#fff !important; padding:10px 14px; border-radius:6px; text-decoration:none; margin-top:12px; }
    .meta { font-size:14px; color:#555; margin:6px 0; }
    .footer { background:#f1f1f1; font-size:13px; color:#666; text-align:center; padding:12px; border-top:1px solid #e0e0e0; }
    @media (max-width:420px) { .content { padding:14px } .header h2 { font-size:18px } }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="header">
      <h2>Contact Confirmation</h2>
    </div>

    <div class="content">
      <p>Hi <strong>{{ $contact->name }}</strong>,</p>

      <p>Thanks for contacting <strong>NexCodeForge</strong> — we received your enquiry and one of our team members will reply soon.</p>

      <div class="highlight">
        <strong>Your Message</strong><br>
        {!! nl2br(e($contact->message ?? 'No message provided.')) !!}
      </div>

      <p class="meta"><strong>Subject / Type:</strong> {{ $contact->subject ?? 'General Enquiry' }}</p>
      <p class="meta"><strong>Email:</strong> {{ $contact->email }}</p>
      <p class="meta"><strong>Mobile:</strong> {{ $contact->mobile }}</p>

      <a href="{{ url('/') }}" class="btn">Visit Our Website</a>

      <p style="margin-top:18px;">Best regards,<br><strong>The NexCodeForge Team</strong></p>
    </div>

    <div class="footer">
      <p>This is an automated acknowledgement email from NexCodeForge. Please do not reply to this message. For support, email: <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a></p>
    </div>
  </div>
</body>
</html>
