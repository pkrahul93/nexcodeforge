<div class="row">
    @foreach ($posts as $post)
        <div class="card mb-4 shadow-sm border-0">
            @if (!empty($post->image_url))
                <img src="{{ $post->image_url }}" class="card-img-top blog-img" width="414" height="447" loading="lazy"
                    alt="{{ $post->title }}">
            @endif

            <div class="card-body">
                <h2 class="h5 card-title">
                    <a href="{{ route('blog.details', $post->slug) }}" class="text-decoration-none text-dark">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="text-muted small mb-2">
                    By <strong>{{ $post->user->name ?? 'Admin' }}</strong> |
                   {{ optional($post->published_at)->format('d M Y') ?? '-/-/-' }}
                </p>
                <p class="card-text text-muted">
                    {{ Str::limit($post->meta_description, 150) }}
                </p>
                <a href="{{ route('blog.details', $post->slug) }}" class="btn btn-primary btn-sm rounded-pill">Read
                    More</a>
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
