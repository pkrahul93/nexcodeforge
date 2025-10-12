<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Ticket Update - #{{ $ticket->ticket_no }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { padding: 20px; }
        .header { background: #007bff; color: #fff; padding: 10px 15px; border-radius: 5px 5px 0 0; }
        .content { border: 1px solid #ddd; border-top: none; padding: 15px; border-radius: 0 0 5px 5px; }
        .footer { font-size: 13px; color: #777; margin-top: 15px; }
        .badge { display: inline-block; padding: 4px 8px; border-radius: 4px; color: #fff; font-size: 13px; }
        .bg-warning { background-color: #ffc107; }
        .bg-info { background-color: #17a2b8; }
        .bg-success { background-color: #28a745; }
        .bg-secondary { background-color: #6c757d; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Ticket Update Notification</h2>
    </div>
    <div class="content">
        <p><strong>Ticket No:</strong> #{{ $ticket->ticket_no }}</p>
        <p><strong>Customer Name:</strong> {{ $ticket->name }}</p>
        <p><strong>Email:</strong> {{ $ticket->email }}</p>
        <p><strong>Mobile:</strong> {{ $ticket->mobile }}</p>
        <p><strong>Subject:</strong> {{ $ticket->subject ?? '—' }}</p>
        <p><strong>Status:</strong>
            <span class="badge bg-{{ $ticket->status === 'open' ? 'warning' : ($ticket->status === 'in_progress' ? 'info' : ($ticket->status === 'resolved' ? 'success' : 'secondary')) }}">
                {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
            </span>
        </p>

        @if($ticket->admin_message)
            <p><strong>Message Sent to User:</strong></p>
            <p style="background: #f8f9fa; border-left: 4px solid #007bff; padding: 10px;">{{ $ticket->admin_message }}</p>
        @endif

        <p><strong>Updated By:</strong> Admin</p>
        <p><strong>Updated At:</strong> {{ now()->format('d M Y, h:i A') }}</p>
    </div>

    <div class="footer">
        <p>This is an automated notification confirming the admin’s update to ticket #{{ $ticket->ticket_no }}.</p>
    </div>
</div>
</body>
</html>
