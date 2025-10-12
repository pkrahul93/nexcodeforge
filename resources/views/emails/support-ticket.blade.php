<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; color: #333; padding: 20px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; }
        .header { background: #007bff; color: #fff; padding: 10px 15px; border-radius: 8px 8px 0 0; }
        .content { padding: 15px; }
        .footer { margin-top: 20px; font-size: 13px; color: #777; text-align: center; }
        .ticket-no { font-weight: bold; color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @if($isAdmin)
                <h2>New Support Ticket Received</h2>
            @else
                <h2>Support Ticket Confirmation</h2>
            @endif
        </div>
        <div class="content">
            @if($isAdmin)
                <p>Hello Admin,</p>
                <p>A new support ticket has been raised. Below are the details:</p>
            @else
                <p>Dear {{ $ticket->name }},</p>
                <p>Thank you for reaching out to NexCodeForge Support. Your ticket has been received successfully.</p>
            @endif

            <p><strong>Ticket Number:</strong> <span class="ticket-no">{{ $ticket->ticket_no }}</span></p>
            <p><strong>Name:</strong> {{ $ticket->name }}</p>
            <p><strong>Email:</strong> {{ $ticket->email }}</p>
            <p><strong>Mobile:</strong> {{ $ticket->mobile }}</p>
            <p><strong>Priority:</strong> {{ ucfirst($ticket->priority) }}</p>
            <p><strong>Subject:</strong> {{ $ticket->subject ?? 'N/A' }}</p>
            <p><strong>Message:</strong></p>
            <blockquote>{{ $ticket->message }}</blockquote>

            @if(!$isAdmin)
                <p>Our team will review your request and get back to you soon.</p>
            @endif
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} NexCodeForge. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
