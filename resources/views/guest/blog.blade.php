@extends('layouts.guest')
@section('title', 'Web & App Development Insights | NexCodeForge Blog')
@section('meta_description', 'Stay updated with NexCodeForge’s latest insights on web design, Laravel development, SEO,
    and digital innovation. Learn how to grow your online presence.')

    @php
        // dd($posts);
    @endphp
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
                                <h2 class="title">All Blogs</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span class="action">Blogs</span>
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

        <!--blog-section-->
        <section class="prt-row blog-section01 clearfix">
            <div class="container-fluid pl-160 pr-160">
                <div class="row">
                    <div class="col-lg-9 mb-3">
                        <h1 class="mb-4 bd-title">Search Results for : {{ $query }}</h1>
                        <div id="blog-list">
                            @include('guest.partials.blog-list')
                        </div>
                    </div>

                    {{-- Sidebar --}}
                    <div class="col-lg-3">
                        <div class="position-sticky" style="top: 100px;">

                            {{-- Search Box --}}
                            <div class="card mb-4 shadow-sm border-0">
                                <div class="card-body">
                                    <form action="{{ route('blogs.search') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="q" class="form-control"
                                                placeholder="Search blogs..." value="{{ request('q') }}">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- Categories --}}
                            <div class="card mb-4 shadow-sm border-0">
                                <div class="card-header bg-primary text-white fw-bold">Categories</div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($categories as $cat)
                                        <li class="list-group-item">
                                            <a href="{{ route('blogs.byCategory', $cat->slug) }}" class="text-dark">
                                                {{ $cat->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Tags --}}
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-primary text-white fw-bold">Tags</div>
                                <div class="card-body">
                                    @foreach ($tags as $tag)
                                        <a href="{{ route('blogs.byTag', $tag->slug) }}"
                                            class="badge bg-light text-dark border m-1">
                                            #{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--blog-section end-->

        <!--client-section-->
        {{-- <section class="prt-row prt-bg bg-base-gradient client-section clearfix">
            <div class="container-fluid">
                <!-- slick_slider -->
                <div class="row slick_slider spacing-3"
                    data-slick='{"slidesToShow": 6, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1170,"settings":{"slidesToShow": 5,"arrows":false,"autoplay":true}}, {"breakpoint":840,"settings":{"slidesToShow": 4,"arrows":false}}, {"breakpoint":630,"settings":{"slidesToShow": 3}},{"breakpoint":440,"settings":{"slidesToShow": 2}}]}'>
                    <div class="col-lg-2">
                        <div class="client-box">
                            <div class="client-thumbnail">
                                <img src="images/client-07.png" loading="lazy" alt="client-logo"
                                    class="client-box-image img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="client-box">
                            <div class="client-thumbnail">
                                <img src="images/client-04.png" loading="lazy" alt="client-logo"
                                    class="client-box-image img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="client-box">
                            <div class="client-thumbnail">
                                <img src="images/client-06.png" loading="lazy" alt="client-logo"
                                    class="client-box-image img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="client-box">
                            <div class="client-thumbnail">
                                <img src="images/client-04.png" loading="lazy" alt="client-logo"
                                    class="client-box-image img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="client-box">
                            <div class="client-thumbnail">
                                <img src="images/client-05.png" loading="lazy" alt="client-logo"
                                    class="client-box-image img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="client-box">
                            <div class="client-thumbnail">
                                <img src="images/client-06.png" loading="lazy" alt="client-logo"
                                    class="client-box-image img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="client-box">
                            <div class="client-thumbnail">
                                <img src="images/client-04.png" loading="lazy" alt="client-logo"
                                    class="client-box-image img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!--client-section end-->

    </div><!-- site-main end-->

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Handle pagination click
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        let pageUrl = $(this).attr('href'); // Get URL from pagination link
        if (!pageUrl) return;

        // Smooth scroll to top of blog list
        $('html, body').animate({ scrollTop: $("#blog-list").offset().top - 100 }, 400);

        // Load new posts
        $.ajax({
            url: pageUrl,
            type: 'GET',
            beforeSend: function() {
                $('#blog-list').css('opacity', '0.5');
            },
            success: function(response) {
                $('#blog-list').html(response);
                $('#blog-list').css('opacity', '1');
            },
            error: function() {
                alert('Something went wrong while loading posts.');
                $('#blog-list').css('opacity', '1');
            }
        });
    });
});
</script>
@endsection

