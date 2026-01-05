@extends('layouts.guest')

@section('title', 'MLM Software Development Company | Secure & Scalable MLM Solutions | NexCodeForge')

@section('meta_description',
    'Custom MLM software solutions with secure commission logic, genealogy plans, dashboards,
    and reports. Build scalable MLM systems with NexCodeForge.')


    <style>
        /* ================= WEBSITE SOLUTIONS ================= */

        .website-solutions {
            background: linear-gradient(to bottom,
                    rgba(0, 123, 255, 0.03),
                    rgba(5, 200, 249, 0.04));
        }

        .website-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            height: 100%;
            transition: all 0.35s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .website-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 22px 45px rgba(0, 0, 0, 0.14);
        }

        .website-card-img {
            height: 210px;
            overflow: hidden;
        }

        .website-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .website-card:hover .website-card-img img {
            transform: scale(1.08);
        }

        .website-card-content {
            padding: 25px 22px 30px;
            text-align: center;
        }

        .website-card-content h3 {
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .website-card-content p {
            font-size: 14.5px;
            color: #555;
            line-height: 1.6;
        }

        /* ================= IMAGE OVERLAY + LAZY LOAD OPTIMIZATION ================= */

        .website-card-img {
            position: relative;
            height: 210px;
            overflow: hidden;
        }

        /* Gradient overlay for contrast */
        .website-card-img .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.15),
                    rgba(0, 0, 0, 0.55));
            opacity: 0.9;
            pointer-events: none;
            transition: opacity 0.35s ease;
        }

        /* Slightly lighter overlay on hover */
        .website-card:hover .image-overlay {
            opacity: 0.7;
        }

        /* Smooth zoom already exists – reinforce */
        .website-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .website-card:hover .website-card-img img {
            transform: scale(1.08);
        }

        /* Mobile adjustment */
        @media (max-width: 767px) {
            .website-card-img {
                height: 180px;
            }
        }


        /* Mobile */
        @media (max-width: 767px) {
            .website-card-img {
                height: 180px;
            }
        }

        /* ================= RESPONSIVE COMPARISON TABLE ================= */

        .comparison-table {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .comparison-table thead th {
            background: linear-gradient(135deg, #05c8f9, #007bff);
            color: #fff;
            text-align: center;
            padding: 16px;
            font-weight: 600;
        }

        .comparison-table td {
            padding: 14px 16px;
            border-top: 1px solid #eee;
            text-align: center;
            font-size: 14.5px;
        }

        .comparison-table td:first-child {
            text-align: left;
            font-weight: 600;
            color: #333;
        }

        .comparison-table tr:nth-child(even) {
            background: #f9fbfd;
        }

        .highlight-row td {
            background: rgba(5, 200, 249, 0.08);
            font-weight: 600;
        }

        /* ===== MOBILE STACKING ===== */
        @media (max-width: 767px) {

            .comparison-table thead {
                display: none;
            }

            .comparison-table,
            .comparison-table tbody,
            .comparison-table tr,
            .comparison-table td {
                display: block;
                width: 100%;
            }

            .comparison-table tr {
                margin-bottom: 18px;
                border-radius: 12px;
                background: #fff;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
                padding: 8px 0;
            }

            .comparison-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: right;
                padding: 10px 14px;
                border: none;
            }

            .comparison-table td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #333;
                text-align: left;
            }

            .comparison-table td:first-child {
                background: rgba(5, 200, 249, 0.1);
                font-weight: 700;
                justify-content: center;
                text-align: center;
            }
        }

        /* ================= MLM SECURITY SECTION ================= */

        .mlm-security {
            background: linear-gradient(to bottom,
                    rgba(5, 200, 249, 0.04),
                    rgba(0, 123, 255, 0.03));
        }

        .security-list {
            list-style: none;
            padding-left: 0;
            margin-top: 20px;
        }

        .security-list li {
            font-size: 15px;
            padding: 8px 0;
            color: #444;
            line-height: 1.6;
        }

        /* ================= MLM COMPLIANCE DISCLAIMER ================= */

        .mlm-compliance-disclaimer {
            background: #fff7e6;
        }

        .disclaimer-box {
            border-left: 5px solid #ff9800;
            padding: 25px 30px;
            background: #fffaf0;
            border-radius: 10px;
        }

        .disclaimer-box h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .disclaimer-box p {
            font-size: 14.5px;
            color: #444;
            line-height: 1.7;
        }

        /* ================= MLM DEMO FLOW ================= */

        .demo-step {
            background: #fff;
            padding: 30px 25px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .demo-step:hover {
            transform: translateY(-8px);
        }

        .demo-step span {
            display: inline-flex;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #05c8f9, #007bff);
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
    </style>

@section('content')

    <!--  page-title -->
    <div class="prt-page-title-row">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">MLM Software Solutions</hz>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">MLM Solutions</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <div class="site-main">

        <!-- Intro -->
        <section class="prt-row about-section-01 clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="title">Scalable & Secure MLM Software Solutions</h2>
                        <p class="desc-text">
                            We develop powerful MLM platforms with advanced commission
                            structures, real-time dashboards, and enterprise-grade security.
                        </p>
                        <div class="text-center">
                            <a href="{{ route('enquiry.index') }}" class="prt-btn prt-btn-color-skincolor btn-brand">
                                Request Demo
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid" src="{{ asset('guest/assets/images/mlm/mlm.jpg') }}" alt="MLM Software">
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="prt-row service-section-01 mlm-features clearfix">
            <div class="container">

                <!-- Section Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2 class="title">MLM Features We Offer</h2>
                    <p class="desc-text">
                        Powerful, secure, and scalable features designed to run
                        a successful multi-level marketing business.
                    </p>
                </div>

                <div class="row mt-4">

                    @php
                        $features = [
                            [
                                'title' => 'Binary, Matrix & Unilevel Plans',
                                'desc' => 'Flexible MLM compensation plans tailored to your business model.',
                                'img' => 'guest/assets/images/mlm/binary.png',
                            ],
                            [
                                'title' => 'Commission & Payout Automation',
                                'desc' => 'Automated commission calculations and timely payouts with accuracy.',
                                'img' => 'guest/assets/images/mlm/commission.jpg',
                            ],
                            [
                                'title' => 'Member & Admin Dashboards',
                                'desc' => 'Role-based dashboards for members, vendors, and administrators.',
                                'img' => 'guest/assets/images/mlm/crm.jpg',
                            ],
                            [
                                'title' => 'Wallet & Payment Integration',
                                'desc' => 'Integrated wallets with secure payment gateway support.',
                                'img' => 'guest/assets/images/mlm/02.jpg',
                            ],
                            [
                                'title' => 'Genealogy Tree View',
                                'desc' => 'Visual genealogy tree to track referrals and downline structure.',
                                'img' => 'guest/assets/images/mlm/03.png',
                            ],
                            [
                                'title' => 'Reports & Analytics',
                                'desc' => 'Detailed reports and insights to monitor growth and performance.',
                                'img' => 'guest/assets/images/mlm/01.png',
                            ],
                        ];
                    @endphp

                    @foreach ($features as $feature)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                            <div class="website-card">

                                <!-- Image -->
                                <div class="website-card-img">
                                    <img src="{{ asset($feature['img']) }}" alt="{{ $feature['title'] }}" class="img-fluid"
                                        loading="lazy" width="1200" height="800" />
                                    <div class="image-overlay"></div>
                                </div>

                                <!-- Content -->
                                <div class="website-card-content">
                                    <h3>{{ $feature['title'] }}</h3>
                                    <p>{{ $feature['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <section class="prt-row mlm-plan-comparison clearfix">
            <div class="container">

                <!-- Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2 class="title">MLM Plan Comparison</h2>
                    <p class="desc-text">
                        Understand the difference between Binary and Matrix plans
                        to choose the right structure for your MLM business.
                    </p>
                </div>

                <div class="table-responsive" data-aos="fade-up" data-aos-delay="150">
                    <table class="table comparison-table">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>Binary Plan</th>
                                <th>Matrix Plan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td data-label="Feature">Structure</td>
                                <td data-label="Binary Plan">2 legs per member</td>
                                <td data-label="Matrix Plan">Fixed width (e.g. 3×3, 5×5)</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Best For</td>
                                <td data-label="Binary Plan">Fast-growing networks</td>
                                <td data-label="Matrix Plan">Stable & controlled growth</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Spillover Benefit</td>
                                <td data-label="Binary Plan">High spillover potential</td>
                                <td data-label="Matrix Plan">Limited spillover</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Commission Logic</td>
                                <td data-label="Binary Plan">Based on weaker leg</td>
                                <td data-label="Matrix Plan">Based on filled matrix levels</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Complexity</td>
                                <td data-label="Binary Plan">Moderate</td>
                                <td data-label="Matrix Plan">Simple & predictable</td>
                            </tr>

                            <tr class="highlight-row">
                                <td data-label="Feature">Recommended When</td>
                                <td data-label="Binary Plan">You want rapid expansion</td>
                                <td data-label="Matrix Plan">You want controlled payouts</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        <section class="prt-row mlm-role-comparison clearfix">
            <div class="container">

                <!-- Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2 class="title">Admin vs Member Features</h2>
                    <p class="desc-text">
                        Clear role-based access ensures transparency, control, and smooth operations.
                    </p>
                </div>

                <div class="table-responsive" data-aos="fade-up" data-aos-delay="150">
                    <table class="table comparison-table">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>Admin Panel</th>
                                <th>Member Panel</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td data-label="Feature">User Management</td>
                                <td data-label="Admin">Create, approve, block users</td>
                                <td data-label="Member">View own profile only</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Commission Control</td>
                                <td data-label="Admin">Define plans & commission rules</td>
                                <td data-label="Member">View earned commissions</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Wallet & Payouts</td>
                                <td data-label="Admin">Approve & manage payouts</td>
                                <td data-label="Member">Request withdrawals</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Genealogy Tree</td>
                                <td data-label="Admin">View entire network</td>
                                <td data-label="Member">View personal downline</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Reports & Analytics</td>
                                <td data-label="Admin">Full system reports</td>
                                <td data-label="Member">Personal earnings reports</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">System Settings</td>
                                <td data-label="Admin">Full configuration access</td>
                                <td data-label="Member">❌ Not accessible</td>
                            </tr>

                            <tr class="highlight-row">
                                <td data-label="Feature">Access Level</td>
                                <td data-label="Admin">Full control</td>
                                <td data-label="Member">Limited & secure</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        <section class="prt-row mlm-security clearfix">
            <div class="container">

                <div class="row align-items-center">

                    <!-- Content -->
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="section-title">
                            <h2 class="title">Security & Compliance</h2>
                            <p class="desc-text">
                                We follow industry-best security practices to ensure
                                your MLM platform is safe, compliant, and reliable.
                            </p>
                        </div>

                        <ul class="security-list">
                            <li>🔒 Secure authentication & role-based access</li>
                            <li>🛡️ Encrypted payment & wallet transactions</li>
                            <li>📊 Audit-ready reports & logs</li>
                            <li>⚙️ Fraud prevention & duplicate account detection</li>
                            <li>📁 Secure data storage & regular backups</li>
                            <li>📜 Compliance-ready system architecture</li>
                        </ul>
                    </div>

                    <!-- Visual -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                        <img src="{{ asset('guest/assets/images/mlm/04.jpg') }}" alt="MLM Security & Compliance"
                            class="img-fluid border-radius-5" loading="lazy" />
                    </div>
                </div>
            </div>
        </section>

        <section class="prt-row mlm-compliance-disclaimer clearfix">
            <div class="container">
                <div class="disclaimer-box" data-aos="fade-up">
                    <h3>Compliance & Legal Disclaimer</h3>
                    <p>
                        NexCodeForge provides <strong>software development services only</strong>.
                        We do not promote, operate, or endorse any MLM, referral, or investment scheme.
                    </p>
                    <p>
                        Clients are solely responsible for ensuring their business model,
                        compensation plans, and operations comply with applicable local,
                        national, and international laws and regulations.
                    </p>
                    <p>
                        Our MLM software is designed as a <strong>technology platform</strong>
                        and must be used in compliance with legal, ethical, and regulatory requirements.
                    </p>
                </div>
            </div>
        </section>


        @include('guest.partials.why-choose-us')

        @include('guest.partials.workflow')

        <section class="prt-row mlm-demo-flow clearfix">
            <div class="container">

                <!-- Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2 class="title">Request a Live MLM Software Demo</h2>
                    <p class="desc-text">
                        See how our MLM system works before you decide.
                        No obligation, no pressure.
                    </p>
                </div>

                <!-- Steps -->
                <div class="row text-center mb-40">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="demo-step">
                            <span>1</span>
                            <h4>Share Your Requirements</h4>
                            <p>Tell us your MLM plan, target audience, and business goals.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="demo-step">
                            <span>2</span>
                            <h4>Live Demo Session</h4>
                            <p>We walk you through features, admin panel, and workflows.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="demo-step">
                            <span>3</span>
                            <h4>Customization & Pricing</h4>
                            <p>Get a clear roadmap and pricing tailored to your needs.</p>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="450">
                    <a href="{{ route('enquiry.index') }}" class="prt-btn prt-btn-color-gradiant">
                        Request Demo Now
                    </a>
                </div>

            </div>
        </section>


        @include('guest.partials.final-cta')

    </div>
@endsection
