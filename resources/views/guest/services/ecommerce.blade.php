@extends('layouts.guest')

@section('title', 'E-Commerce Website Development Company | Online Store Solutions | NexCodeForge')

@section('meta_description',
    'Custom e-commerce websites with secure payments, inventory management, and scalable
    architecture to grow your online business.')

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
                                <h2 class="title">E-Commerce Development</hz>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">E-Commerce Development</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <div class="site-main">

        <section class="prt-row about-section-01 clearfix">
            <div class="container">
                <h2 class="text-center">Sell Online with Confidence</h2>
                <p class="text-center">
                    We build conversion-optimized online stores with seamless checkout,
                    inventory control, and secure payments.
                </p>
                <div class="text-center">
                    <a href="{{ route('enquiry.index') }}" class="prt-btn prt-btn-color-skincolor btn-brand">
                        Build My Store
                    </a>
                </div>
            </div>
        </section>

        <section class="prt-row service-section-01 ecommerce-capabilities clearfix">
            <div class="container">

                <!-- Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2 class="title">E-Commerce Capabilities</h2>
                    <p class="desc-text">
                        Powerful features to build, manage, and scale your online store efficiently.
                    </p>
                </div>

                <div class="row mt-4">

                    @php
                        $capabilities = [
                            [
                                'title' => 'Custom Store Design',
                                'desc' => 'Unique, conversion-focused store designs aligned with your brand identity.',
                                'img' => 'guest/assets/images/ecom/ecom-store.jpg',
                            ],
                            [
                                'title' => 'Payment Gateway Integration',
                                'desc' => 'Secure integration with Razorpay, Stripe, PayPal, and other gateways.',
                                'img' => 'guest/assets/images/ecom/online.jpg',
                            ],
                            [
                                'title' => 'Order & Inventory Management',
                                'desc' => 'Real-time order tracking, stock control, and automated notifications.',
                                'img' => 'guest/assets/images/ecom/order.jpg',
                            ],
                            [
                                'title' => 'Mobile Responsive UI',
                                'desc' => 'Optimized shopping experience across mobile, tablet, and desktop devices.',
                                'img' => 'guest/assets/images/ecom/mobile.jpg',
                            ],
                            [
                                'title' => 'SEO Ready Architecture',
                                'desc' => 'SEO-friendly structure to improve visibility and organic search traffic.',
                                'img' => 'guest/assets/images/ecom/seo.jpg',
                            ],
                            [
                                'title' => 'Multi-Vendor Support',
                                'desc' => 'Advanced multi-vendor marketplace functionality with vendor dashboards.',
                                'img' => 'guest/assets/images/ecom/market.png',
                            ],
                        ];
                    @endphp

                    @foreach ($capabilities as $capability)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                            <div class="website-card">

                                <!-- Image -->
                                <div class="website-card-img">
                                    <img src="{{ asset($capability['img']) }}" alt="{{ $capability['title'] }}"
                                        class="img-fluid" loading="lazy" width="1200" height="800" />
                                    <div class="image-overlay"></div>
                                </div>

                                <!-- Content -->
                                <div class="website-card-content">
                                    <h3>{{ $capability['title'] }}</h3>
                                    <p>{{ $capability['desc'] }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>

        <section class="prt-row ecommerce-comparison clearfix">
            <div class="container">

                <!-- Heading -->
                <div class="section-title text-center mb-40">
                    <h2 class="title">Single-Vendor vs Multi-Vendor E-Commerce</h2>
                    <p class="desc-text">
                        Compare both models and choose the right one for your business.
                    </p>
                </div>

                <div class="table-responsive">
                    <table class="table comparison-table">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>Single-Vendor Store</th>
                                <th>Multi-Vendor Marketplace</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td data-label="Feature">Best For</td>
                                <td data-label="Single-Vendor">Brands selling their own products</td>
                                <td data-label="Multi-Vendor">Marketplaces with multiple sellers</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Product Management</td>
                                <td data-label="Single-Vendor">Managed by store owner</td>
                                <td data-label="Multi-Vendor">Managed by vendors</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Vendor Registration</td>
                                <td data-label="Single-Vendor">❌ Not Required</td>
                                <td data-label="Multi-Vendor">✅ Required</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Commission System</td>
                                <td data-label="Single-Vendor">❌ Not Applicable</td>
                                <td data-label="Multi-Vendor">✅ Automated Commissions</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Order Handling</td>
                                <td data-label="Single-Vendor">Admin handles all orders</td>
                                <td data-label="Multi-Vendor">Vendors handle their orders</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Admin Dashboard</td>
                                <td data-label="Single-Vendor">Simple dashboard</td>
                                <td data-label="Multi-Vendor">Advanced vendor dashboards</td>
                            </tr>

                            <tr>
                                <td data-label="Feature">Scalability</td>
                                <td data-label="Single-Vendor">Limited</td>
                                <td data-label="Multi-Vendor">Highly scalable</td>
                            </tr>

                            <tr class="highlight-row">
                                <td data-label="Feature">Recommended When</td>
                                <td data-label="Single-Vendor">Selling your own brand</td>
                                <td data-label="Multi-Vendor">Building a marketplace</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- CTA -->
                <div class="text-center mt-40">
                    <a href="{{ route('enquiry.index') }}" class="prt-btn prt-btn-color-gradiant">
                        Help Me Choose the Right Model
                    </a>
                </div>

            </div>
        </section>


        @include('guest.partials.why-choose-us')

        @include('guest.partials.workflow')

        @include('guest.partials.final-cta')

    </div>
@endsection
