@extends('layouts.guest')

@section('title', 'Custom Web & App Development Company | SaaS & Enterprise Solutions | NexCodeForge')

@section('meta_description',
    'Build custom web applications, SaaS platforms, and mobile apps tailored to your business
    workflows with NexCodeForge.')

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
    </style>

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
                                <h2 class="title">Custom Web & App Development</hz>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Custom Web & App Development</span>
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
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="text-center">Custom Software Built for Your Business</h2>
                        <p class="text-center">
                            From SaaS platforms to internal dashboards, we build
                            custom software that scales with your business.
                        </p>
                        <div class="text-center">
                            <a href="{{ route('enquiry.index') }}" class="prt-btn prt-btn-color-skincolor btn-brand">
                                Discuss Your Idea
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid" src="{{ asset('guest/assets/images/ecom/4532.jpg') }}"
                            alt="Custom Development">
                    </div>
                </div>
            </div>
        </section>

        <section class="prt-row service-section-01 what-we-build clearfix">
            <div class="container">

                <!-- Section Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2 class="title">What We Build</h2>
                    <p class="desc-text">
                        Custom digital products engineered to solve real business challenges
                        and scale with your growth.
                    </p>
                </div>

                <div class="row mt-4">

                    @php
                        $builds = [
                            [
                                'title' => 'SaaS Platforms',
                                'desc' => 'Scalable SaaS products with subscription management, roles, and analytics.',
                                'img' => 'guest/assets/images/others/01.png',
                            ],
                            [
                                'title' => 'Admin Dashboards',
                                'desc' => 'Powerful dashboards to monitor data, manage users, and control operations.',
                                'img' => 'guest/assets/images/others/02.jpg',
                            ],
                            [
                                'title' => 'Business Automation',
                                'desc' =>
                                    'Automate workflows, reduce manual effort, and improve operational efficiency.',
                                'img' => 'guest/assets/images/others/03.jpg',
                            ],
                            [
                                'title' => 'APIs & Integrations',
                                'desc' =>
                                    'Secure API development and third-party integrations for seamless connectivity.',
                                'img' => 'guest/assets/images/others/api.jpg',
                            ],
                            [
                                'title' => 'Mobile Applications',
                                'desc' =>
                                    'High-performance Android & cross-platform mobile apps for modern businesses.',
                                'img' => 'guest/assets/images/others/mobile.png',
                            ],
                            [
                                'title' => 'Enterprise Systems',
                                'desc' =>
                                    'Robust enterprise-grade systems designed for security, scale, and reliability.',
                                'img' => 'guest/assets/images/others/erp.png',
                            ],
                        ];
                    @endphp

                    @foreach ($builds as $build)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                            <div class="website-card">

                                <!-- Image -->
                                <div class="website-card-img">
                                    <img src="{{ asset($build['img']) }}" alt="{{ $build['title'] }}" class="img-fluid"
                                        loading="lazy" width="1200" height="800" />
                                    <div class="image-overlay"></div>
                                </div>

                                <!-- Content -->
                                <div class="website-card-content">
                                    <h3>{{ $build['title'] }}</h3>
                                    <p>{{ $build['desc'] }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>


        @include('guest.partials.why-choose-us')

        @include('guest.partials.workflow')

        @include('guest.partials.final-cta')

    </div>
@endsection
