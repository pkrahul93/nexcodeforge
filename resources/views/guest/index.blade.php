@extends('layouts.guest')
@section('title', 'Custom Website & App Development | NexCodeForge')
@section('meta_description',
    'NexCodeForge crafts responsive, SEO-friendly websites and custom applications that turn
    ideas into powerful digital solutions. Build your online success with us.')

    <style>
        /* ---------- Base Layout ---------- */
        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
        }

        /* ---------- Background ---------- */
        .hero-bg img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6) saturate(1.2);
            z-index: 1;
        }

        /* ---------- Overlay (Top abstract & gradient) ---------- */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }

        .overlay-img {
            width: 100%;
            height: auto;
            mix-blend-mode: screen;
            opacity: 0.8;
        }

        .abstract-svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 300px;
        }

        /* ---------- Dark overlay for contrast ---------- */
        .dark-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.7) 100%);
            z-index: 3;
        }

        /* ---------- Content ---------- */
        .hero-content {
            position: relative;
            z-index: 4;
            text-align: center;
            max-width: 770px;
            padding: 0 20px;
            animation: fadeInUp 1.2s ease forwards;
        }

        .hero-content h1 {
            font-size: 58px;
            line-height: 1.2;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
            margin-bottom: 15px;
            opacity: 0;
            animation: fadeIn 1s ease 0.4s forwards;
        }

        .hero-content h1 .highlight {
            background: linear-gradient(90deg, #05c8f9, #007bff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content h2 {
            font-size: 26px;
            font-weight: 500;
            color: #05c8f9;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeIn 1s ease 0.7s forwards;
        }

        .hero-content p {
            font-size: 18px;
            line-height: 1.7;
            color: #ddd;
            margin-bottom: 35px;
            opacity: 0;
            animation: fadeIn 1s ease 1s forwards;
        }

        /* ---------- Button ---------- */
        .hero-btn {
            background: linear-gradient(90deg, #05c8f9, #007bff);
            color: #fff;
            padding: 14px 38px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(5, 200, 249, 0.4);
            opacity: 0;
            animation: fadeIn 1s ease 1.3s forwards;
        }

        .hero-btn:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #007bff, #05c8f9);
            box-shadow: 0 10px 35px rgba(5, 200, 249, 0.6);
        }

        /* ---------- Animations ---------- */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 768px) {
            .hero-section {
                height: 92vh;
            }

            .hero-content h1 {
                font-size: 34px;
            }

            .hero-content h2 {
                font-size: 18px;
            }

            .hero-content p {
                font-size: 15px;
            }

            .hero-btn {
                padding: 10px 25px;
                font-size: 14px;
            }

            .abstract-svg {
                height: 150px;
            }
        }

        .promo-popup {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .promo-cont {
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
            font-weight: 600;
            color: #f3e7e7;
            text-shadow: 2px -2px #000;
        }

        .promo-popup.show {
            opacity: 1;
            pointer-events: auto;
        }

        /* --- Promo Content Box with Background --- */
        .promo-content {
            position: relative;
            max-width: 700px;
            height: 490px;
            width: 90%;
            border-radius: 12px;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .promo-popup.show .promo-content {
            transform: scale(1);
        }

        /* Overlay inside content for readability */
        .promo-content::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        /* Inner text area */
        .promo-inner {
            position: relative;
            z-index: 1;
            color: #fff;
            padding: 30px 20px;
            text-align: center;
        }

        .promo-inner h2 {
            font-size: 32px;
            line-height: 40px;
            color: #fff;
            text-shadow: 2px -2px #000;
            margin-top: 13px;
        }

        /* Close button */
        .promo-close {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background: rgba(255, 0, 0, 0.8);
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            font-weight: bold;
            font-size: 16px;
            z-index: 2;
            transition: background 0.2s;
        }

        .promo-close:hover {
            background: rgb(240, 239, 236);
            color: rgba(255, 0, 0, 0.8);
        }

        @media(max-width:600px) {
            .promo-content {
                height: 510px !important;
            }

            .promo-cont {
                font-size: 16px !important;
            }

            .promo-inner h2 {
                font-size: 25px !important;
            }
        }

        /* ================= WORK PROCESS FLOW ================= */

        .process-flow {
            position: relative;
            align-items: flex-start;
        }

        .process-step {
            padding: 20px;
        }

        .process-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: linear-gradient(135deg, #05c8f9, #007bff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #fff;
            box-shadow: 0 8px 25px rgba(5, 200, 249, 0.4);
        }

        .process-step h4 {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .process-step p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        /* Connecting line */
        .process-line {
            position: absolute;
            top: 54px;
            width: 76% !important;
            height: 2px;
            background: linear-gradient(to right, #05c8f9, #007bff);
            z-index: -1;
        }

        /* Desktop alignment fix */
        @media (min-width: 992px) {
            .process-line {
                left: 12.5%;
                right: 12.5%;
            }
        }

        /* Mobile adjustments */
        @media (max-width: 991px) {
            .process-line {
                display: none;
            }

            .process-step {
                margin-bottom: 30px;
            }
        }

        /* ================= WHY CHOOSE US ================= */

        .why-choose-section {
            background: linear-gradient(to bottom,
                    rgba(5, 200, 249, 0.04),
                    rgba(0, 123, 255, 0.02));
        }

        .why-box {
            text-align: center;
            padding: 35px 25px;
            border-radius: 16px;
            background: #fff;
            height: 100%;
            transition: all 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        .why-box::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #05c8f9, #007bff);
            opacity: 0;
            transition: opacity 0.35s ease;
            z-index: 0;
        }

        .why-box:hover::before {
            opacity: 0.05;
        }

        .why-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
        }

        .why-box h3,
        .why-box p,
        .why-icon {
            position: relative;
            z-index: 1;
        }

        .why-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: linear-gradient(135deg, #05c8f9, #007bff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #fff;
            box-shadow: 0 10px 25px rgba(5, 200, 249, 0.45);
        }

        .why-box h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .why-box p {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        /* Mobile spacing */
        @media (max-width: 767px) {
            .why-box {
                margin-bottom: 25px;
            }
        }

        /* ================= SERVICES ADVANCED ================= */

        .service-card {
            position: relative;
            background: #fff;
            border-radius: 18px;
            padding: 42px 30px 55px;
            text-align: center;
            height: 100%;
            transition: all 0.35s ease;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.14);
        }

        .service-icon {
            width: 75px;
            height: 75px;
            margin: 0 auto 18px;
            border-radius: 50%;
            /* background: linear-gradient(135deg, #05c8f9, #007bff); */
            background: linear-gradient(135deg, #05c8f9, #050608);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            color: #fff;
            box-shadow: 0 10px 30px rgba(5, 200, 249, 0.45);
        }

        .service-card h3 {
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .service-card p {
            font-size: 15px;
            color: #555;
            line-height: 1.6;
        }

        /* Price badge */
        .price-badge {
            position: absolute;
            top: 18px;
            right: 18px;
            background: linear-gradient(135deg, #05c8f9, #007bff);
            color: #fff;
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        /* Detail link */
        .service-link {
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
        }

        /* Hover CTA */
        .hover-cta {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #05c8f9, #007bff);
            color: #fff;
            padding: 10px 22px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.35s ease;
        }

        .service-card:hover .hover-cta {
            bottom: 8px;
        }

        /* Mobile spacing */
        @media (max-width: 767px) {
            .service-card {
                /* margin-bottom: 25px; */
                padding-bottom: 60px;
            }
        }

        /* ================= IOT COLORS ================= */
        :root {
            --brand-color: #4f46e5;
            /* 🔥 Change this to your exact brand color */
            --brand-dark: #3730a3;
        }

        /* Image hover */
        .it-image {
            transition: transform 0.6s ease, box-shadow 0.6s ease;
        }

        .it-image:hover {
            transform: scale(1.04);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        /* Feature cards */
        .feature-box {
            background: #fff;
            padding: 18px;
            border-radius: 14px;
            transition: all 0.4s ease;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-box i {
            color: var(--brand-color);
            transition: transform 0.4s ease;
        }

        .feature-box:hover i {
            transform: rotate(-5deg) scale(1.15);
        }

        /* CTA Button */
        .btn-brand {
            background: var(--brand-color);
            color: #fff;
            padding: 14px 30px;
            border-radius: 40px;
            font-weight: 600;
            transition: all 0.4s ease;
        }

        .btn-brand:hover {
            background: var(--brand-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.4);
        }

        /* Mobile Optimization */
        @media (max-width: 768px) {
            .section-title h2 {
                font-size: 28px;
            }

            .btn-brand {
                width: 100%;
                text-align: center;
            }
        }
    </style>

@section('content')
    <!-- site-main start -->
    <div class="site-main">
        <section class="hero-section">
            <!-- Main Background -->
            <div class="hero-bg">
                <img src="{{ asset('guest/assets/images/slider-main-01.png') }}" alt="Business Website Development" />
            </div>

            <!-- Abstract Top Overlay (bgimg01 + gradient blend) -->
            <div class="hero-overlay">
                <img src="{{ asset('guest/assets/images/bgimg01.png') }}" alt="Overlay" class="overlay-img" />
                <svg class="abstract-svg" viewBox="0 0 800 400" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="grad" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#05c8f9" stop-opacity="0.4" />
                            <stop offset="100%" stop-color="#007bff" stop-opacity="0.2" />
                        </linearGradient>
                    </defs>
                    <path d="M0,0 C200,120 600,50 800,180 L800,0 L0,0 Z" fill="url(#grad)" opacity="0.4" />
                </svg>
            </div>

            <!-- Dark Overlay -->
            <div class="dark-overlay"></div>

            <!-- Hero Content -->
            <div class="hero-content">
                {{-- <h1 class="text-white">Build Your Business the <span class="highlight">Smart Way</span></h1> --}}
                <h1 class="text-white">
                    We Build <span class="highlight">Websites & Apps</span><br>
                    That Actually Grow Your Business
                </h1>
                {{-- <h2>IoT • SaaS • E-Commerce • MLM</h2> --}}
                <h2>Web • E-Commerce • SaaS • Custom Applications • MLM</h2>
                {{-- <p>
                    Transform your ideas into scalable digital platforms with our IoT, SaaS,
                    and E-Commerce solutions built for the future.
                </p> --}}
                <p>
                    Stop wasting money on websites that don’t convert.
                    We create fast, secure, and scalable digital solutions
                    designed to bring you real customers.
                </p>

                {{-- <a href="/about" class="hero-btn">Start Your Digital Journey</a> --}}
                <div class="hero-cta mb-3">
                    <a href="{{ url('/enquiry') }}" class="btn btn-lg btn-outline-primary mb-2">Get Free
                        Consultation</a>&nbsp;&nbsp;
                    <a href="{{ url('/enquiry') }}" class="btn btn-lg btn-outline-primary">Free Website Audit</a> <br>
                </div>


                <small class="hero-note my-3 d-block">
                    ✅ No obligation • ✅ Transparent pricing • ✅ Quick response
                </small>

                <div class="hero-cta mt-4">
                    <a href="/about" class="hero-btn">Start Your Digital Journey</a>
                </div>
            </div>
        </section>

        <!-- ================= ABOUT (SAME GRID & STYLE) ================= -->
        <section class="prt-row service-section clearfix" data-aos="fade-up" data-aos-offset="600" data-aos-duration="1500"
            data-aos-once="true">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="section-title">
                            <h2 class="title">Technology That Delivers Real Results</h2>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="process-desc pl-90">
                            <p class="desc-text">
                                NexCodeForge is a technology-driven company helping businesses
                                establish a strong online presence through high-quality
                                websites, e-commerce platforms, and custom software solutions.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-equal-height prt-vertical_sep style1 mt-25">

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="{{ asset('guest/assets/images/icon-01.png') }}" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3>UI/UX That Converts</h3>
                                <p>Designs focused on user experience and lead generation.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="{{ asset('guest/assets/images/icon-02.png') }}" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3>Performance & SEO</h3>
                                <p>Fast-loading, SEO-friendly websites for better visibility.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="{{ asset('guest/assets/images/icon-03.png') }}" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3>Scalable Solutions</h3>
                                <p>Built to grow with your business without rework.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="{{ asset('guest/assets/images/icon-04.png') }}" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3>Reliable Support</h3>
                                <p>Continuous assistance after launch.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= IT SERVICES (UNCHANGED LAYOUT) ================= -->
        <section class="prt-row padding_zero-section prt-bg bg-base-grey clearfix">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Image -->
                    <div class="col-xl-6 mb-4 mb-xl-0">
                        <img class="img-fluid w-100 h-100 rounded it-image"
                            src="{{ asset('guest/assets/images/cloud.jpg') }}" alt="Smart IT & Cloud Solutions">
                    </div>

                    <!-- Content -->
                    <div class="col-xl-6">
                        <div class="prt-bg bg-base-grey spacing-1">

                            <div class="section-title mb-4">
                                <span class="fw-bold text-uppercase" style="color:var(--brand-color)">
                                    What We Offer
                                </span>
                                <h2 class="mt-2">Smart IT & Cloud Solutions</h2>
                                <p class="mt-3">
                                    From business websites to enterprise SaaS platforms, we deliver
                                    <strong>secure, scalable, and performance-driven solutions</strong>
                                    using modern technologies and cloud-first architecture.
                                </p>
                            </div>

                            <div class="row g-4">

                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <i class="fas fa-code fs-3 mb-2"></i>
                                        <h5>Custom Development</h5>
                                        <p class="text-muted mb-0">
                                            Tailor-made web & mobile solutions aligned with your business goals.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <i class="fas fa-cogs fs-3 mb-2"></i>
                                        <h5>Business Automation</h5>
                                        <p class="text-muted mb-0">
                                            Automate workflows to boost productivity and reduce operational cost.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <i class="fas fa-layer-group fs-3 mb-2"></i>
                                        <h5>Modern Tech Stack</h5>
                                        <p class="text-muted mb-0">
                                            Built using modern frameworks, APIs, and cloud infrastructure.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <i class="fas fa-rocket fs-3 mb-2"></i>
                                        <h5>Future-Ready Solutions</h5>
                                        <p class="text-muted mb-0">
                                            Scalable and secure systems ready for tomorrow’s growth.
                                        </p>
                                    </div>
                                </div>

                                <!-- CTA -->
                                <div class="mt-4 text-center">
                                    <a href="{{ url('/contactus') }}" class="hero-btn btn-brand">
                                        🚀 Let’s Build Your Digital Solution
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- marquee -->
        <section class="prt-row padding_zero-section prt-bg bg-base-gradient clearfix">
            <div class="container-fluid p-0">
                <div class="marquee-block overflow-hidden">
                    <div class="marquee">
                        <div class="marquee-content">
                            <div class="marquee-text">Automation</div>
                            <div class="marquee-text">Innovation</div>
                            <div class="marquee-text">MLM Solutions</div>
                            <div class="marquee-text">Digital Commerce</div>
                            <div class="marquee-text">SaaS Solutions</div>
                            <div class="marquee-text">Smart Analytics</div>
                            <div class="marquee-text">IoT Systems</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= WORK PROCESS (AOS ANIMATED) ================= -->
        <section class="prt-row step-section clearfix">
            <div class="container">

                <!-- Section Heading -->
                <div class="row justify-content-center text-center mb-40" data-aos="fade-up" data-aos-duration="900">
                    <div class="col-lg-8">
                        <h2 class="title">Our Simple & Transparent Work Process</h2>
                        <p class="desc-text">
                            From idea to launch — we follow a proven, step-by-step workflow
                            to ensure quality, clarity, and on-time delivery.
                        </p>
                    </div>
                </div>

                <!-- Process Flow -->
                <div class="row process-flow text-center">

                    <!-- Step 1 -->
                    <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="0"
                        data-aos-duration="800">
                        <div class="process-icon">
                            <span>📌</span>
                        </div>
                        <h4>Requirement & Strategy</h4>
                        <p>
                            We understand your business goals, target audience,
                            and project requirements to define the right strategy.
                        </p>
                    </div>

                    <!-- Connector -->
                    <div class="process-line d-none d-lg-block"></div>

                    <!-- Step 2 -->
                    <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="150"
                        data-aos-duration="800">
                        <div class="process-icon">
                            <span>🎨</span>
                        </div>
                        <h4>Design & Development</h4>
                        <p>
                            Our team designs intuitive interfaces and builds
                            secure, scalable solutions using modern technologies.
                        </p>
                    </div>

                    <!-- Connector -->
                    <div class="process-line d-none d-lg-block"></div>

                    <!-- Step 3 -->
                    <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="800">
                        <div class="process-icon">
                            <span>🧪</span>
                        </div>
                        <h4>Testing & Optimization</h4>
                        <p>
                            We rigorously test performance, security, and usability
                            to ensure a smooth and reliable experience.
                        </p>
                    </div>

                    <!-- Connector -->
                    <div class="process-line d-none d-lg-block"></div>

                    <!-- Step 4 -->
                    <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="450"
                        data-aos-duration="800">
                        <div class="process-icon">
                            <span>🚀</span>
                        </div>
                        <h4>Launch & Support</h4>
                        <p>
                            We deploy your project and provide continuous support,
                            updates, and improvements as your business grows.
                        </p>
                    </div>

                </div>

                <!-- CTA -->
                <div class="row mt-40 text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="900">
                    <div class="col-lg-12">
                        <a href="{{ url('contactus') }}" class="prt-btn prt-btn-color-gradiant">
                            Discuss Your Project
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- projects -->
        <section class="prt-row bg-img1 prt-bgimage-yes prt-bg bg-base-dark project-section clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-dark"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-2">
                        <h3 class="row-heading-h3">One<br>Platform</h3>
                    </div>
                    <div class="col-lg-10 col-10">
                        <h2 class="row-heading-h2">Endless</h2>
                        <h2 class="row-heading-h2 pl-220"><span class="text-base-skin">Possibilities</span></h2>
                    </div>
                </div>

                <div class="row mt-50" data-aos="fade-up">
                    @php
                        $projects = [
                            ['title' => 'Cloud Computing', 'img' => 'service-02-654x490.jpg'],
                            ['title' => 'AI-Driven Analytics', 'img' => 'service-06-654x490.jpg'],
                            ['title' => 'Custom SaaS Platforms', 'img' => 'service-01-654x490.png'],
                            ['title' => 'E-Commerce Automation', 'img' => 'service-05-654x490.jpg'],
                            ['title' => 'MLM Business Tools', 'img' => 'service-03-654x490.jpg'],
                            ['title' => 'IoT Infrastructure', 'img' => 'service-07-654x490.png'],
                        ];
                    @endphp
                    @foreach ($projects as $p)
                        <div class="col-lg-6 col-md-6">
                            <div class="service-box style1">
                                <div class="service-box-thumnail">
                                    <img width="654" height="490" class="img-fluid"
                                        src="guest/assets/images/{{ $p['img'] }}" alt="{{ $p['title'] }}">
                                </div>
                                <div class="service-box-content">
                                    <h3 class="service-box-h3">{{ $p['title'] }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- testimonials -->
        <section class="prt-row bg-img2 prt-bgimage-yes prt-bg bg-base-dark testimonial-section clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-dark"></div>
            <div class="container-fluid">
                <div class="row align-items-center spacing-2">
                    <div class="col-lg-3">
                        <h3 class="prt-custom-heading counter">150+</h3>
                        <h3 class="custom-heading-h3">Global Clients</h3>
                        <p>Trusted by startups, SMEs, and enterprises across the globe.</p>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="testimonials-style1">
                                    <p>“NexcodeForge transformed our outdated system into a powerful digital platform that
                                        doubled our efficiency.”</p>
                                    <h3 class="testimonial-caption-h3">— Rahul Mehta, CEO</h3>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="testimonials-style1">
                                    <p>“Their SaaS expertise helped us scale faster with zero downtime — simply the best
                                        team we’ve worked with.”</p>
                                    <h3 class="testimonial-caption-h3">— Aisha Khan, Product Head</h3>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="testimonials-style1">
                                    <p>“From idea to execution, NexcodeForge handled everything flawlessly. Highly
                                        recommended.”</p>
                                    <h3 class="testimonial-caption-h3">— David Lee, CTO</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= WHY US ================= -->
        <section class="prt-row service-section why-choose-section clearfix">
            <div class="container">

                <!-- Heading -->
                <div class="row text-center mb-40" data-aos="fade-up" data-aos-duration="900">
                    <div class="col-lg-12">
                        <h2 class="title">Why Businesses Choose NexCodeForge</h2>
                        <p class="desc-text">
                            We don’t just develop software — we create digital solutions
                            that deliver real business results.
                        </p>
                    </div>
                </div>

                <!-- Cards -->
                <div class="row row-equal-height">

                    <!-- Card 1 -->
                    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="0">
                        <div class="featured-icon-box style1 why-box">
                            <div class="why-icon">🎯</div>
                            <h3 class="text-center">Conversion-Focused Design</h3>
                            <p class="text-center">
                                Strategically designed websites that guide users
                                and turn visitors into paying customers.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="150">
                        <div class="featured-icon-box style1 why-box">
                            <div class="why-icon">⚡</div>
                            <h3 class="text-center">Fast & SEO Ready</h3>
                            <p class="text-center">
                                Optimized performance, clean code, and SEO-ready
                                structure for better visibility and ranking.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="featured-icon-box style1 why-box">
                            <div class="why-icon">💰</div>
                            <h3 class="text-center">Affordable & Transparent</h3>
                            <p class="text-center">
                                Cost-effective solutions with clear pricing —
                                no hidden charges, no surprises.
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="450">
                        <div class="featured-icon-box style1 why-box">
                            <div class="why-icon">🤝</div>
                            <h3 class="text-center">Ongoing Support</h3>
                            <p class="text-center">
                                We stay with you post-launch to provide updates,
                                improvements, and reliable technical support.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- ================= SERVICES ================= -->
        <section class="prt-row bg-base-grey service-enhanced clearfix">
            <div class="container">

                <!-- Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2>Our Services</h2>
                    <p>Complete digital solutions to launch, scale, and grow your business</p>
                </div>

                <div class="row">

                    <!-- Service 1 -->
                    <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                        <div class="service-box service-card">
                            <span class="price-badge">Starting ₹9,999</span>
                            <div class="service-icon">🚀</div>
                            <h3>Professional Business Websites</h3>
                            <p>
                                High-converting, mobile-first websites designed
                                to build trust and generate leads.
                            </p>
                            <a href="{{ url('/web-designing') }}" class="service-link">
                                View Details →
                            </a>
                            <a href="{{ url('/enquiry') }}" class="hover-cta">
                                Get Quote
                            </a>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-box service-card">
                            <span class="price-badge">Starting ₹24,999</span>
                            <div class="service-icon">🛒</div>
                            <h3>E-Commerce Development</h3>
                            <p>
                                Secure, scalable online stores with payment gateway,
                                inventory, and order management.
                            </p>
                            <a href="{{ url('/services/ecommerce') }}" class="service-link">
                                View Details →
                            </a>
                            <a href="{{ url('/enquiry') }}" class="hover-cta">
                                Build Store
                            </a>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box service-card">
                            <span class="price-badge">Custom Pricing</span>
                            <div class="service-icon">⚙️</div>
                            <h3>Custom Web & App Development</h3>
                            <p>
                                SaaS platforms, dashboards, and custom applications
                                tailored to your business workflows.
                            </p>
                            <a href="{{ url('/services/custom-development') }}" class="service-link">
                                View Details →
                            </a>
                            <a href="{{ url('/enquiry') }}" class="hover-cta">
                                Discuss Idea
                            </a>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                        <div class="service-box service-card">
                            <span class="price-badge">Enterprise Ready</span>
                            <div class="service-icon">🌐</div>
                            <h3>MLM Software Solutions</h3>
                            <p>
                                Secure and scalable MLM systems with
                                commission logic, dashboards, and reports.
                            </p>
                            <a href="{{ url('/services/mlm-solutions') }}" class="service-link">
                                View Details →
                            </a>
                            <a href="{{ url('/enquiry') }}" class="hover-cta">
                                Request Demo
                            </a>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-box service-card">
                            <span class="price-badge">Quick Upgrade</span>
                            <div class="service-icon">🎨</div>
                            <h3>Website Redesigning</h3>
                            <p>
                                Transform outdated websites into modern,
                                fast, and conversion-focused experiences.
                            </p>
                            <a href="{{ url('/web-redesigning') }}" class="service-link">
                                View Details →
                            </a>
                            <a href="{{ url('/enquiry') }}" class="hover-cta">
                                Redesign Now
                            </a>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box service-card">
                            <span class="price-badge">Growth Focused</span>
                            <div class="service-icon">📈</div>
                            <h3>Digital Growth Solutions</h3>
                            <p>
                                SEO, performance optimization, automation,
                                and digital strategies to grow your brand.
                            </p>
                            <a href="{{ url('/digital-marketing') }}" class="service-link">
                                View Details →
                            </a>
                            <a href="{{ url('/enquiry') }}" class="hover-cta">
                                Boost Growth
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- ================= CTA ================= -->
        <section class="prt-row bg-base-dark clearfix text-center">
            <div class="container">
                <h2 class="text-white">Ready to Start Your Project?</h2>
                <p class="text-light">
                    Get expert guidance and a clear roadmap for your website or app.
                </p>

                <a href="{{ url('/contactus') }}" class="hero-btn">
                    Book Free Consultation
                </a>
            </div>
        </section>

        <!-- ================= BLOG ================= -->
        <section class="prt-row blog-section clearfix">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Latest Insights from NexcodeForge</h2>
                    <p>Explore trends in IoT, SaaS, digital marketing, and tech innovations shaping the future.</p>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4">
                            <a href="{{ route('blog.details', $blog->slug) }}" target="_blank"
                                rel="noopener noreferrer">
                                <img src="{{ $blog->image_url ?? asset('images/default-blog.jpg') }}" loading="lazy"
                                    class="img-fluid" alt="{{ $blog->title }}">
                                <h3>{{ $blog->title }}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @if ($activePromotions->count())
        @foreach ($activePromotions as $promo)
            @php
                $popupCookie = 'promo_seen_' . $promo->id;
            @endphp

            @if (!Cookie::get($popupCookie))
                <div class="promo-popup" id="promo-popup-{{ $promo->id }}">
                    <div class="promo-overlay"></div>
                    <div class="promo-content"
                        style="background-image: url('{{ asset('uploads/promotions/' . $promo->image) }}');">
                        <div class="promo-inner">
                            <h2>{{ $promo->title }}</h2>
                            <hr>
                            <div class="promo-cont">
                                <p>{{ $promo->content }}</p>
                            </div>
                            @if ($promo->button_link)
                                <div class="text-center my-3">
                                    <a href="{{ $promo->button_link }}" class="hero-btn">
                                        {{ $promo->button_text ?? 'Learn More' }}
                                    </a>
                                </div>
                            @endif
                            <button class="promo-close" data-id="{{ $promo->id }}">X</button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach


        <script>
            const promoTimers = @json($activePromotions->pluck('timer', 'id'));
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const popups = document.querySelectorAll('.promo-popup');
                const promoTimers = @json($activePromotions->pluck('timer', 'id')); // { id: timerInSeconds }
                const popupArray = Array.from(popups);

                // Delay before first popup appears (in seconds)
                const initialDelay = 5; // e.g. show first popup after 10 seconds of page load

                // Delay between closing one popup and showing next (in seconds)
                const gapBetweenPopups = 15; // e.g. 15 seconds gap

                // Start showing popups after initial delay
                setTimeout(() => {
                    showPopupsSequentially(popupArray);
                }, initialDelay * 1000);

                async function showPopupsSequentially(popupList) {
                    for (const popup of popupList) {
                        const id = popup.id.split('-').pop();
                        const timer = parseInt(promoTimers[id]) || 0; // popup display duration

                        // Wait for the popup to finish (close or timeout)
                        await showPopup(popup, id, timer);

                        // Wait some time before showing the next one
                        await delay(gapBetweenPopups * 1000);
                    }
                }

                function showPopup(popup, id, timer) {
                    return new Promise(resolve => {
                        popup.classList.add('show');

                        let autoCloseTimeout = null;

                        // Auto-close popup after timer
                        if (timer > 0) {
                            autoCloseTimeout = setTimeout(() => {
                                closePopup(popup, id);
                                resolve(); // move to next popup
                            }, timer * 1000);
                        }

                        // Manual close button
                        popup.querySelector('.promo-close').addEventListener('click', () => {
                            if (autoCloseTimeout) clearTimeout(autoCloseTimeout);
                            closePopup(popup, id);
                            resolve();
                        });
                    });
                }

                function closePopup(popup, id) {
                    popup.classList.remove('show');
                    setTimeout(() => {
                        popup.style.display = 'none';
                    }, 300);

                    // Optional: record that the popup was shown
                    fetch('{{ route('home.cookie') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id
                        })
                    });
                }

                // Helper: wait function
                function delay(ms) {
                    return new Promise(resolve => setTimeout(resolve, ms));
                }
            });
        </script>

    @endif


@endsection
