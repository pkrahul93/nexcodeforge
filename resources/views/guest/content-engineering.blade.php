@extends('layouts.guest')
@section('title', 'Content Engineering Solutions | NexCodeForge')
@section('meta_description',
    'NexCodeForge delivers smart content engineering solutions that combine technology,
    creativity, and automation. We help businesses organize, optimize, and deliver content that drives engagement and
    growth.')


@section('content')
    <style>
        .service-detail-list-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .service-icon {
            color: #4f46e5;
            font-size: 18px;
            min-width: 20px;
        }

        .iconbox-heading-sd i {
            margin-right: 8px;
            color: #4f46e5;
        }

        @media (max-width: 767px) {
            .service-detail-list-item {
                align-items: flex-start;
            }
        }
    </style>

    <!-- page-title -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Content Engineering</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Content Engineering</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-page-title-overlay"></div> -->
        </div>
    </div>
    <!-- page-title end -->

    <!-- site-main start -->
    <div class="site-main">

        <!--sidebar-->
        <div class="prt-row sidebar prt-sidebar-left clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4 widget-area sidebar-left prtcol-bgcolor-yes prt-bg prt-left-span bg-base-grey">
                        <div class="prt-col-wrapper-bg-layer prt-bg-layer"></div>
                        <aside class="widget widget-search with-title">
                            <form role="search" method="get" class="search-form" action="#">
                                <label>
                                    <input type="search" class="input-text" placeholder="Search" value=""
                                        name="s">
                                </label>
                                <button class="btn" type="submit"></button>
                            </form>
                        </aside>
                        <aside class="widget widget-nav-menu with-title">
                            <div class="widget-title">
                                <h3>Our Services</h3>
                            </div>
                            <ul>
                                <li class="active"><a href="{{ route('content-engineering') }}"> Content Engineering </a>
                                </li>
                                {{-- <li><a href="{{ route('content-engineering') }}"> Content Engineering </a></li> --}}
                                <li><a href="{{ route('creative-design') }}">UI/UX & Creative Design</a></li>
                                <li><a href="{{ route('web-designing') }}">Website/App Development</a></li>
                                <li><a href="{{ route('web-redesigning') }}">Website Re-Designing</a></li>
                                <li><a href="{{ url('/services/ecommerce-development') }}"> E-Commerce Development </a></li>
                                <li><a href="{{ route('digital-marketing') }}">Digital Marketing & SEO</a></li>
                                <li><a href="{{ url('/services/mlm-software-solutions') }}"> MLM Software Solutions </a>
                                </li>
                                <li><a href="{{ url('/services/business-websites') }}"> Professional Business Websites </a>
                                </li>
                                <li><a href="{{ url('/services/custom-web-app-development') }}"> Custom Web & App Development </a></li>
                            </ul>
                        </aside>
                        <aside class="widget widget-download with-title">
                            <div class="download_block">
                                <div class="widget-title">
                                    <h3>Download</h3>
                                </div>
                                <div class="download-block01 first-child">
                                    <div class="prt-file-title">
                                        <span>Our Brochures</span>
                                        <a href="{{ route('under-construction') }}">Download</a>
                                    </div>
                                    <div class="download_icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                </div>
                                {{-- <div class="download-block01">
                                    <div class="prt-file-title">
                                        <span>Our Brochures</span>
                                        <a href="{{ route('under-construction') }}">Download</a>
                                    </div>
                                    <div class="download_icon">
                                        <i class="far fa-file"></i>
                                    </div>
                                </div> --}}
                            </div>
                        </aside>
                        <aside class="widget widget-banner with-title">
                            <div
                                class="prt-col-bgcolor-yes bg-base-dark text-base-white col-bg-img-four prt-col-bgimage-yes prt-bg">
                                <div class="prt-col-wrapper-bg-layer prt-bg-layer bg-base-dark">
                                    <div class="prt-col-wrapper-bg-layer-inner bg-base-dark"></div>
                                </div>
                                <div class="layer-content text-center">
                                    <h3 class="sidebar-banner-heading">NexCodeForge</h3>
                                    <div class="sidebar-banner-subheading">Need Help? We Are Here<br>To Help You</div>
                                    <a href="tel:7669166975" class="sidebar-banner-phone-link">+91 7669166975</a>
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant"
                                        href="{{ url('contactus') }}">Contact Us</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-8 content-area">
                        <div class="prt-service-single-content-area">
                            <div class="prt_fatured_image-wrapper mb-40 res-575-mb-20">
                                <img width="859" height="440" class="img-fluid"
                                    src="{{ asset('guest/assets/images/single-img-10.jpg') }}" alt="services-1">
                            </div>
                            <div class="prt-service-description">
                                <h3>Building Scalable Content Systems for the Digital World</h3>
                                <p>
                                    Content Engineering bridges strategy, technology, and structure to help organizations
                                    create, manage, and deliver content efficiently across platforms. We design robust
                                    content architectures that ensure consistency, scalability, automation, and long-term
                                    performance for modern digital ecosystems.
                                </p>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <ul class="service-detail-list">
                                            <li class="service-detail-list-item">

                                                <div class="service-detail-list-text">
                                                    <i class="fas fa-layer-group service-icon"></i>
                                                    Structured and reusable content models
                                                </div>
                                            </li>
                                            <li class="service-detail-list-item">
                                                <div class="service-detail-list-text">
                                                    <i class="fas fa-gauge-high service-icon"></i>
                                                    Performance, scalability & SEO
                                                    optimization
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div>
                                            <ul class="service-detail-list">
                                                <li class="service-detail-list-item">
                                                    <div class="service-detail-list-text">
                                                        <i class="fas fa-share-nodes service-icon"></i>
                                                        API-driven & omnichannel content
                                                        delivery
                                                    </div>
                                                </li>
                                                <li class="service-detail-list-item">
                                                    <div class="service-detail-list-text">
                                                        <i class="fas fa-robot service-icon"></i>
                                                        Automation-ready & future-proof
                                                        systems
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40 res-767-mt-20">
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <h3>How We Work</h3>
                                        <div class="mt-35">
                                            <div class="timeline-block">
                                                <div class="iconbox-sd">
                                                    <div class="iconbox-num-block">
                                                        <div class="iconbox-num"></div>
                                                    </div>
                                                    <div class="iconbox-content-sd">
                                                        <div class="iconbox-title-sd">
                                                            <h3 class="iconbox-heading-sd">
                                                                <i class="fas fa-lightbulb text-primary"></i>
                                                                Content Strategy & Planning
                                                            </h3>
                                                        </div>
                                                        <div class="iconbox-desc-sd">
                                                            <p class="iconbox-text-sd">
                                                                We define content structure, workflows, and governance
                                                                aligned with business goals
                                                                and audience needs.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-block">
                                                <div class="iconbox-sd">
                                                    <div class="iconbox-num-block">
                                                        <div class="iconbox-num"></div>
                                                    </div>
                                                    <div class="iconbox-content-sd">
                                                        <div class="iconbox-title-sd">
                                                            <h3 class="iconbox-heading-sd">
                                                                <i class="fas fa-diagram-project text-primary"></i>
                                                                Architecture & System Design
                                                            </h3>
                                                        </div>
                                                        <div class="iconbox-desc-sd">
                                                            <p class="iconbox-text-sd">
                                                                Structured content models, APIs, and integrations are
                                                                designed for scalability,
                                                                reusability, and omnichannel delivery.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-block last-child">
                                                <div class="iconbox-sd">
                                                    <div class="iconbox-num-block last-child">
                                                        <div class="iconbox-num"></div>
                                                    </div>
                                                    <div class="iconbox-content-sd">
                                                        <div class="iconbox-title-sd">
                                                            <h3 class="iconbox-heading-sd">
                                                                <i class="fas fa-rocket text-primary"></i>
                                                                Implementation & Deployment
                                                            </h3>
                                                        </div>
                                                        <div class="iconbox-desc-sd">
                                                            <p class="iconbox-text-sd">
                                                                We build, test, and deploy secure, automated, and
                                                                high-performance content systems
                                                                ready for long-term growth.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 res-991-mt-30">

                                        <div class="prt-bg prt-col-bgimage-yes col-bg-img-five z-index-2">
                                            <div class="prt-col-wrapper-bg-layer prt-bg-layer border-rad_30"></div>
                                            <div class="layer-content">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-40 res-767-mt-20">
                                    <div>
                                        <h3>Frequently asked questions</h3>
                                    </div>
                                    <div class="accordion style1">
                                        <!-- toggle -->
                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                            <div class="toggle-title"><a href="#" class="active"><i
                                                        class="fas fa-cogs"></i>
                                                    What is Content Engineering?</a></div>
                                            <div class="toggle-content show">
                                                <p>Content Engineering focuses on structuring, managing, and delivering
                                                    content
                                                    using scalable architectures, APIs, automation, and data-driven systems
                                                    to ensure
                                                    consistency, reusability, and performance across platforms.</p>
                                            </div>
                                        </div><!-- toggle end -->
                                        <!-- toggle -->
                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                            <div class="toggle-title"><a href="#"><i
                                                        class="fas fa-layer-group"></i>
                                                    How does Content Engineering help businesses?</a>
                                            </div>
                                            <div class="toggle-content">
                                                <p>It enables faster content delivery, better personalization, seamless
                                                    omnichannel
                                                    publishing, improved SEO, and easier integration with CMS, CRM, and
                                                    marketing tools.</p>
                                            </div>
                                        </div><!-- toggle end -->
                                        <!-- toggle -->
                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                            <div class="toggle-title"><a href="#"><i class="fas fa-code"></i>
                                                    What technologies are used in Content Engineering?</a></div>
                                            <div class="toggle-content">
                                                <p>We use modern frameworks, APIs, headless CMS, structured databases,
                                                    cloud platforms, automation pipelines, and scalable backend systems
                                                    tailored to your business needs.
                                                </p>
                                            </div>
                                        </div><!-- toggle end -->
                                        <!-- toggle -->
                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                            <div class="toggle-title"><a href="#"><i class="fas fa-shield-alt"></i>
                                                    Is my content secure and future-ready?</a></div>
                                            <div class="toggle-content">
                                                <p>Yes. We design secure, version-controlled, and scalable content
                                                    architectures
                                                    that ensure data protection, easy upgrades, and long-term flexibility.
                                                </p>
                                            </div>
                                        </div><!-- toggle end -->
                                        <!-- toggle -->
                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                            <div class="toggle-title"><a href="#"><i class="fas fa-sync-alt"></i>
                                                    Can existing content systems be upgraded?</a></div>
                                            <div class="toggle-content">
                                                <p>Absolutely. We analyze your current systems and modernize them using
                                                    structured content models, automation, and performance optimizations
                                                    without disrupting existing workflows.
                                                </p>
                                            </div>
                                        </div><!-- toggle end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
        <!--sidebar end-->

    </div><!-- site-main end-->

@endsection
