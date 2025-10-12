@extends('layouts.guest')


@php
    $defaultMessages = [
        'open' =>
            'Thank you for your patience. Our support team has received your ticket and it is currently being reviewed.',
        'in_progress' =>
            'Your ticket is being actively worked on by our support team. We’ll update you with progress shortly.',
        'resolved' => 'Your ticket has been resolved. If you have any further questions, feel free to reply.',
    ];

    // Fallback if status is unknown
    $status = session('ticket_status')->status ?? 'open';
    $message =
        session('ticket_status')->admin_message ??
        ($defaultMessages[$status] ?? 'Thank you for contacting us. Your ticket is under review.');

    // Map statuses to colors and icons
    $statusMap = [
        'open' => [
            'label' => 'Open',
            'color' => 'warning',
            'icon' => '⏳', // hourglass
        ],
        'in_progress' => [
            'label' => 'In Progress',
            'color' => 'info',
            'icon' => '🔧', // wrench
        ],
        'resolved' => [
            'label' => 'Resolved',
            'color' => 'success',
            'icon' => '✅', // checkmark
        ],
    ];

    $ticketStatus = session('ticket_status')->status ?? 'open';
    $statusLabel = $statusMap[$ticketStatus]['label'] ?? 'Unknown';
    $statusColor = $statusMap[$ticketStatus]['color'] ?? 'secondary';
    $statusIcon = $statusMap[$ticketStatus]['icon'] ?? '❔';
@endphp

@section('content')
    <!-- page-title -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Maintenance & Support</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Maintenance & Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!-- Page Content -->
    <div class="container-fluid py-5 px-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <h1 class="fw-bold text-center mb-4">Maintenance & Support</h1>
                <p class="text-center text-muted mb-5">
                    Keep your website and applications running smoothly with our reliable support system.
                </p>
                <hr>

                <div class="row g-4">
                    <!-- Policy Section -->
                    <div class="col-md-6 mb-3">
                        <div class="shadow-lg p-4 bg-white rounded mb-5 h-100">
                            <h3 class="mb-3 text-primary fw-bold ticket">Our Maintenance & Support Policy</h3>
                            <p>
                                We understand that launching your website or application is just the beginning.
                                Our Maintenance & Support service ensures that your digital solution continues
                                to run smoothly, securely, and efficiently — giving you peace of mind to focus
                                on your business.
                            </p>

                            <h4 class="mt-4 text-secondary">🛠️ What’s Included</h4>
                            <ul class="list-unstyled ms-3">
                                <li>✅ Regular updates for performance and security improvements</li>
                                <li>✅ Bug fixes and issue resolution</li>
                                <li>✅ Server and uptime monitoring</li>
                                <li>✅ Content and minor design updates</li>
                                <li>✅ Priority support via our ticketing system</li>
                            </ul>

                            <h4 class="mt-4 text-secondary">📅 Support Hours</h4>
                            <p>
                                Our standard support hours are <strong>Monday to Saturday, 10:00 AM – 7:00 PM
                                    (IST)</strong>.
                                For critical issues, we also offer emergency support options as per your maintenance plan.
                            </p>

                            <h4 class="mt-4 text-secondary">🎫 Ticketing & Response System</h4>
                            <p>
                                All support requests are managed through our <strong>Ticketing Portal</strong>.
                                This ensures proper tracking, faster response, and transparent communication.
                            </p>
                            <p>
                                Please fill out the form below to raise a support ticket.
                                Our team will acknowledge your request within a few hours and begin resolution based on
                                priority.
                            </p>

                        </div>
                    </div>

                    <!-- Ticket Form -->
                    <div class="col-md-6 mb-3">
                        <div class="shadow-lg p-4 bg-white rounded h-100">
                            <h3 class="mb-4 text-primary fw-bold ticket"><i class="fa-solid fa-headset me-2"></i> Raise a
                                Support Ticket</h3>

                            {{-- Confirmation --}}
                            @if (session('ticket_success'))
                                <div class="alert alert-success text-center">
                                    <p>Your support ticket has been submitted successfully!</p>
                                    <p><strong>Ticket No:</strong>
                                        <span id="ticket-no">{{ session('ticket_no') }}</span>
                                        <button class="btn btn-sm btn-outline-secondary ms-2" type="button"
                                            onclick="navigator.clipboard.writeText('{{ session('ticket_no') }}')">
                                            Copy
                                        </button>
                                    </p>
                                    <p>Dear {{ session('ticket_name') }}, we’ve sent a confirmation to
                                        <strong>{{ session('ticket_email') }}</strong>.
                                    </p>
                                </div>
                            @endif

                            <form action="{{ route('support-ticket.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Mobile <span class="text-danger">*</span></label>
                                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Priority <span class="text-danger">*</span></label>
                                        <select name="priority" class="form-control" required>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Attachment (optional)</label>
                                        <input type="file" name="attachment" class="form-control"
                                            accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Subject</label>
                                        <input type="text" name="subject" value="{{ old('subject') }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Message <span class="text-danger">*</span></label>
                                        <textarea name="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <p class="form-submit cookies">
                                            <span class="checkbox"><input type="checkbox" name="cookies-consent"
                                                    id="cookies-consent2" required>
                                                Save my name, email, mobile, and other in this browser for the next time I
                                                raised a ticket.</span>
                                        </p>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary px-5">Raise Ticket</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr>
                    <div class="col-md-7 mx-auto mb-3">
                        <div class="shadow-lg p-4 bg-white rounded mb-5">
                            <h4 class="mt-4 text-secondary">⭐ Check Your Ticket Status</h4>

                            <form action="{{ route('support-ticket.check') }}" method="post" class="row mt-3">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <input type="text" name="ticket_no" value="{{ old('ticket_no') }}"
                                        class="form-control" placeholder="Enter Your Ticket No" required>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fa-solid fa-magnifying-glass me-2"></i> Check Status
                                    </button>
                                </div>
                            </form>

                            @if (session('ticket_status'))
                                <div class="alert bg-dark text-white mt-3">
                                    <strong>Ticket #{{ session('ticket_status')->ticket_no }}</strong><br>
                                    <p>
                                        <strong>Status:</strong>
                                        <span class="badge bg-{{ $statusColor }}">
                                            {{ $statusIcon }} {{ $statusLabel }}
                                        </span>
                                    </p>

                                    <p><b>Your Query :</b> {{ session('ticket_status')->message }}</p>
                                    <p><b>Admin Reply:</b> {{ $message }}</p>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <p class="mt-5 text-center text-muted">
                    For any additional questions about our Maintenance & Support Policy,
                    please contact us at <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a>
                </p>
            </div>
        </div>
    </div>
@endsection
