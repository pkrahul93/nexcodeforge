@extends('layouts.guest')
@section('title', 'Error')

@section('content')

<!-- site-main start -->
        <div class="site-main">

            <section class="prt-row error-404">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="page-content-main text-center">
                                <div class="page-content">
                                    <h2><i class="fa fa-thumbs-o-down"></i></h2>
                                    <h3>404 Error</h3>
                                    <p>This page may have been moved or deleted. Be sure to check your spelling.</p>
                                </div>
                                <div class="">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant" href="{{ route('home') }}">Back to home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- site-main end-->

@endsection

