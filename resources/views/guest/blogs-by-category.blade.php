@extends('layouts.guest')

@section('title', $category->meta_title ?? $category->name . ' Blogs')
@section('meta_description', $category->meta_description ?? 'Explore latest blogs and insights about ' .
    $category->name)

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
                                <span>
                                    <a title="Blogs" href="{{ route('blogs.index') }}">Blogs</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                                <span class="action">{{ $category->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-page-title-overlay"></div> -->
        </div>
    </div>
    <!-- page-title end -->

    <div class="container-fluid py-5 pl-30 pr-30">
        <div class="row">
            {{-- Blog Posts --}}
            <div class="col-lg-9 mb-3">
                <h1 class="mb-4 bd-title">Category : {{ $category->name }}</h1>

                <div id="blog-list">
                    @include('guest.partials.category-blog-list')
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
                                    <input type="text" name="q" class="form-control" placeholder="Search blogs..."
                                        value="{{ request('q') }}">
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
                                <li class="list-group-item {{ $cat->id === $category->id ? 'active' : '' }}">
                                    <a href="{{ route('blogs.byCategory', $cat->slug) }}"
                                        class="{{ $cat->id === $category->id ? 'text-white' : 'text-dark' }}">
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
@endsection


@section('scripts')
@include('guest.partials.ajax-pagination')
@endsection
