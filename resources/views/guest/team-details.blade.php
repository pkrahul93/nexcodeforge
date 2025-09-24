@extends('layouts.guest')
@section('title', 'Team Member Details')

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
                                    <h2 class="title">Jhon Martin</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ route('home') }}">Home</a>
                                    </span>
                                    <span class="action">Jhon Martin</span>
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

            <!--team-detail-section-->
            <section class="prt-row team-detail-section clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="team-member-single-content pr-60 res-991-pr-0">
                                <h3 class="team-member-single-title-h3">Jhon Martin</h3>
                                <div class="team-member-single-category">Product Analyst</div>
                                <p>Queen danio velvet catfish Sacramento blackfish, bullhead shark, Colorado squawfish Russian sturgeon clown triggerfish swamp-eel paradise fish. Hake cookie-cutter shark silver carp hawkfish snipe eel armorhead catfish, moray eel silverside! Bluegill toadfish, orangespine unicorn fish. Manta Ray Moorish idol moon sea robin: fierasfer, loach minnow southern Dolly Varden. South American darter pencilfish, "beluga sturgeon: walleye pollock," murray cod poolfish, "</p>
                                <div class="educations-main">
                                    <h2 class="team-detail-h2">Educations</h2>
                                    <div>
                                        <h3 class="team-detail-h3">Gulinary school in Paris</h3>
                                        <ul class="team-detail-llist">
                                            <li class="team-detail-llist-item">
                                              <div class="team-detail-llist-text">2015 – 2018</div>
                                            </li>
                                        </ul>
                                        <p class="team-desc">Queen danio velvet catfish Sacramento blackfish, bullhead shark, Colorado squawfish Russian sturgeon clown triggerfish swamp-eel paradise fish. Hake cookie-cutter shark silver carp hawkfish snipe eel armorhead catfish, moray eel silverside! Bluegill toa</p>
                                    </div>
                                    <div class="mt-20 mb-30">
                                        <h3 class="team-detail-h3">Culinary University of Patagonia</h3>
                                        <ul class="team-detail-llist">
                                            <li class="team-detail-llist-item">
                                              <div class="team-detail-llist-text">2018 – 2019</div>
                                            </li>
                                          </ul>
                                        <p class="team-desc">Queen danio velvet catfish Sacramento blackfish, bullhead shark, Colorado squawfish Russian sturgeon clown triggerfish swamp-eel paradise fish. Hake cookie-cutter shark silver carp hawkfish snipe eel armorhead catfish, moray eel silverside! Bluegill toa</p>
                                    </div>
                                </div>
                                <div class="experiance-main">
                                    <h2 class="team-detail-h2">Experiance</h2>
                                    <div>
                                        <h3 class="team-detail-h3">Asistants Senior Professors</h3>
                                        <ul class="team-detail-llist">
                                            <li class="team-detail-llist-item">
                                              <div class="team-detail-llist-text">2018 – 2020</div>
                                            </li>
                                        </ul>
                                        <p class="team-desc">Queen danio velvet catfish Sacramento blackfish, bullhead shark, Colorado squawfish Russian sturgeon clown triggerfish swamp-eel paradise fish. Hake cookie-cutter shark silver carp hawkfish snipe eel armorhead catfish, moray eel silverside! Bluegill toa</p>
                                    </div>
                                    <div class="mt-20">
                                        <h3 class="team-detail-h3">Asistants Senior Professors</h3>
                                        <ul class="team-detail-llist">
                                            <li class="team-detail-llist-item">
                                              <div class="team-detail-llist-text">2020 – 2022</div>
                                            </li>
                                        </ul>
                                        <p class="mb-0 team-desc" >Queen danio velvet catfish Sacramento blackfish, bullhead shark, Colorado squawfish Russian sturgeon clown triggerfish swamp-eel paradise fish. Hake cookie-cutter shark silver carp hawkfish snipe eel armorhead catfish, moray eel silverside! Bluegill toa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="res-991-mt-30">
                                <img width="417" height="503" class="img-fluid" src="images/team01.jpg" loading="lazy" alt="detail-img">
                                <div class="team-detail-main">
                                    <ul class="team-detail-list">
                                        <li class="team-detail-list-item">
                                          <div class="team-detail-list-text">Phone :</div>
                                          <div class="team-detail-list-text">
                                            <a href="tel:1234567890" class="team-detail-list-link">+1800 200 14567</a>
                                          </div>
                                        </li>
                                        <li class="team-detail-list-item">
                                          <div class="team-detail-list-text">Email :</div>
                                          <div class="team-detail-list-text">
                                            <a href="mailto:info@example.com" class="team-detail-list-link">info@example.com</a>
                                          </div>
                                        </li>
                                        <li class="team-detail-list-item">
                                          <div class="team-detail-list-text">Website :</div>
                                          <div class="team-detail-list-text">
                                            <a href="http://www.example.com/" class="team-detail-list-link">www.example.com</a>
                                          </div>
                                        </li>
                                    </ul>
                                    <ul class="team-detail-social-list">
                                        <li class="team-detail-list-item">
                                          <a href="#" class="team-detail-social-list-link"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li class="team-detail-list-item">
                                          <a href="#" class="team-detail-social-list-link"><i class="ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="team-detail-list-item">
                                          <a href="#" class="team-detail-social-list-link"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li class="team-detail-list-item">
                                          <a href="#" class="team-detail-social-list-link"><i class="ti-google"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--team-detail-section end-->

        </div><!-- site-main end-->

@endsection

