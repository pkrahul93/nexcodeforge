@extends('layouts.backend.app')
@section('title', 'Ticket Details')

@php
    $statusIcons = [
        'open' => '⏳',
        'in_progress' => '🔧',
        'resolved' => '✅',
    ];

    $badgeClass = match ($ticket->status) {
        'open' => 'warning',
        'in_progress' => 'info',
        'resolved' => 'success',
        default => 'secondary',
    };
@endphp

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Ticket Details</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $ticket->name }}</p>
                <p><strong>Email:</strong> {{ $ticket->email }}</p>
                <p><strong>Mobile:</strong> {{ $ticket->mobile }}</p>
                <p><strong>Subject:</strong> {{ $ticket->subject ?? '—' }}</p>
                <p><strong>Priority:</strong> {{ strtoupper($ticket->priority) ?? '—' }}</p>
                <p><strong>Ticket Status:</strong>
                    <span class="badge bg-{{ $badgeClass }}">
                        {{ $statusIcons[$ticket->status] ?? '❔' }}
                        {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                    </span>
                </p>
                <p><strong>Message:</strong> {{ $ticket->message ?? 'No message provided.' }}</p>

                @if ($ticket->attachment)
                    <p><strong>Attachment:</strong>
                        <a href="{{ asset('storage/' . $ticket->attachment) }}" target="_blank"
                            class="btn btn-outline-secondary btn-sm">Download</a>
                    </p>
                @endif

                <p><strong>Received At:</strong> {{ $ticket->created_at->diffForHumans() }}</p>
                <p>
                    <strong>Resolved At:</strong>
                    {!! $ticket->resolved_at
                        ? '<span class="badge bg-success me-1 fs-8">' . $ticket->resolved_at->diffForHumans() . '</span>'
                        : '<span class="badge bg-danger me-1 fs-8">Not Resolved Yet.</span>' !!}
                </p>

            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
