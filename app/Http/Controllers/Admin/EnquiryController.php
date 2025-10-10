<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Enquiry;
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

     // Admin: list enquiries
    public function index()
    {
        $enquiries = Enquiry::latest()->paginate(10);
        return view('backend.inquiries.index', compact('enquiries'));
    }

    // Admin: view single enquiry
    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('backend.inquiries.show', compact('enquiry'));
    }

    // Admin: update status
    public function updateStatus(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->status = $request->status;
        $enquiry->save();

        return redirect()->back()->with('success', 'Enquiry status updated successfully.');
    }
}
