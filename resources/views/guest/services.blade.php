@extends('layouts.guest')
@section('title', 'Web & App Development Services | NexCodeForge')
@section('meta_description', 'Explore NexCodeForge’s full-stack web and app development services — from corporate sites and eCommerce platforms to CRM and IT solutions built for growth.')

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
                                <h2 class="title">Our Services</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Services</span>
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

        <!--service-section-->
        <section class="prt-row service-section clearfix" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-12">
                        <div class="section-title">
                            <div class="title-header">
                                <h2 class="title">Smart Digital Solutions for Modern Businesses</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="process-desc pl-90">
                            <p class="desc-text">
                                At <b>NexcodeForge</b>, we build intelligent digital solutions that help startups,
                                enterprises, and global brands
                                accelerate growth. Our services span across <b>software development, IoT, cloud-based SaaS,
                                    UI/UX, and marketing automation</b> —
                                tailored to deliver measurable impact and long-term scalability.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="prt-horizontal_sep mb-35 mt-25"></div>

                <div class="row row-equal-height prt-vertical_sep style1">
                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="images/icon-01.png" loading="lazy" alt="UI UX Design"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="#">UI/UX & Creative Design</a>
                                </h3>
                                <p>We design visually stunning, conversion-focused interfaces for web and mobile that
                                    enhance user experiences and brand perception.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="images/icon-02.png" loading="lazy" alt="Web Development"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="#">Web & App Development</a>
                                </h3>
                                <p>From enterprise-grade web applications to fast, responsive mobile apps — we develop
                                    products that perform and scale effortlessly.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="images/icon-03.png" loading="lazy" alt="Digital Marketing"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="#">Digital Marketing & SEO</a>
                                </h3>
                                <p>We combine creativity and analytics to grow your online visibility, drive traffic, and
                                    boost your brand through targeted campaigns.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="images/icon-04.png" loading="lazy" alt="Customer Support"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="#">Maintenance & Support</a>
                                </h3>
                                <p>We ensure your systems stay secure, updated, and optimized 24/7 — so you can focus on
                                    business while we handle technology.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--service-section end-->
        <style>
            .bg-base-dark {
                background-color: #0f141c !important;
                opacity: 0.95;
            }

            .row-heading-h2,
            .row-heading-h3,
            .text-color-light,
            .prt-fid-title {
                color: #ffffff !important;
            }
        </style>
        <section class="prt-row bg-img4 prt-bgimage-yes prt-bg bg-base-dark fid-section clearfix"
            style="position: relative; background: linear-gradient(90deg, rgba(0,0,0,0.75), rgba(0,0,0,0.4)), url('images/bg-img4.jpg') center/cover no-repeat;">
            <div class="container" style="position: relative; z-index: 2;">
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class="row-heading-h3 text-white">One <br>Platform</h3>
                    </div>
                    <div class="col-lg-10">
                        <h2 class="row-heading-h2 text-white">Endless</h2>
                        <h2 class="row-heading-h2 pl-220 text-base-skin">Possibilities</h2>
                    </div>
                </div>

                <div class="row align-items-center mt-65">
                    <div class="col-lg-6">
                        <p class="text-light" style="font-size: 18px; line-height: 1.8;">
                            For over a decade, <b>NexcodeForge</b> has been a trusted name in <b>custom web solutions, SaaS
                                development, IoT integration,</b> and <b>business automation</b>.
                            With 10+ years of experience and 50+ successful projects, we transform complex challenges into
                            seamless digital ecosystems.
                        </p>
                        <div class="features-fid-item-wrapper res-991-mt-30">
                            <div class="row g-0 prt-vertical_sep">
                                <div class="col-6">
                                    <div class="prt-fid inside style1 text-white">
                                        <h4 class="prt-fid-inner">10+</h4>
                                        <h3 class="prt-fid-title">Years of Experience</h3>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="prt-fid inside style1 text-white">
                                        <h4 class="prt-fid-inner">50+</h4>
                                        <h3 class="prt-fid-title">Projects Delivered</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 text-right pl-20">
                        <img width="610" height="435" class="img-fluid rounded shadow-lg" src="images/singleimg-04.png""
                            alt="Software Solutions">
                    </div>
                </div>
            </div>
        </section>


        <!--tab-section-->
        <section class="prt-row tab-section01 clearfix">
            <div class="container">
                <div class="row align-items-center mb-40">
                    <div class="col-xl-6">
                        <h2 class="title">Industries We Serve</h2>
                    </div>
                    <div class="col-xl-6">
                        <p class="desc-text">
                            From fintech to e-commerce and healthcare, NexcodeForge provides industry-specific solutions
                            built on
                            innovation, scalability, and deep business understanding.
                        </p>
                    </div>
                </div>

                <div class="prt-tabs tab-style-2">
                    <ul class="tabs tabs-menu-2">
                        <li class="tab active"><a href="#">Hi-Tech</a></li>
                        <li class="tab"><a href="#">Media & Entertainment</a></li>
                        <li class="tab"><a href="#">Automotive</a></li>
                        <li class="tab"><a href="#">Banking & FinTech</a></li>
                        <li class="tab"><a href="#">Healthcare</a></li>
                        <li class="tab"><a href="#">E-Commerce</a></li>
                    </ul>

                    <div class="content-tab">
                        <div class="content-inner active">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <img class="img-fluid" src="images/tab-img01.png" alt="Hi-Tech Solutions">
                                </div>
                                <div class="col-xl-6">
                                    <h3 class="tab-content-h3">Building Tomorrow’s Technology Today</h3>
                                    <p>
                                        We deliver advanced technology solutions including <b>IoT systems, cloud migration,
                                            API integration,
                                            and AI-driven applications</b> that help businesses innovate faster and stay
                                        future-ready.
                                    </p>
                                    <ul class="tab-list-1">
                                        <li><i class="fas fa-arrow-right"></i> Cloud-Native Applications</li>
                                        <li><i class="fas fa-arrow-right"></i> Enterprise SaaS Platforms</li>
                                        <li><i class="fas fa-arrow-right"></i> IoT-Enabled Business Systems</li>
                                        <li><i class="fas fa-arrow-right"></i> Custom Automation Tools</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-inner" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <img class="img-fluid" src="images/tab-img02.jpg" alt="Media and Marketing">
                                </div>
                                <div class="col-xl-6">
                                    <h3 class="tab-content-h3">Digital Media & Brand Growth</h3>
                                    <p>
                                        From content management to audience analytics, we build platforms that enhance
                                        engagement,
                                        deliver insights, and amplify your brand across channels.
                                    </p>
                                    <ul class="tab-list-1">
                                        <li><i class="fas fa-arrow-right"></i> Streaming Platform Development</li>
                                        <li><i class="fas fa-arrow-right"></i> AI-Powered Content Analytics</li>
                                        <li><i class="fas fa-arrow-right"></i> Social Media Automation</li>
                                        <li><i class="fas fa-arrow-right"></i> SEO & Ad Campaign Optimization</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-inner" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <img class="img-fluid" src="images/tab-img01.png" alt="Automotive Solutions">
                                </div>
                                <div class="col-xl-6">
                                    <h3 class="tab-content-h3">Driving Digital Transformation in Automotive</h3>
                                    <p>
                                        We help automotive brands build smarter systems — from connected car dashboards to
                                        predictive maintenance software.
                                    </p>
                                    <ul class="tab-list-1">
                                        <li><i class="fas fa-arrow-right"></i> Connected Vehicle Apps</li>
                                        <li><i class="fas fa-arrow-right"></i> Fleet Management Dashboards</li>
                                        <li><i class="fas fa-arrow-right"></i> Predictive Analytics</li>
                                        <li><i class="fas fa-arrow-right"></i> IoT Device Integration</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-inner" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <img class="img-fluid" src="images/tab-img02.jpg" alt="Banking Fintech Solutions">
                                </div>
                                <div class="col-xl-6">
                                    <h3 class="tab-content-h3">FinTech Solutions that Empower Growth</h3>
                                    <p>
                                        NexcodeForge builds secure and scalable <b>fintech and banking software</b> — from
                                        loan platforms to AI credit analysis dashboards.
                                    </p>
                                    <ul class="tab-list-1">
                                        <li><i class="fas fa-arrow-right"></i> Credit Scoring Automation</li>
                                        <li><i class="fas fa-arrow-right"></i> API-Driven Payment Gateways</li>
                                        <li><i class="fas fa-arrow-right"></i> Secure KYC Systems</li>
                                        <li><i class="fas fa-arrow-right"></i> Real-Time Fraud Detection</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-inner" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <img class="img-fluid" src="images/tab-img01.png" alt="Healthcare Solutions">
                                </div>
                                <div class="col-xl-6">
                                    <h3 class="tab-content-h3">Smart Healthcare Technology</h3>
                                    <p>
                                        We design secure healthcare platforms for hospitals, clinics, and startups —
                                        ensuring faster patient care and efficient data handling.
                                    </p>
                                    <ul class="tab-list-1">
                                        <li><i class="fas fa-arrow-right"></i> Telemedicine & Appointment Systems</li>
                                        <li><i class="fas fa-arrow-right"></i> IoT Health Monitoring</li>
                                        <li><i class="fas fa-arrow-right"></i> Electronic Health Records (EHR)</li>
                                        <li><i class="fas fa-arrow-right"></i> AI-Powered Diagnosis Tools</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-inner" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <img class="img-fluid" src="images/tab-img02.jpg" alt="E-commerce Development">
                                </div>
                                <div class="col-xl-6">
                                    <h3 class="tab-content-h3">Next-Gen E-Commerce Solutions</h3>
                                    <p>
                                        From marketplace portals to B2B systems, we create scalable, high-performing
                                        <b>e-commerce platforms</b> that grow your revenue and visibility.
                                    </p>
                                    <ul class="tab-list-1">
                                        <li><i class="fas fa-arrow-right"></i> Custom E-Commerce Storefronts</li>
                                        <li><i class="fas fa-arrow-right"></i> Omnichannel Integrations</li>
                                        <li><i class="fas fa-arrow-right"></i> Secure Payment Systems</li>
                                        <li><i class="fas fa-arrow-right"></i> Marketplace Automation Tools</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-40">
                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant"
                        href="{{ url('contactus') }}">
                        Let’s Build Your Project
                    </a>
                </div>
            </div>
        </section>
        <!--tab-section end-->

    </div>
    <!-- site-main end -->
@endsection
