@extends('layouts.guest')
@section('title', 'Refund Policy | NexCodeForge')
@section('meta_description', 'Read the Refund Policy of NexCodeForge — understand our rules and procedures for refunds, cancellations, and payment issues.')

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
                                <h2 class="title">Refund Policy</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Refund Policy</span>
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
                    <p class="text-muted small">
                        <strong>Last updated:</strong> {{ \Carbon\Carbon::now()->format('F j, Y') }}
                    </p>

                    <h1 class="fw-b text-center">Our Refund Policy</h1>
                    <hr>

                    <section class="mb-4">
                        <h2 class="h4">1. Introduction</h2>
                        <p>
                            At <strong>{{ config('app.name', 'YourSite') }}</strong>, we strive to provide high-quality services and products.
                            This Refund Policy explains the terms and conditions under which refunds may be granted.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">2. Eligibility for Refunds</h2>
                        <p>
                            Refunds are only provided under the following circumstances:
                        </p>
                        <ul>
                            <li>If the service/product received is defective or not as described.</li>
                            <li>If there is a billing or payment error on our part.</li>
                            <li>Cancellation requests received within the specified time frame (if applicable).</li>
                        </ul>
                        <p>
                            Refunds are not granted for dissatisfaction due to personal preferences or change of mind unless stated otherwise.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">3. Refund Process</h2>
                        <p>
                            To request a refund, please contact our support team at:
                        </p>
                        <p>
                            <strong>Email:</strong> <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a><br>
                            <strong>Phone:</strong> +91-76691 66975
                        </p>
                        <p>
                            Your request should include your purchase details and reason for the refund. Refunds are reviewed on a case-by-case basis.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">4. Refund Timeline</h2>
                        <p>
                            Once approved, refunds will be processed using the original payment method. Depending on your bank or payment provider, it may take 5-10 business days for the refund to reflect in your account.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">5. Partial Refunds</h2>
                        <p>
                            In some cases, partial refunds may be issued due to usage of services, partial delivery, or administrative fees. The amount and reason for partial refund will be communicated clearly.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">6. Exceptions</h2>
                        <p>
                            Certain services or products may be non-refundable. This will be explicitly stated on the product/service page before purchase. By completing the purchase, you acknowledge and agree to these terms.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">7. Changes to This Policy</h2>
                        <p>
                            We may update this Refund Policy from time to time. Any changes will be posted on this page with an updated "Last updated" date.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">8. Contact Us</h2>
                        <p>
                            If you have questions about this Refund Policy, please contact us:
                        </p>
                        <p>
                            <strong>Email:</strong> <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a><br>
                            <strong>Website:</strong> <a href="{{ url('/') }}">www.nexcodeforge.com</a>
                        </p>

                    </section>

                    <hr>

                    <p class="small text-muted text-center mb-0">
                        Refund Policy last updated on {{ \Carbon\Carbon::now()->format('F j, Y') }}.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
