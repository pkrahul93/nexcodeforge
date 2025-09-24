<?php

namespace App\Http\Controllers;
use App\Models\Inquiry; // Make sure you have an Inquiry model
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // Save to database (if using a model)
        Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        // Flash success message
        return back()->with('success', 'Your inquiry has been sent successfully!');
    }
}

