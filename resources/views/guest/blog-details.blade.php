@extends('layouts.guest')
@section('title', 'Blog-Details')

@php
    $blogUrl = url('blog-details/' . $blog['slug']); // full URL to the blog
    $blogTitle = $blog['title'] ?? 'Blog Title';
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
                                <h2 class="title">Blog Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span class="action">{{ $blog['slug'] ?? 'Blog Details' }}</span>
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
    @if (session('success'))
        <div class="alert alert-success col-md-8 mx-auto my-3 ">{{ session('success') }}</div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger col-md-8 mx-auto my-3 ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- site-main start -->
    <div class="site-main">

        <!--blog-single-section-->
        <section class="prt-row clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-blog-single position-relative pl-160 pr-160 res-1199-pr-0 res-1199-pl-0">
                            <div class="prt_single_image-wrapper mb-25">
                                <img width="1200" height="895" class="img-fluid" src="{{ $blog['image_url'] }}"
                                    loading="lazy" alt="post-img">
                            </div>
                            <h1>{{ $blog['title'] ?? 'N/A' }}</h1>

                            <hr>

                            <div>{!! $blog['content'] !!}</div>

                            <div class="testimonial-wrapper">
                                <div class="owl-carousel testimonial-carousel">
                                    @foreach ($blog['comments'] as $testimonial)
                                        <blockquote class="bg-base-grey">
                                            <div class="qoute-text">
                                                <p>{{ $testimonial['content'] }}</p>
                                                <span class="qoute-txt">{{ $testimonial['name'] }}</span>
                                            </div>
                                        </blockquote>
                                    @endforeach

                                    {{-- <blockquote class="bg-base-grey">
                                        <div class="qoute-text">
                                            <p>Our team discussed every single detail...</p>
                                            <span class="qoute-txt">Alex John Martin</span>
                                        </div>
                                    </blockquote>
                                    <blockquote class="bg-base-grey">
                                        <div class="qoute-text">
                                            <p>Another testimonial content goes here...</p>
                                            <span class="qoute-txt">Jane Doe</span>
                                        </div>
                                    </blockquote>
                                    <blockquote class="bg-base-grey">
                                        <div class="qoute-text">
                                            <p>Another testimonial content goes here...</p>
                                            <span class="qoute-txt">Jane Doe</span>
                                        </div>
                                    </blockquote> --}}
                                    <!-- Add more blockquotes -->
                                </div>

                                <!-- Custom navigation buttons -->
                                <div class="testimonial-nav">
                                    <button class="prev-btn"><i class="fas fa-arrow-left"></i></button>
                                    <button class="next-btn"><i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>


                            {{-- <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="">
                                        <a class="prt_prettyphoto" href="images/blog/blogdetails01.jpg"
                                            rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <div class="prt_image-wrapper">
                                                <img width="416" height="203" class="img-fluid w-100"
                                                    src="{{ asset('guest/assets/images/blog/blogdetails01.jpg') }}"
                                                    loading="lazy" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="res-575-mt-30">
                                        <a class="prt_prettyphoto" href="images/blog/blogdetails02.jpg"
                                            rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <div class="prt_image-wrapper">
                                                <img width="416" height="203" class="img-fluid w-100"
                                                    src="{{ asset('guest/assets/images/blog/blogdetails02.jpg') }}"
                                                    loading="lazy" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="res-767-mt-30">
                                        <a class="prt_prettyphoto" href="images/blog/blogdetails03.jpg"
                                            rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <div class="prt_image-wrapper">
                                                <img width="416" height="203" class="img-fluid w-100"
                                                    src="{{ asset('guest/assets/images/blog/blogdetails03.jpg') }}"
                                                    loading="lazy" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="post-content position-relative">
                                <div class="prt-horizontal_sep mt-45 mb-35 res-991-mt-20 res-991-mb-15"></div>
                                <div class="social-media-block">
                                    <div class="prt_tag_lists">
                                        <span class="prt-tags-links-title">Tags:</span>
                                        <span class="prt-tags-links">
                                            @foreach ($blog['tags'] as $tag)
                                                <a href="{{ route('blogs.byTag', $tag['slug']) }}"
                                                    class="badge bg-dark me-1 mb-2">
                                                    {{ $tag['name'] }}
                                                </a>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content position-relative">
                                <div class="prt-social-share-wrapper">
                                    <span class="prt-tags-links-title">Share :</span>
                                    <ul class="social-icons">
                                        <!-- Facebook -->
                                        <li class="badge bg-light rounded-pill me-1 p-2">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($blogUrl) }}"
                                                target="_blank" rel="noopener" aria-label="facebook">
                                                <i class="fab fa-facebook-f"></i> Facebook
                                            </a>
                                        </li>

                                        <!-- Twitter -->
                                        <li class="badge bg-light rounded-pill me-1 p-2">
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($blogUrl) }}&text={{ urlencode($blogTitle) }}"
                                                target="_blank" rel="noopener" aria-label="twitter">
                                                <i class="fab fa-twitter"></i> Twitter
                                            </a>
                                        </li>

                                        <!-- LinkedIn -->
                                        <li class="badge bg-light rounded-pill me-1 p-2">
                                            <a href="https://www.linkedin.com/shareArticle?url={{ urlencode($blogUrl) }}&title={{ urlencode($blogTitle) }}"
                                                target="_blank" rel="noopener" aria-label="linkedin">
                                                <i class="fab fa-linkedin-in"></i> LinkedIn
                                            </a>
                                        </li>

                                        <!-- WhatsApp -->
                                        <li class="badge bg-light rounded-pill me-1 p-2">
                                            <a href="https://api.whatsapp.com/send?text={{ urlencode($blogTitle . ' ' . $blogUrl) }}"
                                                target="_blank" rel="noopener" aria-label="whatsapp">
                                                <i class="fab fa-whatsapp"></i> WhatsApp
                                            </a>
                                        </li>

                                        <!-- Telegram -->
                                        <li class="badge bg-light rounded-pill me-1 p-2">
                                            <a href="https://t.me/share/url?url={{ urlencode($blogUrl) }}&text={{ urlencode($blogTitle) }}"
                                                target="_blank" rel="noopener" aria-label="telegram">
                                                <i class="fab fa-telegram-plane"></i> Telegram
                                            </a>
                                        </li>

                                        <!-- Instagram (Note: no direct sharing, can link to profile or copy link) -->
                                        <li class="badge bg-light rounded-pill me-1 p-2">
                                            <a href="{{ $blogUrl }}" target="_blank" rel="noopener"
                                                aria-label="instagram">
                                                <i class="fab fa-instagram"></i> Instagram
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="prt-blog-classic-box-comment clearfix">
                            <div id="comments" class="comments-area">
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Leave a Reply</h3>
                                    <p class="comment-notes">Your email address will not be published.</p>
                                    <form action="{{ route('comments.store', $blog['id']) }}" method="post"
                                        id="commentform" class="comment-form">
                                        @csrf
                                        <p class="comment-form-author">
                                            <input id="author" placeholder="Name*" name="author" type="text"
                                                value="" size="30" aria-required="true" required>
                                        </p>
                                        <p class="comment-form-email">
                                            <input id="email" placeholder="Email*" name="email" type="text"
                                                value="" size="30" aria-required="true" required>
                                        </p>
                                        <p class="comment-form-emails">
                                            <input id="website" placeholder="website (optional)" name="website"
                                                type="text" value="" size="30" aria-required="true">
                                        </p>
                                        <p class="comment-form-comment">
                                            <textarea id="comment" placeholder="Comment*" name="comment" cols="45" rows="4" aria-required="true"
                                                required></textarea>
                                        </p>
                                        <p class="form-submit cookies">
                                            <span class="checkbox"><input type="checkbox" name="cookies-consent"
                                                    id="cookies-consent2" required>
                                                Save my name, email, and website in this browser for the next time I
                                                comment.</span>
                                        </p>
                                        <p class="comment-form-btn mt-45">
                                            <button
                                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant"
                                                type="submit">Post Comment</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!--blog-single-section end-->

    </div><!-- site-main end-->

@endsection
