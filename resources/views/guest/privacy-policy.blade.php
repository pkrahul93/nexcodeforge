@extends('layouts.guest')
@section('title', 'Privacy Policy | NexCodeForge')
@section('meta_description', 'Read the Privacy Policy of NexCodeForge — how we collect, use, and protect your personal information while providing our services.')

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
                                <h2 class="title">Privacy Policy</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Privacy Policy</span>
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

                    <h1 class="fw-b text-center">Our Privacy Policy</h1>
                    <hr>

                    <section class="mb-4">
                        <h2 class="h4">1. Introduction</h2>
                        <p>
                            At <strong>{{ config('app.name', 'YourSite') }}</strong>, we value your privacy. This Privacy Policy explains how we collect, use, and protect your personal information when you visit our website or use our services.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">2. Information We Collect</h2>
                        <p>
                            We may collect personal information such as your name, email address, phone number, and other relevant details when you submit forms or interact with our website. Non-personal information such as browser type, IP address, and usage data may also be collected to improve our services.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">3. How We Use Your Information</h2>
                        <ul>
                            <li>To provide and improve our services.</li>
                            <li>To respond to inquiries and customer support requests.</li>
                            <li>To send updates, newsletters, and promotional communications (if opted-in).</li>
                            <li>To ensure website security and prevent fraudulent activity.</li>
                        </ul>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">4. Cookies and Tracking</h2>
                        <p>
                            Our website uses cookies and similar technologies to enhance user experience, analyze traffic, and provide personalized content. You can manage cookies through your browser settings, but some features may not function properly if disabled.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">5. Data Security</h2>
                        <p>
                            We implement appropriate measures to protect your personal information against unauthorized access, disclosure, or destruction. However, no method of transmission over the Internet is completely secure.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">6. Sharing Your Information</h2>
                        <p>
                            We do not sell, trade, or otherwise transfer your personal information to third parties except to provide our services or comply with legal obligations.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">7. Third-Party Links</h2>
                        <p>
                            Our website may contain links to third-party websites. We are not responsible for the privacy practices of these sites and encourage you to review their privacy policies.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">8. Children's Privacy</h2>
                        <p>
                            Our services are not intended for children under 13. We do not knowingly collect personal information from children. If we become aware of such collection, we will take steps to delete the information.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">9. Changes to This Policy</h2>
                        <p>
                            We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated "Last updated" date. We encourage you to review this page periodically.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">10. Contact Us</h2>
                        <p>
                            If you have questions about this Privacy Policy, please contact us:
                        </p>
                        <p>
                            <strong>Email:</strong> <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a><br>
                            <strong>Website:</strong> <a href="{{ url('/') }}">{{ url('/') }}</a>
                        </p>

                    </section>

                    <hr>

                    <p class="small text-muted text-center mb-0">
                        Privacy Policy last updated on {{ \Carbon\Carbon::now()->format('F j, Y') }}.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
