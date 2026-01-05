@extends('layouts.guest')

@section('title', 'Professional Business Website Development | Lead Focused Websites | NexCodeForge')

@section('meta_description',
    'Get professional, SEO-ready, mobile-friendly business websites designed to build trust and
    generate leads.')

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
                                <h2 class="title">Professional Business Websites</hz>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Business Websites</span>
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
                <h2>Websites That Build Trust & Generate Leads</h2>
                <p class="text-center">
                    We design modern, fast, and mobile-first business websites
                    that represent your brand and convert visitors.
                </p>
                <div class="text-center mt-3">
                    <a href="{{ route('enquiry.index') }}" class="prt-btn prt-btn-color-skincolor btn-brand">
                        Get Website Quote
                    </a>
                </div>
            </div>
        </section>

        <section class="prt-row service-section-01 website-solutions clearfix">
            <div class="container">

                <!-- Section Heading -->
                <div class="section-title text-center mb-40" data-aos="fade-up">
                    <h2 class="title">Website Solutions</h2>
                    <p class="desc-text">
                        Professionally crafted website solutions designed to attract,
                        engage, and convert your audience.
                    </p>
                </div>

                <div class="row mt-4">

                    @php
                        $solutions = [
                            [
                                'title' => 'Corporate Websites',
                                'desc' =>
                                    'Professional corporate websites that build trust, credibility, and brand authority.',
                                'img' => 'guest/assets/images/services/05.jpg',
                            ],
                            [
                                'title' => 'Startup Websites',
                                'desc' =>
                                    'Modern, scalable websites designed to help startups launch fast and grow confidently.',
                                'img' => 'guest/assets/images/services/01.jpg',
                            ],
                            [
                                'title' => 'Landing Pages',
                                'desc' =>
                                    'High-converting landing pages optimized for lead generation and marketing campaigns.',
                                'img' => 'guest/assets/images/services/02.jpg',
                            ],
                            [
                                'title' => 'Portfolio Websites',
                                'desc' =>
                                    'Creative portfolio websites for professionals, agencies, and personal brands.',
                                'img' => 'guest/assets/images/services/04.jpg',
                            ],
                            [
                                'title' => 'SEO-Optimized Structure',
                                'desc' =>
                                    'Clean code, fast loading, and SEO-ready architecture for better search rankings.',
                                'img' => 'guest/assets/images/services/06.jpg',
                            ],
                            [
                                'title' => 'Maintenance & Support',
                                'desc' =>
                                    'Ongoing updates, security patches, performance optimization, and technical support.',
                                'img' => 'guest/assets/images/services/03.jpg',
                            ],
                        ];
                    @endphp

                    @foreach ($solutions as $solution)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                            <div class="website-card">

                                <!-- Image -->
                                <div class="website-card-img">
                                    <img src="{{ asset($solution['img']) }}" alt="{{ $solution['title'] }}"
                                        class="img-fluid" loading="lazy" width="1200" height="800" />
                                    <div class="image-overlay"></div>
                                </div>

                                <!-- Content -->
                                <div class="website-card-content">
                                    <h3>{{ $solution['title'] }}</h3>
                                    <p>{{ $solution['desc'] }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>

        <hr>


        @include('guest.partials.why-choose-us')

        @include('guest.partials.workflow')

        @include('guest.partials.final-cta')

    </div>
@endsection
