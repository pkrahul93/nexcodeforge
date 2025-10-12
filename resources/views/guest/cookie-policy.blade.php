@extends('layouts.guest')
@section('title', 'Cookie Policy | NexCodeForge')
@section('meta_description', 'Read the Cookie Policy of NexCodeForge — how we use cookies and tracking technologies to improve your experience.')

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
                                <h2 class="title">Cookie Policy</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Cookie Policy</span>
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
                        <h1 class="fw-b text-center">Our Cookie Policy</h1>
                        <hr>
                        <h2 class="h4">1. What Are Cookies?</h2>
                        <p>
                            Cookies are small text files stored on your device when you visit a website. They help improve your browsing experience and enable certain features.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">2. How We Use Cookies</h2>
                        <ul>
                            <li>To remember your preferences and settings.</li>
                            <li>To analyze website traffic and usage patterns.</li>
                            <li>To deliver personalized content and marketing.</li>
                            <li>To ensure website security and functionality.</li>
                        </ul>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">3. Managing Cookies</h2>
                        <p>
                            You can control or disable cookies through your browser settings. Please note that some features may not function correctly if cookies are disabled.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">4. Third-Party Cookies</h2>
                        <p>
                            We may use third-party services like Google Analytics which set their own cookies. We do not control these cookies, and you should review their privacy policies.
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
