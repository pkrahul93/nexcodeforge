@extends('layouts.guest')
@section('title', 'Page Under Construction')

@section('content')

    <!-- site-main start -->
    <div class="site-main">

        <section class="prt-row error-404">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="page-content-main text-center">
                            <div class="page-content text-center" style="padding: 80px 20px;">
                                <h2 style="font-size: 80px; color: #f39c12; margin-bottom: 10px;">
                                    <i class="fa fa-cogs"></i>
                                </h2>
                                <h3 style="font-size: 38px; color: #333; margin-bottom: 15px;">
                                    Page Under Construction
                                </h3>
                                <p style="font-size: 22px; color: #666; max-width: 800px; margin: 0 auto;">
                                    We’re currently working hard to bring you something amazing! 🚧
                                    This page is under development and will be available soon.
                                    Please check back in a little while.
                                </p>
                            </div>

                            <div class="">
                                <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant"
                                    href="{{ route('home') }}">Back to home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- site-main end-->

@endsection
