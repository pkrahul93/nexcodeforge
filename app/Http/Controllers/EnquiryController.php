<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function index()
    {
        return view('guest.enquiry');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'mobile'   => 'required|string|max:15',
            'enq_for'  => 'nullable|string|max:150',
            'subject'  => 'nullable|string|max:255',
            'website'  => 'nullable|url|max:255',
            'document' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'message'  => 'nullable|string|max:2000',
        ]);

        // Handle document upload
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/enquiries'), $filename);
            $validated['document'] = $filename;
        }

        // Create enquiry
        $enquiry = Enquiry::create($validated);

        // Send email to user
        Mail::send('emails.enquiry_confirmation', ['enquiry' => $enquiry], function ($message) use ($enquiry) {
            $message->to($enquiry->email)
                ->subject('Thank You for Contacting NexCodeForge');
        });

        // Send email to admin
        Mail::send('emails.enquiry_admin', ['enquiry' => $enquiry], function ($message) {
            $message->to('support@nexcodeforge.com')
                ->cc('pkrahul93@gmail.com')
                ->subject('New Enquiry Received - NexCodeForge');
        });

        return redirect()->back()->with('success', 'Thank you for contacting us! We’ll reach out soon.');
    }
}
