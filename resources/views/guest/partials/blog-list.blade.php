<div class="row">
    @foreach ($posts as $blog)
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="featured-imagebox-post-style1">
                <div class="featured-post-overlay">
                    <div class="featured-post-thumbnail">
                        <img width="414" height="447" class="img-fluid w-auto"
                            src="{{ $blog->image_url ?? asset('images/default-blog.jpg') }}" loading="lazy"
                            alt="{{ $blog->title }}">
                    </div>
                    <div class="featured-post-content">
                        <div class="post-entry-date">
                            {{ optional($blog->published_at)->format('d M Y') ?? '-/-/-' }}
                        </div>
                        <div class="prt-post-title">
                            <h3 class="post-h3">
                                <a href="{{ route('blog.details', $blog->slug) }}" class="post-link">
                                    {{ $blog->title }}
                                </a>
                            </h3>
                        </div>
                        <div class="prt-post-catagory blog-cat">
                            <div class="catagory-text">
                                {{ $blog->category->name ?? 'Category' }}
                            </div>
                        </div>
                        <div class="prt-post-catagory">
                            <div class="catagory-text">
                                {{ $blog->user->name ? 'By ' . $blog->user->name : 'By Author' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    <div class="col-12 mt-4">
        <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
