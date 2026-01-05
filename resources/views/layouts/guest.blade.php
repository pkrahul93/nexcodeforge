<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ Page Title -->
    <title>@yield('title', 'NexCodeForge | Turning Ideas into Digital Solutions')</title>
    <!-- ✅ SEO Optimized Meta -->
    <meta name="keywords"
        content="NexCodeForge, website development, application development, corporate websites, matrimonial portals, eCommerce solutions, IT services, responsive design, SEO-optimized websites">
    <meta name="description" content="@yield('meta_description', 'NexCodeForge provides professional website and application development for corporate services, matrimonial platforms, eCommerce stores, and IT solutions. Our designs are responsive, SEO-friendly, and tailored to your unique business needs.')">

    <meta name="author" content="NexCodeForge">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    <!-- ✅ Mobile Friendly -->

    <!-- ✅ Security -->
    <meta name="csrf-token" content="{{ csrf_token() }}">






    <!-- ✅ jQuery (load once, latest stable version) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- ✅ CSRF Setup for AJAX -->
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/fontello.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/shortcodes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/megamenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/assets/css/responsive.css') }}">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel='stylesheet' id='rs-plugin-settings-css' href="{{ asset('guest/assets/revolution/css/rs6.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    {{-- Bootstrap Icons CDN (same as pricing page) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Organization Schema -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "{{ config('app.name', 'NexCodeForge') }}",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "sameAs": [
    "https://www.facebook.com/profile.php?id=61581703355275",
    "https://www.linkedin.com/in/nexcodeforge",
    "https://x.com/ForgeNex3411"
  ],
  "contactPoint": [{
    "@type": "ContactPoint",
    "email": "support@nexcodeforge.com",
    "contactType": "customer support",
    "availableLanguage": ["English"]
  }]
}
</script>

    <!-- WebPage Schema -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ addslashes($meta_title ?? config('app.name', 'NexCodeForge')) }}",
  "url": "{{ url()->current() }}",
  "description": "{{ addslashes($meta_description ?? config('app.name', 'NexCodeForge')) }}",
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name', 'NexCodeForge') }}",
    "url": "{{ url('/') }}"
  },
  "datePublished": "{{ \Carbon\Carbon::now()->toDateString() }}",
  "dateModified": "{{ \Carbon\Carbon::now()->toDateString() }}"
}
</script>

    <!-- ContactPage Schema -->
    @if (Request::is('contactus') || Request::is('maintenance-support*') || Request::is('enquiry*'))
        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "{{ addslashes($meta_title ?? 'Contact - ' . config('app.name', 'NexCodeForge')) }}",
  "url": "{{ url()->current() }}",
  "description": "{{ addslashes($meta_description ?? 'Contact ' . config('app.name', 'NexCodeForge')) }}",
  "contactType": "customer support",
  "email": "support@nexcodeforge.com",
  "telephone": "+91-7669166975",
  "availableLanguage": ["English"]
}
</script>
    @endif

    <!-- LegalService / TermsPage Schema -->
    @if (Request::is('terms-conditions'))
        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Legislation",
  "name": "{{ addslashes($meta_title ?? 'Terms & Conditions - ' . config('app.name', 'NexCodeForge')) }}",
  "url": "{{ url()->current() }}",
  "description": "{{ addslashes($meta_description ?? 'Terms & Conditions for ' . config('app.name', 'NexCodeForge')) }}",
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name', 'NexCodeForge') }}",
    "url": "{{ url('/') }}"
  },
  "datePublished": "{{ \Carbon\Carbon::now()->toDateString() }}",
  "dateModified": "{{ \Carbon\Carbon::now()->toDateString() }}"
}
</script>
    @endif

    <!-- FAQPage / Support Ticket -->
    @if (Request::is('maintenance-support*') || Request::is('enquiry*'))
        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How do I raise a support ticket?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You can raise a support ticket via our Maintenance & Support page by submitting the form. Our team will respond according to priority."
      }
    },
    {
      "@type": "Question",
      "name": "What are your support hours?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our standard support hours are Monday to Saturday, 10:00 AM – 7:00 PM IST."
      }
    },
    {
      "@type": "Question",
      "name": "How do I check the status of my support ticket?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "After submitting a ticket, you will receive updates via email and can also check the status in your account dashboard."
      }
    }
  ]
}
</script>
    @endif


    <style>
        .bd-title {
            font-size: 30px;
            text-shadow: 1px -1px #8d8484;
            font-weight: 800;
            background: #d1cccc;
            padding: 2px 11px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .blog-cat {
            font-size: 23px;
            font-weight: 600;
            text-shadow: 2px -2px #000;
        }

        .testimonial-wrapper {
            position: relative;
        }

        .testimonial-nav {
            position: absolute;
            top: 93%;
            width: 100%;
            transform: translateY(-50%);
            pointer-events: none;
            z-index: 99;
            text-align: center;
        }

        .testimonial-nav button {
            /* background: #007bff; */
            color: #007bff;
            border: none;
            border-radius: 50%;
            /* width: 40px;
            height: 40px; */
            font-size: 16px;
            pointer-events: all;
            cursor: pointer;
            transition: background 0.3s;
        }

        .testimonial-nav button:hover {
            background: #7cf039;
        }

        .ticket {
            font-size: 35px;
            text-shadow: 1px -1px #000;
            background: #ccc;
            padding: 15px;
            text-align: center;
        }

        .blog-img {
            width: 100%;
            height: 550px;
        }


        @media(max-width:600px) {
            .ticket {
                font-size: 28px;
            }

            .blog-img {
                width: 100%;
                height: 250px;
            }
        }
    </style>

</head>

<body>

    <!-- page start -->
    <div class="page">

        <!-- header start -->
        <header id="masthead" class="header prt-header-style-01">
            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu">
                <div class="site-header-menu-inner prt-stickable-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex align-items-center justify-content-between">
                                    <!-- site-branding -->
                                    <div class="site-branding">
                                        <h1><a class="home-link" href="{{ url('/') }}" title="NexCodeForge"
                                                rel="home">
                                                <img id="logo-img" height="50" width="200"
                                                    class="img-fluid auto_size" src="{{ asset('images/logo.png') }}"
                                                    alt="logo-img">
                                            </a></h1>
                                    </div><!-- site-branding end -->
                                    <div class="d-flex align-items-center">
                                        <div class="menu-link">
                                            <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                                <span class="menubar-box">
                                                    <span class="menubar-inner"></span>
                                                </span>
                                            </div>
                                            <!-- menu -->
                                            <nav class="main-menu menu-mobile" id="menu">
                                                <ul class="menu">
                                                    <li class="mega-menu-item active">
                                                        <a href="{{ route('home') }}">Home</a>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-link">Pages</a>
                                                        <ul class="mega-submenu">
                                                            <li><a href="{{ route('about') }}">About Us</a></li>
                                                            <li><a href="{{ route('enquiry.index') }}">Enquiry Now</a>
                                                            </li>
                                                            <li><a href="{{ route('services') }}">Services</a></li>
                                                            <li><a href="{{ route('privacy-policy') }}">Privacy
                                                                    Policy</a></li>
                                                            <li><a href="{{ route('refund-policy') }}">Refund
                                                                    Policy</a></li>
                                                            <li><a href="{{ route('terms-conditions') }}">Terms &
                                                                    Conditions</a></li>

                                                            <li><a href="{{ route('cookie-policy') }}">Cookie
                                                                    Policy</a></li>

                                                            <li><a href="{{ route('disclaimer') }}">Disclaimer</a>
                                                            </li>

                                                            <li><a href="{{ route('faq') }}">FAQ</a></li>

                                                            <li><a href="{{ route('maintenance-support') }}">Maintenance
                                                                    & Support</a></li>

                                                            <li><a href="{{ route('careers') }}">Careers</a></li>

                                                            {{-- <li><a href="{{ route('team') }}">Our Team</a></li> --}}
                                                            {{-- <li><a href="{{ route('team-details') }}">Team Details</a>
                                                            </li>
                                                            <li><a href="{{ route('error') }}">Error Page</a></li> --}}
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-link">Services</a>
                                                        <ul class="mega-submenu">
                                                            <li><a href="{{ route('creative-design') }}">UI/UX &
                                                                    Creative Design</a></li>
                                                            <li><a href="{{ route('web-designing') }}">Website/App
                                                                    Development</a></li>
                                                            <li><a href="{{ route('web-redesigning') }}">Website
                                                                    Re-Designing</a></li>
                                                            <li><a href="{{ route('digital-marketing') }}">Digital
                                                                    Marketing & SEO</a></li>
                                                            <li><a href="{{ route('content-engineering') }}">Content
                                                                    Engineering</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="{{ url('projects') }}"
                                                            class="mega-menu-link">Others</a>
                                                        <ul class="mega-submenu">
                                                            <li><a href="{{ url('projects') }}">Projects</a>
                                                            </li>
                                                            {{-- <li><a href="{{ url('project-details') }}">Project Details</a></li> --}}
                                                            {{-- <li><a href="{{ route('portfolio') }}">Portfolio</a> --}}
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-link">Tools</a>
                                                        <ul class="mega-submenu">
                                                            {{-- <li><a href="{{ route('pricing') }}">Pricing</a></li> --}}

                                                            <li><a href="{{ route('audit.show') }}">Free Audit
                                                                    Report</a></li>
                                                            <li><a href="{{ route('color-picker') }}">HTML
                                                                    Color Picker</a></li>
                                                            <li><a href="{{ route('remove-bg') }}">Remove
                                                                    Background</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                </li>
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-link">Blogs</a>
                                                    <ul class="mega-submenu">
                                                        <li><a href="{{ route('blogs') }}">All Blogs</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-item">
                                                    <a href="{{ url('contactus') }}">Contact Us</a>
                                                </li>
                                                </ul>
                                            </nav><!-- menu end -->
                                            <!-- header_extra -->
                                        </div>
                                        <div class="side-menu-container d-flex align-items-center">
                                            <div class="header_call">
                                                <span class="call-text">Call Now : </span>
                                                <a href="tel:+91 7669166975" class="call_btn"> +91 7669166975</a>
                                            </div>
                                            <div class="side-menu"><a href="#"><i class="icon-menu"></i></a>
                                            </div>
                                            <!-- Side Menu -->
                                            <div class="side-overlay">
                                                <div class="side bg-base-dark">
                                                    <a href="#" class="close-side"><i
                                                            class="icon-close"></i></a>
                                                    <div class="prt-fbar-box">
                                                        <div class="row">
                                                            <div class="col-lg-8 m-auto">
                                                                <div class="floatingbar-widgets-top">
                                                                    <div class="menu-floatibar-menu-1">
                                                                        <ul class="floatingbar-list">
                                                                            <li class="floatingbar-item pl-0">
                                                                                <a href="{{ url('about') }}"
                                                                                    class="floatingbar-link">About
                                                                                    Us</a>
                                                                            </li>
                                                                            <li class="floatingbar-item">
                                                                                <a href="{{ url('contactus') }}"
                                                                                    class="floatingbar-link">Contact
                                                                                    Us</a>
                                                                            </li>
                                                                            <li class="floatingbar-item pl-0">
                                                                                <a href="{{ url('services') }}"
                                                                                    class="floatingbar-link">Services</a>
                                                                            </li>
                                                                            <li class="floatingbar-item">
                                                                                <a href="{{ url('projects') }}"
                                                                                    class="floatingbar-link">Projects</a>
                                                                            </li>
                                                                            <li class="floatingbar-item">
                                                                                <a href="{{ url('blogs') }}"
                                                                                    class="floatingbar-link">Blog</a>
                                                                            </li>
                                                                            <li class="floatingbar-item">
                                                                                <a href="{{ url('enquiry') }}"
                                                                                    class="floatingbar-link">Enquiry
                                                                                    Now</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-8 m-auto">
                                                                <div class="floatingbar-widgets-bottom">
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="menu-floatibar-menu-4">
                                                                                <div class="menu-floatibar-text">
                                                                                    <div class="floatbar-menu-box_1">
                                                                                        <h3 class="floatbar-menu-h3">
                                                                                            Regional Office :</h3>
                                                                                        <p
                                                                                            class="floatbar-paragraph-text">
                                                                                            Noida, 3rd Floor, TechnoHub
                                                                                            Building – 201301, India</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <div class="menu-floatibar-menu-4">
                                                                                <div class="menu-floatibar-text">
                                                                                    <div
                                                                                        class="floatbar-menu-box_1 pl-0">
                                                                                        <h3 class="floatbar-menu-h3">
                                                                                            Head Office :</h3>
                                                                                        <p
                                                                                            class="floatbar-paragraph-text">
                                                                                            New Ashok-Nagar, East-Delhi
                                                                                            – 110096, India</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <div class="menu-floatibar-menu-4">
                                                                                <div class="menu-floatibar-text">
                                                                                    <div>
                                                                                        <ul class="floating-list">
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="{{ route('under-construction') }}"
                                                                                                    class="floating-list-item-link">Awards</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="{{ url('services') }}"
                                                                                                    class="floating-list-item-link">Services</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="{{ route('careers') }}"
                                                                                                    class="floating-list-item-link">Careers</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="{{ url('enquiry') }}"
                                                                                                    class="floating-list-item-link">Inquiries</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="{{ url('maintenance-support') }}"
                                                                                                    class="floating-list-item-link">Help</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="{{ route('terms-conditions') }}"
                                                                                                    class="floating-list-item-link">T&C</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Side Menu -->
                                        </div>
                                        <!-- header_extra end -->
                                    </div>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- site-header-menu end-->
        </header><!-- header end -->

        <!-- site-main start -->

        @yield('content')

        <!-- site-main end-->

        <!-- footer start -->
        <footer class="footer widget-footer bg-base-dark clearfix">
            <div class="second-footer">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="footer-widget-box first-child">
                                <h3 class="widget-title-h3">Our location:</h3>
                                <div class="prt-iconbox mb-3">
                                    <div class="footer-icon">
                                        <div class="footer-icon-box">
                                            <span class="footer-icon-link"><i class="ti-location-pin"></i></span>
                                        </div>
                                        <div class="footer-box-content">
                                            <p class="mb-0">New Ashok-Nagar, East-Delhi – 110096, India
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="prt-iconbox">
                                    <div class="footer-icon">
                                        <div class="footer-icon-box">
                                            <span class="footer-icon-link"><i class="ti-location-pin"></i></span>
                                        </div>
                                        <div class="footer-box-content">
                                            <p class="mb-0">Noida, 3rd Floor, TechnoHub Building – 201301, India
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="footer-social-links-wrapper">
                                    <ul class="footer-social-icons">
                                        <li class="footer-social-icons-item">
                                            <a href="https://www.facebook.com/profile.php?id=61581703355275"
                                                target="_blank" class="footer-social-icons-link">Facebook</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="https://x.com/Nexcodeforge" target="_blank"
                                                class="footer-social-icons-link">Twitter</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="https://www.instagram.com/nexcodeforge" target="_blank"
                                                class="footer-social-icons-link">Instagram</a>
                                        </li>
                                        {{-- <li class="footer-social-icons-item">
                                            <a href="https://www.linkedin.com/" target="_blank"
                                                class="footer-social-icons-link">LinkedIn</a>
                                        </li> --}}
                                        <li class="footer-social-icons-item">
                                            <a href="https://nexcodeforge.blogspot.com/" target="_blank"
                                                class="footer-social-icons-link">Blogger</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="footer-widget-box">
                                <h3 class="widget-title-h3">Quick Links</h3>
                                <div class="footer-menu-links">
                                    <ul class="footer-menu-list">
                                        <li class="footer-menu-item">
                                            <a href="{{ route('about') }}" class="footer-menu-item-link">About Us</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('contactus') }}" class="footer-menu-item-link">Contact
                                                Us</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('enquiry') }}" class="footer-menu-item-link">Make
                                                Appointment</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('services') }}" class="footer-menu-item-link">Our
                                                Services</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('blogs') }}" class="footer-menu-item-link">Our Blogs</a>
                                        </li>

                                        {{-- <li class="footer-menu-item">
                                            <a href="{{ url('contactus') }}" class="footer-menu-item-link">Get In Touch</a>
                                        </li> --}}
                                        {{-- <li class="footer-menu-item">
                                            <a href="{{ route('home') }}" class="footer-menu-item-link">Meet Our
                                                Experts</a>
                                        </li> --}}
                                        <li class="footer-menu-item">
                                            <a href="{{ url('web-designing') }}" class="footer-menu-item-link">Web
                                                Designing</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('content-engineering') }}"
                                                class="footer-menu-item-link">Content Engineering</a>
                                        </li>
                                        <li class="footer-menu-item last-child">
                                            <a href="{{ route('faq') }}" class="footer-menu-item-link">FAQ</a>
                                        </li>
                                        <li class="footer-menu-item last-child">
                                            <a href="{{ route('maintenance-support') }}"
                                                class="footer-menu-item-link">Help</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('disclaimer') }}"
                                                class="footer-menu-item-link">Disclaimer</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('cookie-policy') }}" class="footer-menu-item-link">Cookie
                                                Policy</a>
                                        </li>
                                        <li class="footer-menu-item last-child">
                                            <a href="{{ route('privacy-policy') }}"
                                                class="footer-menu-item-link">Privacy Policy</a>
                                        </li>
                                        <li class="footer-menu-item last-child">
                                            <a href="{{ route('refund-policy') }}"
                                                class="footer-menu-item-link">Refund Policy</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('terms-conditions') }}"
                                                class="footer-menu-item-link">Terms & Conditions</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('careers') }}"
                                                class="footer-menu-item-link">Careers</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="footer-widget-box last-child">
                                <div class="widget_nav_menu">
                                    <div class="textwidget-widget-text">
                                        <div class="prt-numbertext">
                                            <p class="prt-numbertext-p">Our phone number</p>
                                            <h3 class="prt-numbertext-h3">
                                                <a href="tel:+91 7669166975" class="prt-numbertext-link">+91
                                                    76691 66975</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="prt-horizontal_sep mb-45 mt-25 res-991-mt-10 res-991-mb-25"></div>
                                <div class="widget_nav_menu">
                                    <div class="textwidget-widget-text">
                                        <div class="prt-numbertext">
                                            <p class="prt-numbertext-p">Our email address</p>
                                            <h3 class="prt-numbertext-h3">
                                                <a href="mailto:nexcodeforge@gmail.com"
                                                    class="prt-numbertext-link">nexcodeforge@gmail.com</a>
                                                <a href="mailto:support@nexcodeforge.com"
                                                    class="prt-numbertext-link">support@nexcodeforge.com</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="prt-horizontal_sep mb-40 mt-25 res-991-mt-10 res-991-mb-25"></div>
                                <div class="widget_nav_menu">
                                    <div class="textwidget-widget-text">
                                        <div class="prt-numbertext">
                                            <p class="prt-numbertext-p">Copyright © 2023 <a
                                                    href="{{ url('/') }}"
                                                    class="prt-numbertext-p-link">NexCodeForge</a> IT Solutions &
                                                Services</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->

        <!-- back-to-top start -->
        <a id="totop" href="#top">
            <i class="icon-angle-up"></i>
        </a>
        <!-- back-to-top end -->

    </div><!-- page end -->


    <!-- Javascript -->
    <script src="{{ asset('guest/assets/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/jquery-migrate-3.4.0.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('guest/assets/js/Scrolltrigger.js') }}"></script>
    <script src="{{ asset('guest/assets/js/SplitText.js') }}"></script>
    <script src="{{ asset('guest/assets/js/cursor.js') }}"></script>
    <script src="{{ asset('guest/assets/js/gsap.js') }}"></script>
    <script src="{{ asset('guest/assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/gsap-animation.js') }}"></script>
    <script src="{{ asset('guest/assets/js/jquery-validate.js') }}"></script>
    <script src="{{ asset('guest/assets/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('guest/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/jquery-waypoints.js') }}"></script>
    <script src="{{ asset('guest/assets/js/numinate.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/jquery-isotope.js') }}"></script>
    <script src="{{ asset('guest/assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('guest/assets/js/main.js') }}"></script>
    <script src="{{ asset('guest/assets/js/aos.js') }}"></script>
    <script>
        AOS.init({
            offset: 120,
            duration: 400,
        });
    </script>

    <!-- Revolution Slider -->
    <script src="{{ asset('guest/assets/revolution/js/revolution.tools.min.js') }}"></script>
    <script src="{{ asset('guest/assets/revolution/js/rs6.min.js') }}"></script>
    <script src="{{ asset('guest/assets/revolution/js/slider.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.testimonial-carousel');

            owl.owlCarousel({
                loop: true,
                margin: 20,
                nav: false, // disable default nav
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            // Custom next/prev
            $('.next-btn').click(function() {
                owl.trigger('prev.owl.carousel');
            });

            $('.prev-btn').click(function() {
                owl.trigger('next.owl.carousel');
            });
        });
    </script>

    @yield('scripts')

    <!-- Javascript end-->

</body>

</html>
