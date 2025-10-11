@extends('layouts.guest')
@section('title', 'About NexCodeForge | Building Digital Success Together')
@section('meta_description',
    'Learn about NexCodeForge — a dedicated web and app development company passionate about
    turning ideas into impactful digital solutions. Our mission is to help businesses grow with innovation, design, and
    technology.')

@section('content')

    <!-- page-title -->
    <div class="prt-page-title-row">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">About NexcodeForge</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">About Us</span>
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

        <!-- who we are -->
        <section class="prt-row about-section01 clearfix">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-xl-6 col-lg-6">
                        <img class="img-fluid prt-equal-height-image w-100 position-relative"
                            src="{{ asset('guest/assets/images/about/Who_we_are.png') }}"
                            alt="NexcodeForge Web and Software Development">
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="prt-bg spacing-4" data-aos="fade-left">
                            <div class="layer-content">
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="section-title-h2">Who We Are</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>
                                            <b>NexcodeForge</b> is an innovation-driven IT and software development company
                                            specializing in <b>IoT, SaaS, E-commerce, and digital transformation</b>.
                                            We empower startups and enterprises with intelligent, scalable, and
                                            performance-focused
                                            technology solutions that help businesses grow sustainably in the digital era.
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <div class="col-lg-6">
                                        <div class="featured-box-main">
                                            <h3 class="featured-box-h3">Design-driven development approach</h3>
                                            <div class="prt-horizontal_sep mt-30 mb-30 border-none"></div>
                                            <h3 class="featured-box-h3">Technology that scales with your goals</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="featured-box-main">
                                            <h3 class="featured-box-h3">Quality assurance & innovation</h3>
                                            <div class="prt-horizontal_sep mt-30 mb-30 border-none"></div>
                                            <h3 class="featured-box-h3">Smart, reliable digital ecosystems</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- what we do -->
                <div class="row mt-4">
                    <div class="col-xl-6 col-lg-6">
                        <div class="prt-bg spacing-4" data-aos="fade-left">
                            <div class="layer-content">
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="section-title-h2">What We Do</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>
                                            At <b>NexcodeForge</b>, we turn ideas into intelligent digital products.
                                            From <b>custom software development</b> to <b>IoT systems, cloud-based SaaS
                                                applications,
                                                business automation, and SEO-optimized websites</b> — we build solutions
                                            that
                                            enhance performance, user experience, and ROI.
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <div class="col-lg-12">
                                        <h4 class="section-title-h3">Our Core Services Include:</h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul>
                                            <li><a href="#">Custom Web & App Development</a></li>
                                            <li><a href="#">E-Commerce & Marketplace Solutions</a></li>
                                            <li><a href="#">SaaS Product Engineering</a></li>
                                            <li><a href="#">IoT Integration & Automation</a></li>
                                            <li><a href="#">UI/UX & Experience Design</a></li>
                                            <li><a href="#">AI-Driven Business Intelligence</a></li>
                                            <li><a href="#">Digital Marketing & SEO Optimization</a></li>
                                            <li><a href="#">Enterprise IT Consulting</a></li>
                                            <li><a href="#">Cloud & DevOps Solutions</a></li>
                                            <li><a href="#">Mobile App Development (Android/iOS)</a></li>
                                            <li><a href="#">Maintenance, Hosting & Support</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center align-items-center">
                        <img class="img-fluid prt-equal-height-image w-100 position-relative"
                            src="{{ asset('guest/assets/images/about/What_we_do.png') }}" style="height:550px;"
                            alt="NexcodeForge Software Services">
                    </div>
                </div>
            </div>
        </section>

        <!-- why choose us -->
        <section class="prt-row prt-bg bg-base-grey clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="prt-bg mt-15" data-aos="fade-right">
                            <div class="layer-content">
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="section-title-h2">Why Choose NexcodeForge</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>
                                            Choosing NexcodeForge means partnering with a team that believes in measurable
                                            success, technical precision, and long-term business impact.
                                            We don’t just deliver projects — we build partnerships that last.
                                        </p>
                                    </div>
                                </div>
                                <div class="prt-box-col-wrapper-style1">
                                    <div class="prt-history-box-content">
                                        <h3 class="prt-history-box-h3">✅ Expert Development Team</h3>
                                        <p>Highly skilled professionals with years of experience across web, mobile, and
                                            cloud technologies.</p>
                                    </div>
                                    <div class="prt-history-box-content">
                                        <h3 class="prt-history-box-h3">✅ SEO-Optimized Solutions</h3>
                                        <p>Every product is designed with performance, ranking, and visibility in mind.</p>
                                    </div>
                                    <div class="prt-history-box-content">
                                        <h3 class="prt-history-box-h3">✅ Mobile-First & Scalable</h3>
                                        <p>Fully responsive, high-performance solutions for any screen and scale.</p>
                                    </div>
                                    <div class="prt-history-box-content">
                                        <h3 class="prt-history-box-h3">✅ Affordable & Transparent</h3>
                                        <p>Flexible pricing models tailored to startups and enterprises alike.</p>
                                    </div>
                                    <div class="prt-history-box-content">
                                        <h3 class="prt-history-box-h3">✅ Timely Delivery</h3>
                                        <p>We value precision and deliver each milestone on schedule — every time.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center align-items-center">
                        <img class="img-fluid prt-equal-height-image w-100 position-relative"
                            src="{{ asset('guest/assets/images/about/why2.webp') }}" alt="Why Choose NexcodeForge">
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
                        <div class="pr-20">
                            <h3 class="prt-custom-heading counter">500+</h3>
                            <h3 class="custom-heading-h3">Happy Clients Worldwide</h3>
                            <p>Trusted by businesses from diverse industries who rely on NexcodeForge to power their digital
                                growth.</p>
                        </div>
                    </div>
                    <div class="col-lg-9 res-991-mt-20">
                        <div class="row row-equal-height slick_slider"
                            data-slick='{"slidesToShow":3,"autoplay":true,"arrows":false}'>
                            <div class="col-lg-4 testimonials-main">
                                <div class="testimonials-style1">
                                    <div class="testimonial-prt-box-desc">
                                        <p>“NexcodeForge built our SaaS dashboard exactly as envisioned — high performance,
                                            responsive, and visually stunning.”</p>
                                        <h3 class="testimonial-caption-h3">— Rohit Sharma, CTO</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 testimonials-main">
                                <div class="testimonials-style1">
                                    <div class="testimonial-prt-box-desc">
                                        <p>“Their development process is transparent and efficient. The IoT integration they
                                            delivered works flawlessly.”</p>
                                        <h3 class="testimonial-caption-h3">— Aditi Verma, Product Head</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 testimonials-main">
                                <div class="testimonials-style1">
                                    <div class="testimonial-prt-box-desc">
                                        <p>“NexcodeForge’s SEO-ready websites helped us rank on Google within weeks —
                                            incredible results!”</p>
                                        <h3 class="testimonial-caption-h3">— Jason Lee, Marketing Director</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- mission and vision -->
        <section class="prt-row tab-section clearfix">
            <div class="container">
                <div class="section-title text-center mb-40">
                    <h2 class="section-title-h2">Our Goals, Vision & Mission</h2>
                    <p>At NexcodeForge, we are committed to helping businesses thrive in a digital-first world through
                        innovation, automation, and human-centric design.</p>
                </div>

                <div class="prt-tabs tab-style1">
                    <ul class="tabs tabs-menu">
                        <li class="tab active"><a class="tab-links tab-link-text1" href="#">Our Goals</a></li>
                        <li class="tab"><a class="tab-links tab-link-text1" href="#">Our Vision</a></li>
                        <li class="tab"><a class="tab-links tab-link-text1" href="#">Our Journey</a></li>
                    </ul>
                    <div class="content-tab">
                        <div class="content-inner active">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <img class="img-fluid" src="{{ asset('guest/assets/images/about/Our_Goals.png') }}"
                                        alt="Our Goals">
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="tab-content-h3">✨ Driving Innovation with Purpose</h3>
                                    <p>
                                        Our goal is to <b>simplify technology for businesses</b> — making
                                        <b>innovation accessible, affordable,</b> and <b>results-driven.</b>
                                        We aim to build intelligent digital solutions that
                                        <b>automate operations, enhance user experience,</b> and
                                        <b>boost profitability</b> across every industry we serve.
                                    </p>

                                    <p>
                                        At <b>NexcodeForge</b>, we focus on combining <b>creative design</b> with
                                        <b>cutting-edge development</b> to deliver scalable systems that help
                                        organizations achieve <b>digital transformation</b> with ease. Whether it’s
                                        <b>web applications, mobile apps, enterprise platforms,</b> or
                                        <b>IoT-based solutions</b>, our purpose remains the same —
                                        to create technology that drives <b>growth, efficiency,</b> and
                                        <b>long-term success.</b>
                                    </p>

                                    <p>
                                        By fostering collaboration, innovation, and continuous improvement,
                                        we’re shaping a future where businesses can thrive through smarter,
                                        more connected, and more sustainable digital ecosystems.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="content-inner" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <h3 class="tab-content-h3">✨ Our Vision</h3>
                                    <p>
                                        To be a globally recognized <b>technology partner</b> empowering businesses
                                        through <b>innovative software solutions, digital products,</b> and
                                        <b>connected IoT systems</b> that redefine <b>efficiency, creativity,</b> and
                                        <b>impact</b>. At <b>NexcodeForge</b>, our vision is to shape a smarter,
                                        more connected world where technology drives <b>sustainable growth</b> and
                                        unlocks new possibilities for organizations of every scale.
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <img class="img-fluid" src="{{ asset('guest/assets/images/about/our_vision.png') }}"
                                        alt="Our Vision">
                                </div>
                            </div>
                        </div>

                        <div class="content-inner" style="display:none;">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <img class="img-fluid" src="{{ asset('guest/assets/images/about/our_journey.png') }}"
                                        alt="Our Journey">
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="tab-content-h3">✨ Our Journey</h3>
                                    <p>
                                        Started with a vision to fuse <b>design, innovation, and technology</b>,
                                        <b>NexcodeForge</b> has evolved into a
                                        <b>full-stack digital solutions partner</b> empowering businesses across
                                        India and overseas. From our humble beginnings as a passionate development team,
                                        we’ve grown into a trusted name delivering
                                        <b>custom websites, mobile apps,</b> and
                                        <b>enterprise-grade applications</b> that drive real business results.
                                    </p>

                                    <p>
                                        Our diverse portfolio spans industries such as
                                        <b>fintech, e-commerce, healthcare, real estate,</b> and
                                        <b>corporate services,</b> reflecting our adaptability and commitment to
                                        excellence. Every project we undertake is rooted in
                                        <b>deep research, user-centric design,</b> and
                                        <b>scalable technology</b> — ensuring tangible growth and long-term digital
                                        success for our clients.
                                    </p>

                                    <p>
                                        At <b>NexcodeForge</b>, we believe in more than just building software;
                                        we build <b>digital experiences</b> that inspire trust and engagement.
                                        With a focus on <b>performance, security,</b> and <b>innovation,</b>
                                        our journey continues toward creating smarter solutions that redefine
                                        how businesses connect with their audiences in the digital era.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-40">

                <div class="section-title text-center">
                    <h2 class="section-title-h2">Let’s Build the Future Together</h2>
                    <p>Looking for a reliable technology partner to develop your next big idea?
                        <b><a href="{{ url('contactus') }}" target="_blank"
                                rel="noopener noreferrer">NexcodeForge</a></b> is ready to turn your vision into a
                        scalable, successful product.
                    </p>
                    <div class="mt-20">
                        <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant"
                            href="{{ url('enquiry') }}" target="_blank">Enquiry Now</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- clients -->
        {{-- <section class="prt-row prt-bg bg-base-gradient client-section clearfix">
        <div class="container-fluid">
            <div class="row slick_slider spacing-3"
                data-slick='{"slidesToShow":6,"autoplay":true,"arrows":false}'>
                <div class="col-lg-2"><img src="{{ asset('guest/assets/images/client-07.png') }}" alt="client" class="img-fluid"></div>
                <div class="col-lg-2"><img src="{{ asset('guest/assets/images/client-04.png') }}" alt="client" class="img-fluid"></div>
                <div class="col-lg-2"><img src="{{ asset('guest/assets/images/client-05.png') }}" alt="client" class="img-fluid"></div>
                <div class="col-lg-2"><img src="{{ asset('guest/assets/images/client-06.png') }}" alt="client" class="img-fluid"></div>
                <div class="col-lg-2"><img src="{{ asset('guest/assets/images/client-03.png') }}" alt="client" class="img-fluid"></div>
                <div class="col-lg-2"><img src="{{ asset('guest/assets/images/client-02.png') }}" alt="client" class="img-fluid"></div>
            </div>
        </div>
    </section> --}}

    </div>
    <!-- site-main end -->
@endsection
