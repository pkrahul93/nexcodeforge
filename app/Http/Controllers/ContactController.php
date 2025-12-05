<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guest.contact');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mobile'  => 'required|digits:10',
            'message' => 'required|string',
        ]);

        // Store in database
        $contact = Contact::create($validated);

        // Send email to user
        Mail::send('emails.contact_confirmation', ['contact' => $contact], function ($message) use ($contact) {
            $message->to($contact->email)
                ->subject('Thank You for Contacting NexCodeForge');
        });

        // Send email to admin
        Mail::send('emails.enquiry_admin', ['enquiry' => $contact], function ($message) {
            $message->to('support@nexcodeforge.com')
                ->cc('pkrahul93@gmail.com')
                ->subject('New Contact Enquiry Received - NexCodeForge');
        });

        // Redirect or return response
        return redirect()->back()->with('success', 'Your message has been submitted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully!');
    }

}
