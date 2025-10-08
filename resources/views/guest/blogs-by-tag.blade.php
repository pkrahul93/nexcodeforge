@extends('layouts.guest')
@section('title', 'Blogs By Tag')

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
                                <h2 class="title">All Blogs By Tag</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span class="action">{{ $tag->name }}</span>
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
            <div class="container">
                <div class="row">
                    @foreach ($posts as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="featured-imagebox-post-style1">
                                <div class="featured-post-overlay">
                                    <div class="featured-post-thumbnail">
                                        <img width="414" height="447" class="img-fluid w-auto"
                                            src="{{ $blog['image_url'] }}" loading="lazy" alt="image">
                                    </div>
                                    <div class="featured-post-content">
                                        <div class="post-entry-date">
                                            {{ !empty($blog['published_at']) ? \Carbon\Carbon::parse($blog['published_at'])->format('d M Y') : '-/-/-' }}
                                        </div>
                                        <div class="prt-post-title">
                                            <h3 class="post-h3">
                                                <a href="{{ route('blog.details', $blog['slug']) }}" class="post-link">
                                                    {{ $blog['title'] ?? 'Blog Title' }}
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="prt-post-catagory blog-cat">
                                            <div class="catagory-text">
                                                {{ !empty($blog['category']) ? $blog['category']['name'] : 'Category' }}
                                            </div>
                                        </div>
                                        <div class="prt-post-catagory">
                                            <div class="catagory-text">
                                                {{ !empty($blog['user']) ? 'By ' . $blog['user']['name'] : 'By Author' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="featured-imagebox-post-style1">
                                <div class="featured-post-overlay">
                                    <div class="featured-post-thumbnail">
                                        <img width="414" height="447" class="img-fluid w-auto" src="images/blog/blog-02-828x894.png" loading="lazy" alt="image">
                                    </div>
                                    <div class="featured-post-content">
                                        <div class="post-entry-date">16 Feb 2020</div>
                                        <div class="prt-post-title">
                                          <h3 class="post-h3">
                                            <a href="blog-single.html" class="post-link">Digital Conference Of IT Tech Events in 2019</a>
                                          </h3>
                                        </div>
                                        <div class="prt-post-catagory">
                                          <div class="catagory-text">By John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="featured-imagebox-post-style1">
                                <div class="featured-post-overlay">
                                    <div class="featured-post-thumbnail">
                                        <img width="414" height="447" class="img-fluid w-auto" src="images/blog/blog-03-828x894.jpg" loading="lazy" alt="image">
                                    </div>
                                    <div class="featured-post-content">
                                        <div class="post-entry-date">01 Jan 2020</div>
                                        <div class="prt-post-title">
                                          <h3 class="post-h3">
                                            <a href="blog-single.html" class="post-link">Where And How To Watch Live Stream Today</a>
                                          </h3>
                                        </div>
                                        <div class="prt-post-catagory">
                                          <div class="catagory-text">By John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="featured-imagebox-post-style1">
                                <div class="featured-post-overlay">
                                    <div class="featured-post-thumbnail">
                                        <img width="414" height="447" class="img-fluid w-auto" src="images/blog/blog-04-828x894.png" loading="lazy" alt="image">
                                    </div>
                                    <div class="featured-post-content">
                                        <div class="post-entry-date">22 Dec 2020</div>
                                        <div class="prt-post-title">
                                          <h3 class="post-h3">
                                            <a href="blog-single.html" class="post-link">5 Easy Ways to Improve Your Web Security</a>
                                          </h3>
                                        </div>
                                        <div class="prt-post-catagory">
                                          <div class="catagory-text">By John Doe</div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="featured-imagebox-post-style1">
                                <div class="featured-post-overlay">
                                    <div class="featured-post-thumbnail">
                                        <img width="414" height="447" class="img-fluid w-auto" src="images/blog/blog-05-828x894.jpg" loading="lazy" alt="image">
                                    </div>
                                    <div class="featured-post-content">
                                        <div class="post-entry-date">15 Dec 2020</div>
                                        <div class="prt-post-title">
                                          <h3 class="post-h3">
                                            <a href="blog-single.html" class="post-link">Define world best IT technology</a>
                                          </h3>
                                        </div>
                                        <div class="prt-post-catagory">
                                          <div class="catagory-text">By John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="featured-imagebox-post-style1">
                                <div class="featured-post-overlay">
                                    <div class="featured-post-thumbnail">
                                        <img width="414" height="447" class="img-fluid w-auto" src="images/blog/blog-06-828x894.jpg" loading="lazy" alt="image">
                                    </div>
                                    <div class="featured-post-content">
                                        <div class="post-entry-date">01 Dec 2020</div>
                                        <div class="prt-post-title">
                                          <h3 class="post-h3">
                                            <a href="blog-single.html" class="post-link">Define World Best IT Solution Technology</a>
                                          </h3>
                                        </div>
                                        <div class="prt-post-catagory">
                                          <div class="catagory-text">By John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
