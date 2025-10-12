<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\TicketUpdateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SupportTicketController extends Controller
{
    public function index()
    {
        $tickets = SupportTicket::latest()->paginate(15);
        return view('backend.support.index', compact('tickets'));
    }

    public function pendingTickets()
    {
        $tickets = SupportTicket::where('status', '!=', 'resolved')->latest()->paginate(15);
        return view('backend.support.pending', compact('tickets'));
    }

    public function resolvedTickets()
    {
        $tickets = SupportTicket::where('status', 'resolved')->latest()->paginate(15);
        return view('backend.support.resolved', compact('tickets'));
    }

    public function showTicket($id)
    {
        $ticket = SupportTicket::findOrFail($id);
        return view('backend.support.show', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:open,in_progress,resolved',
            'admin_message' => 'nullable|string|max:2000',
        ]);

        $ticket = SupportTicket::findOrFail($id);

        // Update ticket
        $ticket->status = $request->status;
        if ($request->status === 'resolved') {
            $ticket->resolved_at = now();
        }
        $ticket->admin_message = $request->admin_message;
        $ticket->save();

        // Send email to customer
        // Mail::to($ticket->email)->send(new TicketUpdateMail($ticket));

        // // Send email to admin
        // Mail::to(config('mail.from.address'))->send(new \App\Mail\AdminTicketUpdateMail($ticket));

        return redirect()->back()->with('success', 'Ticket updated and emails sent successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);

        $ticket->status = $request->status;

        // If status is being set to "resolved", record the current time
        if ($request->status === 'resolved') {
            $ticket->resolved_at = now();
        } else {
            // Optional: clear the resolved_at if status changes back
            $ticket->resolved_at = null;
        }

        $ticket->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $ticket = SupportTicket::findOrFail($id);
        if ($ticket->attachment && Storage::disk('public')->exists($ticket->attachment)) {
            Storage::disk('public')->delete($ticket->attachment);
        }
        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket deleted successfully.');
    }
}
