<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Update - #{{ $ticket->ticket_no }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; background: #f7f9fc; }
        .container { padding: 20px; max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .header { background: #007bff; color: #fff; padding: 15px; border-radius: 8px 8px 0 0; text-align: center; }
        .content { padding: 20px; }
        .footer { font-size: 13px; color: #777; margin-top: 20px; text-align: center; border-top: 1px solid #eee; padding-top: 10px; }
        .badge { display: inline-block; padding: 4px 8px; border-radius: 4px; color: #fff; font-size: 13px; font-weight: bold; }
        .bg-warning { background-color: #ffc107; }
        .bg-info { background-color: #17a2b8; }
        .bg-success { background-color: #28a745; }
        .bg-secondary { background-color: #6c757d; }
        .message-box { background: #f8f9fa; border-left: 4px solid #007bff; padding: 12px; border-radius: 4px; margin-top: 10px; }
        .btn { background: #007bff; color: #fff; padding: 10px 15px; border-radius: 5px; text-decoration: none; display: inline-block; margin-top: 15px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Ticket Update - #{{ $ticket->ticket_no }}</h2>
    </div>

    <div class="content">
        <p>Dear <strong>{{ $ticket->name }}</strong>,</p>

        <p>Your support ticket status has been updated to:</p>

        <p>
            <span class="badge bg-{{ $ticket->status === 'open' ? 'warning' : ($ticket->status === 'in_progress' ? 'info' : ($ticket->status === 'resolved' ? 'success' : 'secondary')) }}">
                {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
            </span>
        </p>

        @if($ticket->admin_message)
            <div class="message-box">
                <strong>Message from Support:</strong><br>
                {{ $ticket->admin_message }}
            </div>
        @endif

        <p style="margin-top: 20px;">You can check your ticket status anytime using your Ticket Number on our <strong>Maintenance & Support</strong> page.</p>

        <a href="{{ url('/maintenance-support') }}" class="btn">Check Ticket Status</a>

        <p style="margin-top: 25px;">Thank you for your patience.<br>
        <strong>— Support Team</strong></p>
    </div>

    <div class="footer">
        <p>This is an automated notification from NexCodeForge Support System. Please do not reply to this email.</p>
    </div>
</div>
</body>
</html>
