@extends('layouts.guest')
@section('title', 'FAQ | NexCodeForge')
@section('meta_description', 'Frequently Asked Questions about NexCodeForge — answers to common queries about our services, policies, and support.')

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
                                <h2 class="title">FAQ</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">FAQ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="shadow-lg p-4 bg-white rounded">

                    <section class="mb-4">
                        <h2 class="h4">1. How do I contact support?</h2>
                        <p>
                            You can contact us via the <a href="{{ route('contact.index') }}">Contact Us</a> page or email at <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a>.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">2. What payment methods are accepted?</h2>
                        <p>
                            We accept payments via online banking, credit/debit cards, and other options specified on our service pages.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">3. Can I request a refund?</h2>
                        <p>
                            Refunds are processed according to our <a href="{{ route('refund-policy') }}">Refund Policy</a>.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">4. How is my data protected?</h2>
                        <p>
                            We take your privacy seriously. Refer to our <a href="{{ route('privacy-policy') }}">Privacy Policy</a> for details on data protection.
                        </p>
                    </section>

                    <hr>
                    <p class="small text-muted text-center mb-0">
                        Last updated: {{ \Carbon\Carbon::now()->format('F j, Y') }}.
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
