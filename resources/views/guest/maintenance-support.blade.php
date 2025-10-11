@extends('layouts.guest')

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

    <div class="container-fluid py-5 px-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="shadow-lg p-4 bg-white rounded mb-5">
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
                    <div class="col-md-6 mb-3">
                        <!-- ===== Support Ticket Form Section ===== -->
                        <div class="shadow-lg p-4 bg-white rounded">
                            <h3 class="mb-4 text-primary fw-bold ticket">Raise a Support Ticket</h3>

                            @if (session('success'))
                                <div class="alert alert-success text-center">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('support-ticket.store') }}" method="POST" enctype="multipart/form-data"
                                class="query_form wrap-form clearfix mt-3 position-relative">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Mobile <span class="text-danger">*</span></label>
                                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                                            class="form-control" required>
                                        @error('mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Priority <span class="text-danger">*</span></label>
                                        <select name="priority" class="form-control" required>
                                            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low
                                            </option>
                                            <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                                Medium</option>
                                            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High
                                            </option>
                                        </select>
                                        @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Attachment (optional)</label>
                                        <input type="file" name="attachment" class="form-control"
                                            accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                                        @error('attachment')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Subject (optional)</label>
                                        <input type="text" name="subject" value="{{ old('subject') }}"
                                            class="form-control">
                                        @error('subject')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Message <span class="text-danger">*</span></label>
                                        <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-lg btn-primary px-5">Submit Ticket</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- ===== End Form Section ===== -->
                    </div>
                </div>




                <p class="mt-5 text-center">
                    For any additional questions about our Maintenance & Support Policy,
                    please contact us at <a href="mailto:support@netambit.com">support@nexcodeforge.com</a>.
                </p>
            </div>
        </div>
    </div>
@endsection
