@extends('layouts.guest')
@section('title', 'Meet Our Team | NexCodeForge Experts Behind Your Success')
@section('meta_description', 'Get to know the talented team at NexCodeForge — a group of passionate developers,
    designers, and strategists dedicated to crafting innovative web and app solutions that help your business grow.')

@section('content')

    <!-- page-title -->
    <div class="prt-page-title-row style2">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Our Experts</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Our Experts</span>
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

        <!--team-section-->
        <section class="prt-row team-section clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12">
                        <div class="blog-title text-end">
                            <div class="section-title style2">
                                <div class="title-header">
                                    <h2>Expert<span>Team</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 blog-sm">
                        <div class="process-desc process-desc1">
                            <p class="desc-text">Web designing in a powerful way of just not a profession, how in a passion
                                for our Company. We have a to the idea.</p>
                        </div>
                    </div>

                    {{-- <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 blog-sm">
                        <div class="blog-title text-end mt-25 res-991-mt-0">
                            <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant"
                                href="{{ route('team-details') }}">Contact Team!</a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 ">
                        <div class="section-title style2 mt-25 res-991-mt-0 res-991-mt_5">
                            <div class="title-header">
                                <h2>team</h2>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row mt-10 res-991-mt-20">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="featured-imagebox-team style1">
                            <div class="image-box-overlay"></div>
                            <div class="imagebox-team-thumbnail">
                                <img width="417" height="503" class="img-fluid" src="{{ asset('guest/assets/images/team01.jpg') }}" loading="lazy" alt="team-img">
                            </div>
                            <div class="imagebox-team-content">
                                <div class="imagebox-team-social">
                                    <ul class="team-social-icons">
                                        <li class="team-social-icon-item">
                                            <a href="https://www.facebook.com/preyantechnosys19" class="team-social-link"
                                                target="_blank"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://twitter.com/PreyanTechnosys" class="team-social-link"
                                                target="_blank"><i class="ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/"
                                                class="team-social-link" target="_blank"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.instagram.com/preyan_technosys/" class="team-social-link"
                                                target="_blank"><i class="ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="imagebox-team-title">
                                    <div class="imagebox-team-category">Founder & Director</div>
                                    <h3 class="imagebox-team-heading">
                                        <a href="{{ route('team-details') }}" class="team-heading-link">Kumar Rahul</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="featured-imagebox-team style1">
                            <div class="image-box-overlay"></div>
                            <div class="imagebox-team-thumbnail">
                                <img width="417" height="503" class="img-fluid" src="{{ asset('guest/assets/images/team02.jpg') }}" loading="lazy"
                                    alt="team-img">
                            </div>
                            <div class="imagebox-team-content">
                                <div class="imagebox-team-social">
                                    <ul class="team-social-icons">
                                        <li class="team-social-icon-item">
                                            <a href="https://www.facebook.com/preyantechnosys19" class="team-social-link"
                                                target="_blank"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://twitter.com/PreyanTechnosys" class="team-social-link"
                                                target="_blank"><i class="ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/"
                                                class="team-social-link" target="_blank"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.instagram.com/preyan_technosys/" class="team-social-link"
                                                target="_blank"><i class="ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="imagebox-team-title">
                                    <div class="imagebox-team-category">IT Associative</div>
                                    <h3 class="imagebox-team-heading">
                                        <a href="{{ route('team-details') }}" class="team-heading-link">Himanshi Gupta</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="featured-imagebox-team style1">
                            <div class="image-box-overlay"></div>
                            <div class="imagebox-team-thumbnail">
                                <img width="417" height="503" class="img-fluid" src="{{ asset('guest/assets/images/team03.jpg') }}"
                                    loading="lazy" alt="team-img">
                            </div>
                            <div class="imagebox-team-content">
                                <div class="imagebox-team-social">
                                    <ul class="team-social-icons">
                                        <li class="team-social-icon-item">
                                            <a href="https://www.facebook.com/preyantechnosys19" class="team-social-link"
                                                target="_blank"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://twitter.com/PreyanTechnosys" class="team-social-link"
                                                target="_blank"><i class="ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/"
                                                class="team-social-link" target="_blank"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.instagram.com/preyan_technosys/" class="team-social-link"
                                                target="_blank"><i class="ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="imagebox-team-title">
                                    <div class="imagebox-team-category">HR Manager</div>
                                    <h3 class="imagebox-team-heading">
                                        <a href="{{ route('team-details') }}" class="team-heading-link">Pooja Pandey</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="featured-imagebox-team style1">
                            <div class="image-box-overlay"></div>
                            <div class="imagebox-team-thumbnail">
                                <img width="417" height="503" class="img-fluid" src="{{ asset('guest/assets/images/team04.jpg') }}"
                                    loading="lazy" alt="team-img">
                            </div>
                            <div class="imagebox-team-content">
                                <div class="imagebox-team-social">
                                    <ul class="team-social-icons">
                                        <li class="team-social-icon-item">
                                            <a href="https://www.facebook.com/preyantechnosys19" class="team-social-link"
                                                target="_blank"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://twitter.com/PreyanTechnosys" class="team-social-link"
                                                target="_blank"><i class="ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/"
                                                class="team-social-link" target="_blank"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.instagram.com/preyan_technosys/" class="team-social-link"
                                                target="_blank"><i class="ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="imagebox-team-title">
                                    <div class="imagebox-team-category">Project Manager</div>
                                    <h3 class="imagebox-team-heading">
                                        <a href="{{ route('team-details') }}" class="team-heading-link">Nitesh Kumar</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="featured-imagebox-team style1">
                            <div class="image-box-overlay"></div>
                            <div class="imagebox-team-thumbnail">
                                <img width="417" height="503" class="img-fluid" src="{{ asset('guest/assets/images/team05.jpg') }}"
                                    loading="lazy" alt="team-img">
                            </div>
                            <div class="imagebox-team-content">
                                <div class="imagebox-team-social">
                                    <ul class="team-social-icons">
                                        <li class="team-social-icon-item">
                                            <a href="https://www.facebook.com/preyantechnosys19" class="team-social-link"
                                                target="_blank"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://twitter.com/PreyanTechnosys" class="team-social-link"
                                                target="_blank"><i class="ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/"
                                                class="team-social-link" target="_blank"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.instagram.com/preyan_technosys/" class="team-social-link"
                                                target="_blank"><i class="ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="imagebox-team-title">
                                    <div class="imagebox-team-category">Web & App Designer</div>
                                    <h3 class="imagebox-team-heading">
                                        <a href="{{ route('team-details') }}" class="team-heading-link">Nishant Kumar</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="featured-imagebox-team style1">
                            <div class="image-box-overlay"></div>
                            <div class="imagebox-team-thumbnail">
                                <img width="417" height="503" class="img-fluid" src="{{ asset('guest/assets/images/team06.jpg') }}"
                                    loading="lazy" alt="team-img">
                            </div>
                            <div class="imagebox-team-content">
                                <div class="imagebox-team-social">
                                    <ul class="team-social-icons">
                                        <li class="team-social-icon-item">
                                            <a href="https://www.facebook.com/preyantechnosys19" class="team-social-link"
                                                target="_blank"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://twitter.com/PreyanTechnosys" class="team-social-link"
                                                target="_blank"><i class="ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/"
                                                class="team-social-link" target="_blank"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li class="team-social-icon-item">
                                            <a href="https://www.instagram.com/preyan_technosys/" class="team-social-link"
                                                target="_blank"><i class="ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="imagebox-team-title">
                                    <div class="imagebox-team-category">Application Developer</div>
                                    <h3 class="imagebox-team-heading">
                                        <a href="{{ route('team-details') }}" class="team-heading-link">Abhishek Kumar</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--team-section end-->

    </div><!-- site-main end-->

@endsection
