@extends('layouts.guest')
@section('title', 'Content Engineering Solutions | NexCodeForge')
@section('meta_description', 'NexCodeForge delivers smart content engineering solutions that combine technology, creativity, and automation. We help businesses organize, optimize, and deliver content that drives engagement and growth.')

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
                                        <input type="search" class="input-text" placeholder="Search" value="" name="s">
                                    </label>
                                    <button class="btn" type="submit"></button>
                                </form>
                            </aside>
                            <aside class="widget widget-nav-menu with-title">
                                <div class="widget-title">
                                    <h3>Our Services</h3>
                                </div>
                                <ul>
                                    <li class="active"><a href="content-engineering.html"> Content Engineering </a></li>
                                    <li><a href="experience-design.html"> Experience Design </a></li>
                                    <li><a href="content-engineering.html"> Data Structuring </a></li>
                                    <li><a href="experience-design.html">  Advisory Services  </a></li>
                                    <li><a href="content-engineering.html">  Digital Services  </a></li>
                                    <li><a href="experience-design.html">   IT Consultancy   </a></li>
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
                                            <a href="#">Download</a>
                                        </div>
                                        <div class="download_icon">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </div>
                                    </div>
                                    <div class="download-block01">
                                        <div class="prt-file-title">
                                            <span>Our Brochures</span>
                                            <a href="#">Download</a>
                                        </div>
                                        <div class="download_icon">
                                            <i class="far fa-file"></i>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <aside class="widget widget-banner with-title">
                               <div class="prt-col-bgcolor-yes bg-base-dark text-base-white col-bg-img-four prt-col-bgimage-yes prt-bg">
                                    <div class="prt-col-wrapper-bg-layer prt-bg-layer bg-base-dark">
                                        <div class="prt-col-wrapper-bg-layer-inner bg-base-dark"></div>
                                    </div>
                                    <div class="layer-content text-center">
                                        <h3 class="sidebar-banner-heading">Altech</h3>
                                        <div class="sidebar-banner-subheading">Need Help? We Are Here<br>To Help You</div>
                                        <a href="tel:1234567890" class="sidebar-banner-phone-link">+1 234 564 890</a>
                                        <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant" href="contact-us.html">Contact Us</a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-8 content-area">
                            <div class="prt-service-single-content-area">
                                <div class="prt_fatured_image-wrapper mb-40 res-575-mb-20">
                                    <img width="859" height="440" class="img-fluid" src="images/single-img-10.jpg" alt="services-1">
                                </div>
                                <div class="prt-service-description">
                                    <h3>The best digital agency around the world</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendt dolore magna aliqua. Quis ipsum suspendise ultrices gravida abore et dolore magna.</p>
                                     <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <ul class="service-detail-list">
                                                <li class="service-detail-list-item">
                                                  <div class="service-detail-list-text">Seize opportunities and spark</div>
                                                </li>
                                                <li class="service-detail-list-item">
                                                  <div class="service-detail-list-text">Experience to share goals</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <div>
                                                <ul class="service-detail-list">
                                                    <li class="service-detail-list-item">
                                                      <div class="service-detail-list-text">Comprehensive testing</div>
                                                    </li>
                                                    <li class="service-detail-list-item">
                                                      <div class="service-detail-list-text">Innovate &amp; create great</div>
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
                                                          <h3 class="iconbox-heading-sd">Project planning</h3>
                                                        </div>
                                                        <div class="iconbox-desc-sd">
                                                          <p class="iconbox-text-sd">Well aware of the existing mobile app market trends to keep tabs.</p>
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
                                                          <h3 class="iconbox-heading-sd">Research &amp; analysis</h3>
                                                        </div>
                                                        <div class="iconbox-desc-sd">
                                                          <p class="iconbox-text-sd">Well aware of the existing mobile app market trends to keep tabs.</p>
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
                                                          <h3 class="iconbox-heading-sd">Deployment</h3>
                                                        </div>
                                                        <div class="iconbox-desc-sd">
                                                          <p class="iconbox-text-sd">Well aware of the existing mobile app market trends to keep tabs.</p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 res-991-mt-30">
                                            <!-- col-img-img-three -->
                                            <div class="prt-bg prt-col-bgimage-yes col-bg-img-five z-index-2">
                                                <div class="prt-col-wrapper-bg-layer prt-bg-layer border-rad_30"></div>
                                                <div class="layer-content">
                                                </div>
                                            </div><!-- col-img-bg-img-three end-->
                                            <img class="img-fluid prt-equal-height-image w-100 border-rad_30" src="images/bg-image/col-bgimage-5.jpg" alt="bg-image">
                                        </div>
                                    </div>
                                    <div class="mt-40 res-767-mt-20">
                                        <div><h3>Frequently asked questions</h3></div>
                                        <div class="accordion style1">
                                            <!-- toggle -->
                                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                                <div class="toggle-title"><a href="#" class="active">How can i find my solutions?</a></div>
                                                <div class="toggle-content show">
                                                    <p>Sustainable development is the creed that underpins Irecco’s bespoke initiatives to protect the environment, strengthen communities and propel responsible functions including supply chain scheduling, manufacturing, services and spares, technology.</p>
                                                </div>
                                            </div><!-- toggle end -->
                                            <!-- toggle -->
                                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                                <div class="toggle-title"><a href="#">How much does solar cost?</a></div>
                                                <div class="toggle-content">
                                                    <p>Sustainable development is the creed that underpins Irecco’s bespoke initiatives to protect the environment, strengthen communities and propel responsible functions including supply chain scheduling, manufacturing, services and spares, technology.</p>
                                                </div>
                                            </div><!-- toggle end -->
                                            <!-- toggle -->
                                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                                <div class="toggle-title"><a href="#">What payment methods are available?</a></div>
                                                <div class="toggle-content">
                                                    <p>Sustainable development is the creed that underpins Irecco’s bespoke initiatives to protect the environment, strengthen communities and propel responsible functions including supply chain scheduling, manufacturing, services and spares, technology.</p>
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

