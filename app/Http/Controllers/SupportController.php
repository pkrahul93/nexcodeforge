<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use App\Mail\SupportTicketMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SupportController extends Controller
{
    public function index()
    {
        return view('guest.maintenance-support');
    }

    // ✅ Store new ticket
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'mobile'    => 'required|string|max:15',
            'subject'   => 'nullable|string|max:255',
            'message'   => 'required|string',
            'priority'  => 'required|in:low,medium,high',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $validated['ticket_no'] = 'TKT-' . strtoupper(Str::random(8));

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('tickets', 'public');
        }

        $ticket = SupportTicket::create($validated);

        // Send email to customer
        // Mail::to($ticket->email)->send(new SupportTicketMail($ticket, false));

        // // Send email to admin
        // Mail::to('support@nexcodeforge.com')->send(new SupportTicketMail($ticket, true));

        return redirect()->route('maintenance-support')
            ->with('ticket_success', true)
            ->with('ticket_no', $ticket->ticket_no)
            ->with('ticket_name', $ticket->name)
            ->with('ticket_email', $ticket->email);
    }

    // ✅ Check ticket status
    public function checkStatus(Request $request)
    {
        $request->validate([
            'ticket_no' => 'required|string|max:50'
        ]);

        $ticket = SupportTicket::where('ticket_no', $request->ticket_no)->first();

        if (!$ticket) {
            return redirect()->route('maintenance-support')->with('error', 'No ticket found with that number.');
        }

        return redirect()->route('maintenance-support')->with('ticket_status', $ticket);
    }
}
