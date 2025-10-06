<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function contacts()
    {
        $enquries = Contact::where('status', '0')
        ->where('enquiry_type', '1')
        ->latest()
        ->get()
        ->toArray();

        return view('backend.inquiries.contacts', compact('enquries'));
    }

    public function promotionalEnquries()
    {
        $enquries = Contact::where('status', '0')
        ->where('enquiry_type', '2')
        ->latest()
        ->get()
        ->toArray();

        return view('backend.inquiries.promotionals', compact('enquries'));
    }

    public function generalEnquries()
    {
        $enquries = Contact::where('status', '0')
        ->where('enquiry_type', '3')
        ->latest()
        ->get()
        ->toArray();

        return view('backend.inquiries.general', compact('enquries'));
    }
}
