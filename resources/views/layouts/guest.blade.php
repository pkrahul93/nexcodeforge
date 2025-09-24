<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- ✅ SEO Optimized Meta -->
    <meta name="keywords"
        content="NexCodeForge, website development, application development, corporate websites, matrimonial portals, eCommerce solutions, IT services, responsive design, SEO-optimized websites">
    <meta name="description"
        content="NexCodeForge provides professional website and application development for corporate services, matrimonial sites, eCommerce, and IT solutions. Responsive, SEO-friendly, and tailored to your business needs.">
    <meta name="author" content="NexCodeForge">
    <meta name="robots" content="noindex, nofollow">

    <!-- ✅ Mobile Friendly -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ Security -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ✅ Page Title -->
    <title>@yield('title', 'NexCodeForge - Web & App Development')</title>

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
    <link rel="stylesheet" type="text/css" href="guest/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/fontello.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/aos.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/shortcodes.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/megamenu.css">
    <link rel="stylesheet" type="text/css" href="guest/assets/css/responsive.css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel='stylesheet' id='rs-plugin-settings-css' href="guest/assets/revolution/css/rs6.css">


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
                                        <h1><a class="home-link" href="index.html" title="Altech" rel="home">
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
                                                            <li><a href="{{ route('services') }}">Services</a></li>
                                                            <li><a href="{{ route('team') }}">Our Team</a></li>
                                                            <li><a href="{{ route('team-details') }}">Team Details</a>
                                                            </li>
                                                            <li><a href="{{ route('error') }}">Error Page</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-link">Services</a>
                                                        <ul class="mega-submenu">
                                                            <li><a href="{{ route('content-engineering') }}">Content
                                                                    Engineering</a></li>
                                                            <li><a href="{{ route('web-designing') }}">Wwebsite
                                                                    Design</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-link">Projects</a>
                                                        <ul class="mega-submenu">
                                                            <li><a href="{{ url('projects') }}">Projects</a>
                                                            </li>
                                                            <li><a href="{{ url('project-details') }}">Project Details</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-link">Blog</a>
                                                        <ul class="mega-submenu">
                                                            <li><a href="{{ route('blogs') }}">Blog Classic</a></li>
                                                            <li><a href="{{ route('blog-details') }}">Blog Single
                                                                    View</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="{{ url('contactus') }}">Contact us</a>
                                                    </li>
                                                </ul>
                                            </nav><!-- menu end -->
                                            <!-- header_extra -->
                                        </div>
                                        <div class="side-menu-container d-flex align-items-center">
                                            <div class="header_call">
                                                <span class="call-text">Tollfree : </span>
                                                <a href="tel:1234567890" class="call_btn"> (+123 456 7890)</a>
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
                                                                                <a href="about-us.html"
                                                                                    class="floatingbar-link">Pages</a>
                                                                            </li>
                                                                            <li class="floatingbar-item">
                                                                                <a href="contact-us.html"
                                                                                    class="floatingbar-link">Contact
                                                                                    Us</a>
                                                                            </li>
                                                                            <li class="floatingbar-item pl-0">
                                                                                <a href="services.html"
                                                                                    class="floatingbar-link">Services</a>
                                                                            </li>
                                                                            <li class="floatingbar-item">
                                                                                <a href="projects-style-1.html"
                                                                                    class="floatingbar-link">Project</a>
                                                                            </li>
                                                                            <li class="floatingbar-item">
                                                                                <a href="blog.html"
                                                                                    class="floatingbar-link">Blog</a>
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
                                                                                            Singapore</h3>
                                                                                        <p
                                                                                            class="floatbar-paragraph-text">
                                                                                            Schweizer Skischule
                                                                                            lohnerhubelsMtrasse 95
                                                                                            CH-3123 Belp</p>
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
                                                                                            Bali, indonesia</h3>
                                                                                        <p
                                                                                            class="floatbar-paragraph-text">
                                                                                            Schweizer Skischule
                                                                                            lohnerhubels Mtrasse 95
                                                                                            CH-3123 Belp</p>
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
                                                                                                <a href="#"
                                                                                                    class="floating-list-item-link">Awards</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="#"
                                                                                                    class="floating-list-item-link">Brands</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="#"
                                                                                                    class="floating-list-item-link">Careers</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="#"
                                                                                                    class="floating-list-item-link">Inquiries</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="#"
                                                                                                    class="floating-list-item-link">Help</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="floating-list-item">
                                                                                                <a href="#"
                                                                                                    class="floating-list-item-link">Transform</a>
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
                                <h3 class="widget-title-h3">Subscribe now!</h3>
                                <div class="form-block">
                                    <div class="widget-form">
                                        <form id="subscribe-form" class="newsletter-form" method="post"
                                            action="#" data-mailchimp="true">
                                            <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                                <p class="mb-0">
                                                    <input type="email" name="email" placeholder="Your email"
                                                        required="">
                                                </p>
                                                <button class="submit" type="submit">Send Now<i
                                                        class="fas fa-long-arrow-alt-up"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3 class="widget-title-h3">Our location:</h3>
                                <div class="prt-iconbox">
                                    <div class="footer-icon">
                                        <div class="footer-icon-box">
                                            <span class="footer-icon-link"><i class="ti-location-pin"></i></span>
                                        </div>
                                        <div class="footer-box-content">
                                            <p class="mb-0">Schweizer Skischule lohnerhubels Mtrasse 95 CH-3123 Belp
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-social-links-wrapper">
                                    <ul class="footer-social-icons">
                                        <li class="footer-social-icons-item">
                                            <a href="https://www.facebook.com/preyantechnosys19" target="_blank"
                                                class="footer-social-icons-link">Facebook</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="https://twitter.com/PreyanTechnosys" target="_blank"
                                                class="footer-social-icons-link">Twitter</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="https://www.instagram.com/preyan_technosys/" target="_blank"
                                                class="footer-social-icons-link">Instagram</a>
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
                                            <a href="{{ url('contactus') }}" class="footer-menu-item-link">Make
                                                Appointment</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('contactus') }}" class="footer-menu-item-link">Free
                                                Consultation</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('home') }}"
                                                class="footer-menu-item-link">Department</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('about') }}" class="footer-menu-item-link">About
                                                Company</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('home') }}" class="footer-menu-item-link">Our Case
                                                Studies</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ url('contactus') }}" class="footer-menu-item-link">Free
                                                Consultation</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('home') }}" class="footer-menu-item-link">Meet Our
                                                Experts</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('home') }}" class="footer-menu-item-link">Business
                                                Growth</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('home') }}" class="footer-menu-item-link">IT
                                                Management</a>
                                        </li>
                                        <li class="footer-menu-item">
                                            <a href="{{ route('home') }}" class="footer-menu-item-link">Software
                                                Dev</a>
                                        </li>
                                        <li class="footer-menu-item last-child">
                                            <a href="{{ route('home') }}" class="footer-menu-item-link">Our Case
                                                Studies</a>
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
                                                <a href="tel:+123456789" class="prt-numbertext-link">+1800 123 456789
                                                    99</a>
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
                                                <a href="mailto:contact@company.com"
                                                    class="prt-numbertext-link">nexcodeforge@gmail.com</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="prt-horizontal_sep mb-40 mt-25 res-991-mt-10 res-991-mb-25"></div>
                                <div class="widget_nav_menu">
                                    <div class="textwidget-widget-text">
                                        <div class="prt-numbertext">
                                            <p class="prt-numbertext-p">Copyright © 2023 <a href="index.html"
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
    <script src="guest/assets/js/jquery-3.6.4.min.js"></script>
    <script src="guest/assets/js/jquery-migrate-3.4.0.min.js"></script>
    <script src="guest/assets/js/bootstrap.bundle.js"></script>
    <script src="guest/assets/js/Scrolltrigger.js"></script>
    <script src="guest/assets/js/SplitText.js"></script>
    <script src="guest/assets/js/cursor.js"></script>
    <script src="guest/assets/js/gsap.js"></script>
    <script src="guest/assets/js/gsap.min.js"></script>
    <script src="guest/assets/js/gsap-animation.js"></script>
    <script src="guest/assets/js/jquery-validate.js"></script>
    <script src="guest/assets/js/jquery.prettyPhoto.js"></script>
    <script src="guest/assets/js/slick.min.js"></script>
    <script src="guest/assets/js/jquery-waypoints.js"></script>
    <script src="guest/assets/js/numinate.min.js"></script>
    <script src="guest/assets/js/imagesloaded.min.js"></script>
    <script src="guest/assets/js/jquery-isotope.js"></script>
    <script src="guest/assets/js/circle-progress.min.js"></script>
    <script src="guest/assets/js/main.js"></script>
    <script src="guest/assets/js/aos.js"></script>
    <script>
        AOS.init({
            offset: 120,
            duration: 400,
        });
    </script>

    <!-- Revolution Slider -->
    <script src='guest/assets/revolution/js/revolution.tools.min.js'></script>
    <script src='guest/assets/revolution/js/rs6.min.js'></script>
    <script src="guest/assets/revolution/js/slider.js"></script>
    <!-- Javascript end-->

</body>

</html>
