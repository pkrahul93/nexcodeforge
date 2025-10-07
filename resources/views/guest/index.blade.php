@extends('layouts.guest')

@section('content')
    <!-- site-main start -->
    <div class="site-main">
        <section class="hero-section">
            <!-- Main Background -->
            <div class="hero-bg">
                <img src="guest/assets/images/slider-main-01.png" alt="Background" />
            </div>

            <!-- Abstract Top Overlay (bgimg01 + gradient blend) -->
            <div class="hero-overlay">
                <img src="guest/assets/images/bgimg01.png" alt="Overlay" class="overlay-img" />
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
                <h1 class="text-white">Build Your Business the <span class="highlight">Smart Way</span></h1>
                <h2>IoT • SaaS • E-Commerce • MLM</h2>
                <p>
                    Transform your ideas into scalable digital platforms with our IoT, SaaS,
                    and E-Commerce solutions built for the future.
                </p>
                <a href="/about" class="hero-btn">Start Your Digital Journey</a>
            </div>
        </section>

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
                max-width: 700px;
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
                    height: 80vh;
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
        </style>

        <!-- About section -->
        <section class="prt-row service-section clearfix" data-aos="fade-up" data-aos-offset="600" data-aos-duration="1500"
            data-aos-once="true">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="section-title">
                            <div class="title-header">
                                <h2 class="title">Innovating Tomorrow with NexcodeForge</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="process-desc pl-90">
                            <p class="desc-text">
                                NexcodeForge is a next-generation software company delivering robust IoT, SaaS,
                                E-Commerce, and custom digital solutions. We help enterprises automate workflows,
                                scale operations, and unlock innovation through technology.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-equal-height prt-vertical_sep style1 mt-25">
                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="guest/assets/images/icon-01.png" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="services.html">UI/UX Design Excellence</a>
                                </h3>
                                <p>Crafting user-centric interfaces that turn complex ideas into seamless experiences.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="guest/assets/images/icon-02.png" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="services.html">Visual & Brand Identity</a>
                                </h3>
                                <p>Building digital brands that communicate trust, creativity, and innovation.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="guest/assets/images/icon-03.png" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="services.html">Digital Marketing Strategy</a>
                                </h3>
                                <p>Helping brands connect, engage, and convert through data-driven campaigns.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="featured-icon-box style1">
                            <div class="featured-icon-thumnail">
                                <img src="guest/assets/images/icon-04.png" loading="lazy" alt="Icon"
                                    class="rotate-img img-fluid">
                            </div>
                            <div class="featured-content">
                                <h3 class="featured-title-h3">
                                    <a href="services.html">Customer-First Support</a>
                                </h3>
                                <p>Delivering quick, reliable, and result-oriented support for all our solutions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- IT Services -->
        <section class="prt-row padding_zero-section prt-bg bg-base-grey clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <img class="img-fluid w-100 h-100" src="guest/assets/images/cloud.jpg" alt="NexcodeForge IT Services">
                    </div>
                    <div class="col-xl-6">
                        <div class="prt-bg bg-base-grey spacing-1">
                            <div class="section-title">
                                <div class="title-header">
                                    <h2>Smart IT & Cloud Solutions</h2>
                                </div>
                                <div class="title-desc">
                                    <p>
                                        NexcodeForge delivers scalable and secure IT solutions built on the latest cloud
                                        infrastructure. From mobile apps to enterprise automation, our experts ensure your
                                        business stays ahead of technology trends.
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-10">
                                <div class="col-lg-6">
                                    <h3>Innovation that Scales</h3>
                                    <h3>Driving Real-World Impact</h3>
                                </div>
                                <div class="col-lg-6">
                                    <h3>Tested & Trusted Frameworks</h3>
                                    <h3>Solutions Built for Growth</h3>
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
                            <div class="marquee-text">Cloud Computing</div>
                            <div class="marquee-text">Digital Commerce</div>
                            <div class="marquee-text">SaaS Solutions</div>
                            <div class="marquee-text">Smart Analytics</div>
                            <div class="marquee-text">IoT Systems</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- projects -->
        <section class="prt-row bg-img1 prt-bgimage-yes prt-bg bg-base-dark project-section clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-dark"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class="row-heading-h3">One<br>Platform</h3>
                    </div>
                    <div class="col-lg-10">
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

        <!-- process -->
        <section class="prt-row step-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <h2>Our Work Process</h2>
                    </div>
                    <div class="col-xl-5">
                        <p class="desc-text">
                            At NexcodeForge, every project follows a streamlined strategy — from ideation and design to
                            deployment and optimization — ensuring efficiency and measurable success.
                        </p>
                        <a class="prt-btn prt-btn-color-gradiant" href="services.html">Discover Our Approach</a>
                    </div>
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

        <!-- blog -->
        <section class="prt-row blog-section clearfix">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Latest Insights from NexcodeForge</h2>
                    <p>Explore trends in IoT, SaaS, digital marketing, and tech innovations shaping the future.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="guest/assets/images/blog/blog-01-828x894.png" class="img-fluid" alt="IoT Blog">
                        <h3><a href="{{ url('blog') }}">How IoT is Transforming Business Operations</a></h3>
                    </div>
                    <div class="col-lg-4">
                        <img src="guest/assets/images/blog/blog-02-828x894.png" class="img-fluid" alt="SaaS Blog">
                        <h3><a href="{{ url('blog') }}">SaaS Models that Drive Scalable Growth</a></h3>
                    </div>
                    <div class="col-lg-4">
                        <img src="guest/assets/images/blog/blog-03-828x894.jpg" class="img-fluid"
                            alt="Digital Marketing Blog">
                        <h3><a href="{{ url('blog') }}">Digital Marketing in the Age of Automation</a></h3>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
