@extends('layouts.backend.app')
@section('title', 'Enquiry Details')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Enquiry Details</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $enquiry->name }}</p>
            <p><strong>Email:</strong> {{ $enquiry->email }}</p>
            <p><strong>Mobile:</strong> {{ $enquiry->mobile }}</p>
            <p><strong>Subject:</strong> {{ $enquiry->subject ?? '—' }}</p>
            <p><strong>Website:</strong> {{ $enquiry->website ?? '—' }}</p>
            <p><strong>Status:</strong> <span class="badge bg-{{ $enquiry->status == 'pending' ? 'warning' : 'success' }}">{{ ucfirst($enquiry->status) }}</span></p>
            <p><strong>Message:</strong> {{ $enquiry->message ?? 'No message provided.' }}</p>

            @if ($enquiry->document)
                <p><strong>Attachment:</strong>
                    <a href="{{ asset('uploads/enquiries/' . $enquiry->document) }}" target="_blank" class="btn btn-outline-secondary btn-sm">Download</a>
                </p>
            @endif

            <p><strong>Received:</strong> {{ $enquiry->created_at->diffForHumans() }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary">⬅ Back to List</a>
    </div>
</div>
@endsection
