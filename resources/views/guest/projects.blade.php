@extends('layouts.guest')
@section('title', 'Our Projects & Case Studies | NexCodeForge')
@section('meta_description', 'Explore NexCodeForge’s portfolio of successful web and app development projects. From corporate websites to eCommerce and custom software, discover how we turn ideas into powerful digital solutions.')

@section('content')

    <!-- Page Title -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Our Projects</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Projects</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- site-main start -->
    <div class="site-main">

        <!-- portfolio-section -->
        <section class="prt-row portfolio-section01 bg-light py-80 clearfix">
            <div class="container">
                <div class="section-title text-center mb-60">
                    <h2 class="title fw-bold text-dark" style="font-size: 42px;">Our Featured Projects</h2>
                    <p class="desc-text text-muted" style="font-size: 18px; max-width: 800px; margin: 0 auto;">
                        Discover how NexcodeForge transforms ideas into high-performing digital experiences —
                        from SaaS dashboards and IoT systems to secure fintech platforms and AI-powered apps.
                    </p>
                </div>

                <div class="row g-4">
                    @foreach ([
            [
                'img' => 'https://images.unsplash.com/photo-1590608897129-79da98d159e4?auto=format&fit=crop&w=900&q=80',
                'cat' => 'AI SaaS, Automation',
                'title' => 'Smart CRM Dashboard',
                'desc' => 'An AI-integrated CRM with automated workflows and lead intelligence, streamlining BFSI operations by 40%.',
                'link' => '#',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1556761175-129418cb2dfe?auto=format&fit=crop&w=900&q=80',
                'cat' => 'E-Commerce, UI/UX',
                'title' => 'Insiya Outfits - Fashion Store',
                'desc' => 'Modern multi-language fashion eCommerce site with WhatsApp checkout and real-time inventory sync.',
                'link' => 'https://insiyaoutfits.com',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1581091012184-5c7c2f1d43a3?auto=format&fit=crop&w=900&q=80',
                'cat' => 'IoT, Analytics',
                'title' => 'Smart Energy Management System',
                'desc' => 'IoT-driven dashboard for power monitoring — saving 32% energy for industrial clients.',
                'link' => '#',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&w=900&q=80',
                'cat' => 'Healthcare, AI',
                'title' => 'TeleHealth AI App',
                'desc' => 'HIPAA-compliant virtual health platform for AI consultations and real-time appointment scheduling.',
                'link' => '#',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1542744173-05336fcc7ad4?auto=format&fit=crop&w=900&q=80',
                'cat' => 'Fintech, Blockchain',
                'title' => 'BNB Credit Payment Gateway',
                'desc' => 'Built a decentralized payment solution with instant crypto settlements and transparency.',
                'link' => '#',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1552581234-26160f608093?auto=format&fit=crop&w=900&q=80',
                'cat' => 'Cloud, Security',
                'title' => 'Secure File Sharing Platform',
                'desc' => 'AES + ECC encrypted document exchange system with OTP-based verification and expiry links.',
                'link' => 'https://securefileshare-demo.vercel.app',
            ],
        ] as $project)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="portfolio-item position-relative overflow-hidden rounded-4 shadow-lg h-100"
                                style="transition: all 0.4s ease;">
                                <img src="{{ $project['img'] }}" class="img-fluid w-100"
                                    style="height: 320px; object-fit: cover;" alt="{{ $project['title'] }}">
                                <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-4"
                                    style="background: rgba(0,0,0,0.55); transition: all 0.4s ease;">
                                    <h5 class="text-uppercase text-light mb-1" style="font-size: 14px;">
                                        {{ $project['cat'] }}</h5>
                                    <h3 class="text-white fw-bold" style="font-size: 22px;">{{ $project['title'] }}</h3>
                                    <p class="text-light small mb-3">{{ $project['desc'] }}</p>
                                    <a href="{{ $project['link'] }}" target="_blank"
                                        class="btn btn-sm btn-light fw-semibold rounded-pill px-3 py-1 align-self-start">View
                                        Project</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-80">
                    <h3 class="text-dark fw-semibold mb-3">Ready to build something extraordinary?</h3>
                    <a href="{{ url('enquiry') }}"
                        class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor">Start
                        Your Project</a>
                </div>
            </div>
        </section>

        <!-- portfolio-section-end -->

        <!-- marquee-section -->
        <section class="prt-row padding_zero-section prt-bg bg-base-gradient clearfix">
            <div class="container-fluid p-0">
                <div class="marquee-block overflow-hidden">
                    <div class="marquee">
                        <div class="marquee-content">
                            <div class="marquee-text">AI SaaS</div>
                            <div class="marquee-text">Blockchain</div>
                            <div class="marquee-text">Cloud</div>
                            <div class="marquee-text">IoT</div>
                            <div class="marquee-text">Digital Marketing</div>
                            <div class="marquee-text">UI/UX</div>
                            <div class="marquee-text">Web Development</div>
                            <div class="marquee-text">Automation</div>
                            <div class="marquee-text">Innovation</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- marquee-section end -->

    </div>
    <!-- site-main end -->

@endsection
