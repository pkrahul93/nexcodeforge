@extends('layouts.guest')
@section('title', 'Contact-Us')

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
    @if(session('success'))
        <div class="alert alert-success col-md-8 mx-auto my-3 ">{{ session('success') }}</div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
        <div class="alert alert-danger col-md-8 mx-auto my-3 ">
            <ul>
                @foreach($errors->all() as $error)
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
                            <div class="prt-col-bgcolor-yes bg-base-dark text-base-white col-bg-img-seven prt-col-bgimage-yes prt-bg">
                                <div class="prt-col-wrapper-bg-layer prt-bg-layer bg-base-dark">
                                    <div class="prt-col-wrapper-bg-layer-inner bg-base-dark"></div>
                                </div>
                                <div class="layer-content map-contect-form">
                                    <!-- section title -->
                                    <div class="section-title">
                                        <div class="title-header">
                                            <h2 class="title">Web designing in a powerful way of just not a profession, however</h2>
                                        </div>
                                    </div><!-- section title end -->
                                    <form action="{{ route('contact.store') }}" class="query_form wrap-form clearfix mt-25 res-991-mt-0 position-relative" method="post">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>
                                                    <span class="text-input"><input name="name" type="text" value="" placeholder="Name" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <label>
                                                    <span class="text-input"><input name="email" type="text" value="" placeholder="Email" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <label>
                                                    <span class="text-input"><input name="mobile" type="text" value="" placeholder="Phone" maxlength="10" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <label>
                                                    <span class="text-input"><textarea name="message" rows="5" placeholder=" your message" required="required"></textarea></span>
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
                                                   <button class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant" type="submit">Submit Now</button>
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
                                        <h2 class="section-title-h2">Get in touch</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>Web designing in a powerful way of just not a profession, however for our Company. We have a tendency to believe the idea that smart looking to believe the idea that smart looking</p>
                                    </div>
                                </div>
                                <div class="contact-address-box">
                                    <div class="address-box-info">
                                        <h3 class="address-box-heading">Schweizer</h3>
                                        <div class="address-box-text">Schweizer Skischule lohnerhubels <br>goergam Mtrasse 95 CH-3123 Belp</div>
                                    </div>
                                    <div class="address-box-map-link">
                                        <a href="https://www.google.com/maps" class="address-box-link">View On Map</a>
                                    </div>
                                </div>
                                <div class="contact-address-box last-child">
                                    <div class="address-box-info">
                                        <h3 class="address-box-heading">Maryam jakarta</h3>
                                        <div class="address-box-text">Schweizer Skischule lohnerhubels <br>goergam Mtrasse 95 CH-3123 Belp</div>
                                    </div>
                                    <div class="address-box-map-link">
                                        <a href="https://www.google.com/maps" class="address-box-link">View On Map</a>
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
                    <!-- row end -->
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="contentmap">
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="title">Frequently asked questions</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>Web designing in a powerful way of just not a profession, however for our Company. We have a tendency to believe the idea that smart looking to believe the idea that smart looking.</p>
                                    </div>
                                    <div class="mt-15">
                                        <h3 class="contact-heading-h3">Social media</h3>
                                        <ul class="social-icons map-links">
                                            <li><a href="https://www.facebook.com/preyantechnosys19" rel="noopener" aria-label="facebook" target="_blank">Facebook</a></li>
                                            <li><a href="https://twitter.com/PreyanTechnosys" rel="noopener" aria-label="twitter" target="_blank">Twitter</a></li>
                                            <li><a href="https://www.instagram.com/nex.codeforage?igsh=dHFidndiOHk3ZDRu" rel="noopener" aria-label="twitter" target="_blank">Instagram</a></li>
                                        </ul>
                                    </div>
                                </div><!-- section title end -->
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="accordion style2 res-991-mt-20">
                                <!-- toggle -->
                                <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                    <div class="toggle-title"><a href="#" class="active">01. Curious about how to your own UX strategy?</a></div>
                                    <div class="toggle-content show">
                                        <p>Web designing in a powerful way of just not a profession, however for our Company. We have a tendency to believe the idea that smart looking to believe the idea that smart looking.</p>
                                    </div>
                                </div><!-- toggle end -->
                                <!-- toggle -->
                                <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                    <div class="toggle-title"><a href="#">02. Where Could a Career in UX Take You? </a></div>
                                    <div class="toggle-content">
                                        <p>Web designing in a powerful way of just not a profession, however for our Company. We have a tendency to believe the idea that smart looking to believe the idea that smart looking.</p>
                                    </div>
                                </div><!-- toggle end -->
                                <!-- toggle -->
                                <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                    <div class="toggle-title"><a href="#">03. What Is a Problem Statement in UX?</a></div>
                                    <div class="toggle-content">
                                        <p>Web designing in a powerful way of just not a profession, however for our Company. We have a tendency to believe the idea that smart looking to believe the idea that smart looking.</p>
                                    </div>
                                </div><!-- toggle end -->
                                <!-- toggle -->
                                <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                    <div class="toggle-title"><a href="#">04.  What are the users are facing?</a></div>
                                    <div class="toggle-content">
                                        <p>Web designing in a powerful way of just not a profession, however for our Company. We have a tendency to believe the idea that smart looking to believe the idea that smart looking.</p>
                                    </div>
                                </div><!-- toggle end -->
                                <!-- toggle -->
                                <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                    <div class="toggle-title"><a href="#">05. What are they trying to?</a></div>
                                    <div class="toggle-content">
                                        <p>Web designing in a powerful way of just not a profession, however for our Company. We have a tendency to believe the idea that smart looking to believe the idea that smart looking.</p>
                                    </div>
                                </div><!-- toggle end -->
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
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.5404230618797!2d-0.12174774859469174!3d51.5033006187238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b900d26973%3A0x4291f3172409ea92!2slastminute.com%20London%20Eye!5e0!3m2!1sen!2sin!4v1629115262628!5m2!1sen!2sin" height="590"></iframe>
                                    </div>
                                </div>
                                <div class="map-overlay">
                                    <div class="prt-map-location">
                                        <h3>Find us</h3>
                                        <p>Schweizer Skischule lohnerhubels goergam Mtrasse 95 CH-3123 Belp</p>
                                        <ul class="map-list">
                                            <li>E-mail : <a href="mailto:contact@company.com" class="prt-maplink">altech123@gmail.com</a></li>
                                            <li>Phone number : <a href="tel:+123456789" class="prt-maplink">+1800 123 456789 99</a></li>
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

