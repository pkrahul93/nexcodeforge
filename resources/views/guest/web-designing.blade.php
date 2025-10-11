@extends('layouts.guest')
@section('title', 'Website Designing Company in India | NexCodeForge - UI/UX, Responsive Web Development & Digital Solutions')

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
                            <h2 class="title">Website Design & UI/UX Development</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                            <span class="action">Website Designing</span>
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

    <!-- Empower Section -->
    <section class="prt-row progressbar-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="prt-bg prt-col-bgimage-yes col-bg-img-six">
                        <div class="prt-col-wrapper-bg-layer prt-bg-layer"></div>
                    </div>
                    {{-- <img class="img-fluid prt-equal-height-image w-100 position-relative" src="{{ asset('guest/assets/images/pagetitle02.png') }}" alt="Website Design by NexCodeForge"> --}}
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="prt-bg pt-20 pb-20 pl-20">
                        <div class="layer-content">
                            <div class="position-relative">
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="detail-page-heading">Crafting Digital Experiences That Inspire</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>
                                            At <strong>NexCodeForge</strong>, we build <strong>visually stunning and performance-driven websites</strong> designed to convert visitors into loyal customers. Our UI/UX experts combine modern aesthetics with smart technology to deliver web experiences that are engaging, accessible, and mobile-first.
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="sd-sub-heading">Our Design Expertise</h3>
                                    <p class="sd-text">
                                        From <strong>wireframing and prototyping</strong> to pixel-perfect implementation, our team ensures every design element has a purpose. We create <strong>responsive websites, intuitive dashboards, and conversion-focused landing pages</strong> that align perfectly with your business goals.
                                    </p>
                                </div>

                                <div class="progress-bar-main border-0 res-991-mt-20">
                                    <div class="prt-progress-bar style1" data-percent="98%">
                                        <div class="progress-bar-title d-flex justify-content-between">
                                            <h3 class="progress-title">Creative Design Strategy</h3>
                                            <h3 class="progress-percentage counter">98%</h3>
                                        </div>
                                        <div class="progress-bar-inner">
                                            <div class="progress-bar progress-bar-color-bar_skincolor" style="width:98%;"></div>
                                        </div>
                                    </div>

                                    <div class="prt-progress-bar style1" data-percent="94%">
                                        <div class="progress-bar-title d-flex justify-content-between">
                                            <h3 class="progress-title">User Experience Optimization</h3>
                                            <h3 class="progress-percentage counter">94%</h3>
                                        </div>
                                        <div class="progress-bar-inner">
                                            <div class="progress-bar progress-bar-color-bar_skincolor" style="width:94%;"></div>
                                        </div>
                                    </div>

                                    <div class="prt-progress-bar style1" data-percent="90%">
                                        <div class="progress-bar-title d-flex justify-content-between">
                                            <h3 class="progress-title">Research & Strategy</h3>
                                            <h3 class="progress-percentage counter">90%</h3>
                                        </div>
                                        <div class="progress-bar-inner">
                                            <div class="progress-bar progress-bar-color-bar_skincolor" style="width:90%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Empower Section end -->

    <!-- Stay Ahead -->
    <section class="prt-row padding_top_zero-section process-section clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section-title mb-0">
                        <div class="title-header">
                            <h2 class="section-title-h2 mb-0">Why Choose Us</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7"><div class="title-line res-991-mt-20"></div></div>
            </div>

            <div class="row mt-20">
                <div class="col-lg-12">
                    <div class="service-process-box">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="service-processbox-content">
                                    <h3 class="sd-sub-heading">Innovative Web Design Solutions</h3>
                                    <p class="sd-text mb-0">
                                        We don’t just design — we create digital experiences. Each project reflects our focus on performance, creativity, and conversion. Whether it’s a corporate site, eCommerce store, or startup landing page, we help your brand shine online.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="service-process-image res-991-mt-20">
                                    <img class="img-fluid w-100" src="{{ asset('guest/assets/images/sections/creative-web-design.jpg') }}" alt="Creative Website Design India">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="service-process-box">
                        <div class="row align-items-center">
                            <div class="col-lg-7 img-order-md-1">
                                <div class="service-process-image res-991-mt-20">
                                    <img class="img-fluid w-100" src="{{ asset('guest/assets/images/sections/responsive-design.jpg') }}" alt="Responsive Website Development">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="service-processbox-content">
                                    <h3 class="sd-sub-heading">Responsive & SEO-Optimized Designs</h3>
                                    <p class="sd-text mb-0">
                                        We ensure your website looks flawless across every screen — from mobile to desktop. Every page is optimized for <strong>speed, accessibility, and search engines</strong>, helping your business rank higher and perform better.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="service-process-box">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="service-processbox-content">
                                    <h3 class="sd-sub-heading">User-First Interface Design</h3>
                                    <p class="sd-text mb-0">
                                        Our UX designers dive deep into user behavior to craft smooth, intuitive, and impactful digital journeys. From layout to interaction, every detail enhances engagement and trust.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="service-process-image res-991-mt-20">
                                    <img class="img-fluid w-100" src="{{ asset('guest/assets/images/sections/user-interface-design.jpg') }}" alt="UI/UX Design NexCodeForge">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Stay Ahead end -->

    <!-- Strategic Design -->
    <section class="prt-row padding_top_zero-section clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title mb-0">
                        <div class="title-header">
                            <h2 class="section-title-h2 mb-0">Strategic Design Planning</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"><div class="title-line res-991-mt-20"></div></div>
            </div>

            <div class="row mt-50">
                <div class="col-xl-5">
                    <div class="prt-bg bg-base-gradient spacing-5">
                        <div class="row row-equal-height slick_slider" data-slick='{"slidesToShow": 1, "autoplay":true, "infinite":true}'>
                            <div class="col-lg-12 testimonials-main">
                                <div class="testimonials-style2">
                                    <div class="testimonials-style1-content">
                                        <p class="testimonial-prt-box-desc-p">
                                            “NexCodeForge elevated our online presence beyond expectations. Their design team delivered a clean, modern, and impactful interface that boosted our leads instantly.”
                                        </p>
                                        <div class="prt-box-footer">
                                            <h3 class="testimonial-caption-h3">Amit Verma</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 testimonials-main">
                                <div class="testimonials-style2">
                                    <div class="testimonials-style2-content">
                                        <p class="testimonial-prt-box-desc-p">
                                            “Our new website not only looks great but performs beautifully. The NexCodeForge team truly understands UI/UX and business strategy.”
                                        </p>
                                        <div class="prt-box-footer">
                                            <h3 class="testimonial-caption-h3">Neha Kapoor</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 testimonials-main">
                                <div class="testimonials-style2">
                                    <div class="testimonials-style2-content">
                                        <p class="testimonial-prt-box-desc-p">
                                            “Professional, quick, and creative. NexCodeForge has become our go-to agency for every design and branding need.”
                                        </p>
                                        <div class="prt-box-footer">
                                            <h3 class="testimonial-caption-h3">Rohit Sinha</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="overflow-hiden pl-20 res-1199-pl-0 res-1199-pt-30">
                        <div>
                            <h3 class="sd-sub-heading">Digital Strategy Meets Design Excellence</h3>
                            <p class="sd-text">
                                With a combined experience of over two decades, <strong>NexCodeForge</strong> integrates design thinking with advanced technology to deliver results-driven digital platforms that accelerate business growth.
                            </p>
                        </div>

                        <div class="prt-col-bgcolor-yes bg-base-dark text-base-white col-bg-img-seven prt-col-bgimage-yes prt-bg mt-25">
                            <div class="layer-content spacing-6">
                                <div class="fid-block-content">
                                    <h3 class="sd-sub-heading text-white">Building Brands for Tomorrow</h3>
                                    <p class="sd-text">
                                        Our design philosophy focuses on flexibility, scalability, and future-readiness. Every website we build grows with your business and evolves with your customers.
                                    </p>
                                </div>

                                <div class="row g-0 prt-vertical_sep ml_20">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="prt-fid inside style2 text-white">
                                            <h4 class="prt-fid-inner">25+</h4>
                                            <h3 class="prt-fid-title">Years Combined Experience</h3>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="prt-fid inside style2 text-white">
                                            <h4 class="prt-fid-inner">150+</h4>
                                            <h3 class="prt-fid-title">Satisfied Clients</h3>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="prt-fid inside style2 text-white">
                                            <h4 class="prt-fid-inner">200+</h4>
                                            <h3 class="prt-fid-title">Projects Delivered</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Strategic Design end -->
</div>
<!-- site-main end -->

@endsection
