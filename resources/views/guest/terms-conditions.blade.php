@extends('layouts.guest')
@section('title', 'Terms & Conditions | NexCodeForge')
@section('meta_description', 'Read the Terms & Conditions fo | NexCodeForge — rules, responsibilities, and legal terms for using our website and services.')


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
                                <h2 class="title">Terms &amp; Conditions</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Terms &amp; Conditions</span>
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

                    <h1 class="fw-b text-center">Our Terms &amp; Conditions</h1>
                    <hr>

                    <section class="mb-4">
                        <h2 class="h4">1. Introduction</h2>
                        <p>
                            Welcome to <strong>{{ config('app.name', 'YourSite') }}</strong>. These <b><a href="{{ route('terms-conditions') }}" target="_blank" rel="noopener noreferrer">Terms &amp; Conditions</a></b> ("Terms")
                            govern your access to and use of our website and services. By using or accessing our site you agree to be
                            bound by these Terms. If you do not agree, please do not use our services.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">2. Definitions</h2>
                        <p><strong>"Service"</strong> means any product, software, or service offered on {{ config('app.name', 'YourSite') }}.</p>
                        <p><strong>"User"</strong> or <strong>"You"</strong> refers to any visitor, customer or person using the Service.</p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">3. Use of the Website</h2>
                        <ul>
                            <li>You must be 18 years or older to use our services.</li>
                            <li>You agree not to misuse the Service, including uploading malicious content, violating applicable laws,
                                or interfering with site operations.</li>
                            <li>We reserve the right to suspend or terminate accounts for breaches of these Terms.</li>
                        </ul>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">4. Account, Password &amp; Security</h2>
                        <p>
                            If you create an account, you are responsible for maintaining the confidentiality of your credentials
                            and for any activity that occurs under your account. Notify us immediately if you suspect unauthorized use.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">5. Payment &amp; Refunds (if applicable)</h2>
                        <p>
                            For paid services, all fees are displayed on the relevant product pages or invoices. Refunds, if any,
                            are processed according to our <b><a href="{{ route('refund-policy') }}" target="_blank" rel="noopener noreferrer">Refund Policy</a></b>. We may change pricing with notice.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">6. Intellectual Property</h2>
                        <p>
                            All content on this site (text, images, logos, software) is owned or licensed by {{ config('app.name', 'YourSite') }}.
                            You may not copy, reproduce, or use our content without prior written permission.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">7. User Content</h2>
                        <p>
                            If you submit content (feedback, messages, images), you grant us a non-exclusive, royalty-free license to
                            use, reproduce, modify and publish that content to provide and promote our services.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">8. Privacy</h2>
                        <p>
                            Our <a href="{{ route('privacy-policy') }}" target="_blank">Privacy Policy</a> explains how we collect and use personal data.
                            By using the Service you agree to data practices outlined there.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">9. Limitation of Liability</h2>
                        <p>
                            To the fullest extent permitted by law, {{ config('app.name', 'YourSite') }} and its affiliates will not be
                            liable for indirect, incidental, special or consequential damages arising from your use of the Service.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">10. Indemnification</h2>
                        <p>
                            You agree to indemnify and hold harmless {{ config('app.name', 'YourSite') }}, its officers, employees, and partners
                            from any claims, liabilities, damages, and expenses arising from your breach of these Terms.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">11. Termination</h2>
                        <p>
                            We may suspend or terminate your access for violations of these Terms or for any reason with reasonable notice
                            if required. Upon termination, your right to use the Service ends.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">12. Changes to Terms</h2>
                        <p>
                            We may update these Terms from time to time. We will post the revised Terms with an updated "Last updated" date.
                            Continued use after changes implies acceptance of the new Terms.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">13. Governing Law</h2>
                        <p>
                            These Terms are governed by the laws of <strong>[India]</strong>.
                            Any dispute will be resolved in the courts located in that jurisdiction unless otherwise agreed.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">14. Contact Us</h2>
                        <p>
                            If you have questions about these Terms, contact us at:
                        </p>
                        <p>
                            <strong>Email:</strong> <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a><br>
                            <strong>Website:</strong> <a href="{{ url('/') }}">www.nexcodeforge.com</a>
                        </p>
                    </section>

                    <hr>

                    <p class="small text-muted text-center mb-0">
                        These <b><a href="{{ route('terms-conditions') }}" target="_blank" rel="noopener noreferrer">Terms &amp; Conditions</a></b> were last updated on {{ \Carbon\Carbon::now()->format('F j, Y') }}.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
