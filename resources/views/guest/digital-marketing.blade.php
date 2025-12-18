@extends('layouts.guest')

@section('title', 'Digital Marketing Services | SEO, PPC & Social Media | NexCodeForge')

@section('meta_description', 'Boost your online presence with NexCodeForge\'s data-driven digital marketing services. Expert SEO, PPC, Social Media, and Content strategies to grow your business.')

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
                                <h2 class="title">Digital Marketing Services</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Digital Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!-- site-main start -->
    <div class="site-main">

        <!-- Intro Section -->
        <section class="prt-row about-section-01 clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-title">
                            <h2 class="title" style="font-size: 48px; font-weight: 700; margin-bottom: 20px;">
                                Elevate Your Brand with Data-Driven Digital Marketing
                            </h2>
                            <p style="font-size: 18px; line-height: 1.6; margin-bottom: 30px; color: #666;">
                                We help businesses grow through strategic SEO, PPC, and Social Media campaigns. Turn clicks
                                into customers with our proven digital strategies.
                            </p>
                            <div class="d-flex gap-3">
                                <a href="{{ route('audit.show') }}"
                                    class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor">
                                    Get Free Audit
                                </a>
                                <a href="{{ route('enquiry.index') }}"
                                    class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor">
                                    Talk to an Expert
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <img class="img-fluid border-radius-5" src="{{ asset('guest/assets/images/single-img-05.jpg') }}"
                            alt="Digital Marketing Growth">
                    </div>
                </div>
            </div>
        </section>

    <!-- Services Section -->
    <section class="prt-row service-section-01 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h2 class="title">Our Digital Marketing Services</h2>
                        </div>
                        <div class="title-desc">
                            <p>Comprehensive solutions designed to increase your visibility and ROI.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @php
                    $services = [
                        [
                            'title' => 'Search Engine Optimization (SEO)',
                            'desc' => 'Rank higher on Google and drive organic traffic with our technical and on-page SEO strategies.',
                            'icon' => 'fas fa-search',
                        ],
                        [
                            'title' => 'Social Media Marketing',
                            'desc' => 'Engage your audience on Facebook, Instagram, LinkedIn, and Twitter with compelling content.',
                            'icon' => 'fas fa-share-alt',
                        ],
                        [
                            'title' => 'Pay-Per-Click (PPC)',
                            'desc' => 'Instant visibility and leads with optimized Google Ads and social media advertising campaigns.',
                            'icon' => 'fas fa-mouse-pointer',
                        ],
                        [
                            'title' => 'Content Marketing',
                            'desc' => 'High-quality blogs, articles, and copy that resonate with your audience and build authority.',
                            'icon' => 'fas fa-pen-nib',
                        ],
                        [
                            'title' => 'Email Marketing',
                            'desc' => 'Nurture leads and retain customers with personalized automated email campaigns.',
                            'icon' => 'fas fa-envelope-open-text',
                        ],
                        [
                            'title' => 'Analytics & Reporting',
                            'desc' => 'Transparent reporting so you can see exactly how your campaigns are performing.',
                            'icon' => 'fas fa-chart-line',
                        ],
                    ];
                @endphp

                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="featured-imagebox featured-imagebox-service style1">
                            <div class="featured-thumbnail">
                                <i class="{{ $service['icon'] }}"
                                    style="font-size: 50px; color: #007bff; margin-bottom: 20px;"></i>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3><a href="#">{{ $service['title'] }}</a></h3>
                                </div>
                                <div class="featured-desc">
                                    <p>{{ $service['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="prt-row bg-base-grey clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="pr-30 res-991-pr-0">
                        <div class="section-title">
                            <div class="title-header">
                                <h2 class="title">Why Choose NexCodeForge?</h2>
                            </div>
                            <div class="title-desc">
                                <p>We don't just run ads; we build sustainable growth engines for your business.</p>
                            </div>
                        </div>
                        <div class="prt-box-col-wrapper-style1 mt-4">
                            <div class="prt-history-box-content">
                                <h3 class="prt-history-box-h3">
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                                    Proven Results</h3>
                                <p>Our strategies are backed by data and have helped numerous clients scale their revenue and market share.</p>
                            </div>
                            <div class="prt-history-box-content">
                                <h3 class="prt-history-box-h3"><i class="fa fa-check text-success" aria-hidden="true"></i> Transparent Reporting</h3>
                                <p>No hidden metrics. You get clear, actionable reports on your ROI, traffic, and conversions.</p>
                            </div>
                            <div class="prt-history-box-content">
                                <h3 class="prt-history-box-h3"><i class="fa fa-check text-success" aria-hidden="true"></i> Customized Strategies</h3>
                                <p>Every business is unique. We tailor our approach to your specific goals, industry, and audience.</p>
                            </div>
                            <div class="prt-history-box-content">
                                <h3 class="prt-history-box-h3"><i class="fa fa-check text-success" aria-hidden="true"></i> ROI Focused</h3>
                                <p>We focus on what matters - your bottom line. We optimize campaigns to maximize your return on investment.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ps-1">
                        <img class="img-fluid border-radius-5 prt-equal-height-image" src="{{ asset('guest/assets/images/single_box.jpg') }}"
                            alt="Why Choose Us">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="prt-row process-section clearfix">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h2 class="title">Our Workflow</h2>
                        </div>
                        <div class="title-desc">
                            <p>How we deliver success for your business.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="process-step">
                        <div class="step-icon mb-3">
                            <span
                                style="display:inline-block; width:60px; height:60px; line-height:60px; background:#007bff; color:#fff; border-radius:50%; font-size:24px; font-weight:bold;">1</span>
                        </div>
                        <h4>Audit</h4>
                        <p>We analyze your current presence and identify opportunities.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="process-step">
                        <div class="step-icon mb-3">
                            <span
                                style="display:inline-block; width:60px; height:60px; line-height:60px; background:#007bff; color:#fff; border-radius:50%; font-size:24px; font-weight:bold;">2</span>
                        </div>
                        <h4>Strategy</h4>
                        <p>We build a tailored roadmap to hit your KPIs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="process-step">
                        <div class="step-icon mb-3">
                            <span
                                style="display:inline-block; width:60px; height:60px; line-height:60px; background:#007bff; color:#fff; border-radius:50%; font-size:24px; font-weight:bold;">3</span>
                        </div>
                        <h4>Execution</h4>
                        <p>Our experts implement the campaigns and optimize on-page elements.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="process-step">
                        <div class="step-icon mb-3">
                            <span
                                style="display:inline-block; width:60px; height:60px; line-height:60px; background:#007bff; color:#fff; border-radius:50%; font-size:24px; font-weight:bold;">4</span>
                        </div>
                        <h4>Optimization</h4>
                        <p>Continuous monitoring and tweaking to maximize results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="prt-row bg-base-skincolor clearfix text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-black mb-3">Ready to Grow Your Business?</h2>
                    <p class="text-black mb-4" style="font-size: 18px;">Let's discuss how we can help you achieve your
                        digital marketing goals.</p>
                    <a href="{{ route('enquiry.index') }}" class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-black">
                        Start Your Project
                    </a>
                </div>
            </div>
        </div>
    </section>

    </div>
    <!-- site-main end -->

@endsection


