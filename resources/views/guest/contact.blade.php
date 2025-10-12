@extends('layouts.guest')
@section('title', 'Contact NexCodeForge | Let’s Build Your Digital Future')
@section('meta_description', 'Get in touch with NexCodeForge — your trusted web and app development partner. Let’s
    discuss your project and create something remarkable together.')


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
                                <h2 class="title">Contact Us</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Contact Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-page-title-overlay"></div> -->
        </div>
    </div>
    <!-- page-title end -->

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success col-md-8 mx-auto my-3 ">{{ session('success') }}</div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger col-md-8 mx-auto my-3 ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- site-main start -->
    <div class="site-main">

        <!-- section-->
        <section class="prt-row bg-layer-equal-height clearfix">
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div
                            class="prt-col-bgcolor-yes bg-base-dark text-base-white col-bg-img-seven prt-col-bgimage-yes prt-bg">
                            <div class="prt-col-wrapper-bg-layer prt-bg-layer bg-base-dark">
                                <div class="prt-col-wrapper-bg-layer-inner bg-base-dark"></div>
                            </div>
                            <div class="layer-content map-contect-form">
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="title">Web designing in a powerful way of just not a profession, however
                                        </h2>
                                    </div>
                                </div><!-- section title end -->
                                <form action="{{ route('contact.store') }}"
                                    class="query_form wrap-form clearfix mt-25 res-991-mt-0 position-relative"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value=""
                                                        placeholder="Name" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input"><input name="email" type="text" value=""
                                                        placeholder="Email" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input"><input name="mobile" type="text" value=""
                                                        placeholder="Phone" maxlength="10" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input">
                                                    <textarea name="message" rows="5" placeholder=" your message" required="required"></textarea>
                                                </span>
                                            </label>
                                        </div>
                                        {{-- <div class="col-md-12">
                                                <label>
                                                   <span class="checkbox"><input type="checkbox" name="cookies-consent" id="cookies-consent2">
                                                     Accept <a href="#"> Terms of services</a> and <a href="#"> Privacy Policy.</a></span>
                                                </label>
                                            </div> --}}
                                        <div class="col-md-12">
                                            <div class="mt-25">
                                                <button
                                                    class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant"
                                                    type="submit">Submit Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="prt-bg bg-base-grey spacing-8">
                            <div class="section-title mb-15">
                                <div class="title-header">
                                    <h2 class="section-title-h2">Get in Touch</h2>
                                </div>
                                <div class="title-desc">
                                    <p>
                                        At <strong>NexCodeForge</strong>, we love collaborating with brands and businesses
                                        to turn ideas into
                                        powerful digital solutions. Whether you need a new website, mobile app, or
                                        enterprise automation —
                                        our team is ready to help you build something extraordinary.
                                    </p>
                                </div>
                            </div>

                            <!-- New Delhi Office -->
                            <div class="contact-address-box">
                                <div class="address-box-info">
                                    <h3 class="address-box-heading">Head Office – New Delhi</h3>
                                    <div class="address-box-text">
                                        C-Block, New Ashok Nagar,<br>
                                        Near Metro Station, East Delhi – 110096, India<br>
                                        <strong>Email:</strong> contact@nexcodeforge.com<br>
                                        <strong>Phone:</strong> +91 76691 66975
                                    </div>
                                </div>
                                <div class="address-box-map-link">
                                    <a href="https://www.google.com/maps?q=New+Ashok+Nagar,+Delhi" target="_blank"
                                        rel="noopener" class="address-box-link">View on Map</a>
                                </div>
                            </div>

                            <!-- Mumbai Office -->
                            <div class="contact-address-box last-child">
                                <div class="address-box-info">
                                    <h3 class="address-box-heading">Regional Office – Noida</h3>
                                    <div class="address-box-text">
                                        3rd Floor, TechnoHub Building,<br>
                                        – 201301, India<br>
                                        <strong>Email:</strong> support@nexcodeforge.com<br>
                                        <strong>Phone:</strong> 91 76691 66975
                                    </div>
                                </div>
                                <div class="address-box-map-link">
                                    <a href="https://www.google.com/maps/search/3rd+Floor+TechnoHub+Building+br+201301+India/@28.5821099,77.2658157,12z?entry=ttu&g_ep=EgoyMDI1MTAwOC4wIKXMDSoASAFQAw%3D%3D" target="_blank"
                                        rel="noopener" class="address-box-link">View on Map</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->

        <!-- map-accordion-section -->
        <section class="prt-row bg-base-grey map-accordion-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Left column: Intro + social links -->
                    <div class="col-lg-5 col-md-12">
                        <div class="contentmap">
                            <div class="section-title">
                                <div class="title-header">
                                    <h2 class="title">Frequently Asked Questions</h2>
                                </div>
                                <div class="title-desc">
                                    <p>
                                        At <strong>NexCodeForge</strong>, we believe that powerful digital solutions begin
                                        with clarity. Whether you're exploring our web development services or want to
                                        understand how our team builds scalable, secure, and modern applications — this
                                        section answers the most common questions we receive from clients.
                                    </p>
                                </div>

                                <div class="mt-15">
                                    <h3 class="contact-heading-h3">Connect with Us</h3>
                                    <ul class="social-icons map-links">
                                        <li><a href="https://www.facebook.com/profile.php?id=61581703355275" target="_blank"
                                                rel="noopener" aria-label="facebook">Facebook</a></li>
                                        <li><a href="https://x.com/ForgeNex3411" target="_blank" rel="noopener"
                                                aria-label="twitter">Twitter</a></li>
                                        <li><a href="https://www.instagram.com/nex.codeforage?igsh=dHFidndiOHk3ZDRu"
                                                target="_blank" rel="noopener" aria-label="instagram">Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right column: Accordion FAQs -->
                    <div class="col-lg-7 col-md-12">
                        <div class="accordion style2 res-991-mt-20">

                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#" class="active">01. What services does
                                        NexCodeForge offer?</a></div>
                                <div class="toggle-content show">
                                    <p>
                                        NexCodeForge specializes in <strong>web development, mobile app creation, UI/UX
                                            design, and digital transformation</strong>. We deliver tailor-made software
                                        solutions that help businesses grow through technology.
                                    </p>
                                </div>
                            </div>

                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">02. Why should I choose NexCodeForge for my
                                        website?</a></div>
                                <div class="toggle-content">
                                    <p>
                                        We focus on building <strong>SEO-friendly, fast, and secure websites</strong> using
                                        modern frameworks. Every project is customized to your brand, ensuring great
                                        performance and visual appeal across all devices.
                                    </p>
                                </div>
                            </div>

                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">03. How long does it take to build a
                                        website?</a></div>
                                <div class="toggle-content">
                                    <p>
                                        The timeline depends on your project’s size and complexity. A standard business
                                        website usually takes <strong>2–4 weeks</strong>, while custom web applications or
                                        e-commerce platforms may take longer.
                                    </p>
                                </div>
                            </div>

                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">04. Do you provide maintenance and support
                                        after launch?</a></div>
                                <div class="toggle-content">
                                    <p>
                                        Yes! NexCodeForge offers ongoing <strong>website maintenance, hosting support, and
                                            content updates</strong> to ensure your platform stays secure, optimized, and
                                        up-to-date with the latest technologies.
                                    </p>
                                </div>
                            </div>

                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">05. Can NexCodeForge help with SEO and digital
                                        marketing?</a></div>
                                <div class="toggle-content">
                                    <p>
                                        Absolutely. Along with development, our team provides <strong>SEO optimization,
                                            social media strategy, and performance analytics</strong> to help your brand
                                        achieve higher visibility and conversions online.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- map-accordion-section end -->

        <!--map-section-->
        <section class="prt-row padding_zero-section overflow-hidden clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div id="google_map" class="google_map">
                            <div class="map_container">
                                <div id="map">
                                    <iframe
                                        src="https://www.google.com/maps?q=New+Ashok+Nagar,+Delhi&hl=en&z=14&output=embed"
                                        width="100%" height="590" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>

                                </div>
                            </div>
                            <div class="map-overlay">
                                <div class="prt-map-location">
                                    <h3>Find us</h3>
                                    <p>New Ashoknager ,Delhi India</p>
                                    <ul class="map-list">
                                        <li>E-mail : <a href="mailto:nexcodefroge@gmail.com<"
                                                class="prt-maplink">nexcodefroge@gmail.com</a></li>
                                        <li>Phone number : <a href="tel:+91 7669166975" class="prt-maplink">+91 7669166975
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="prt-map-location mt-15">
                                    <h3>Business hours</h3>
                                    <ul class="map-list">
                                        <li>Mon-Fri : <span>8am to 9pm</span></li>
                                        <li>Sat : <span>9am to 3pm</span></li>
                                        <li>Sun : <span>closed</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--map-section end-->

    </div><!-- site-main end-->


@endsection
