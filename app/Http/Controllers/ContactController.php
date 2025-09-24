<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

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
