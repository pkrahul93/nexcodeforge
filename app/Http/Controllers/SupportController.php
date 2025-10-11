<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        return view('guest.maintenance-support');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'mobile'    => 'required|string|max:15',
            'subject'   => 'nullable|string|max:255',
            'message'   => 'required|string',
            'priority'  => 'required|in:low,medium,high',
            'attachment'=> 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('tickets', 'public');
        }

        SupportTicket::create($validated);

        return redirect()->route('maintenance-support')
            ->with('success', 'Your support ticket has been submitted successfully. Our team will contact you soon.');
    }
}
