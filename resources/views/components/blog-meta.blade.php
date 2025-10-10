@props([
    'pageType', // 'details', 'tag', 'category'
    'blog' => null,
    'tag' => null,
    'category' => null
])

@php
    // Default meta description if none provided
    $defaultDescription = "NexCodeForge provides professional website and app development services. Responsive, SEO-friendly, and tailored to your business needs.";
    $siteName = "NexCodeForge";
    $defaultImage = asset('default-blog-image.jpg');
@endphp

@if($pageType === 'details' && $blog)
    <title>{{ $blog['title'] }} | {{ $siteName }} Blog</title>
    <meta name="description" content="{{ Str::limit(strip_tags($blog['meta_description'] ?? $defaultDescription), 155) }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $blog['title'] }} | {{ $siteName }} Blog" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog['meta_description'] ?? $defaultDescription), 155) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ $defaultImage }}" />
    <meta property="og:site_name" content="{{ $siteName }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $blog['title'] }} | {{ $siteName }} Blog" />
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog['meta_description'] ?? $defaultDescription), 155) }}" />
    <meta name="twitter:image" content="{{ $defaultImage }}" />
    <meta name="twitter:site" content="@NexCodeForge" />
    <meta name="twitter:creator" content="@NexCodeForge" />

@elseif($pageType === 'tag' && $tag)
    <title>{{ $tag->name }} Blogs & Articles | {{ $siteName }} Insights</title>
    <meta name="description" content="Read the latest blogs and articles about {{ $tag->name }}. Expert insights, tutorials, and tips on web development, design, and digital innovation.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $tag->name }} Blogs & Articles | {{ $siteName }} Insights" />
    <meta property="og:description" content="Read the latest blogs and articles about {{ $tag->name }}. Expert insights, tutorials, and tips on web development, design, and digital innovation." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ $defaultImage }}" />
    <meta property="og:site_name" content="{{ $siteName }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $tag->name }} Blogs & Articles | {{ $siteName }} Insights" />
    <meta name="twitter:description" content="Read the latest blogs and articles about {{ $tag->name }}. Expert insights, tutorials, and tips on web development, design, and digital innovation." />
    <meta name="twitter:image" content="{{ $defaultImage }}" />
    <meta name="twitter:site" content="@NexCodeForge" />
    <meta name="twitter:creator" content="@NexCodeForge" />

@elseif($pageType === 'category' && $category)
    <title>{{ $category->name }} Blogs & Articles | {{ $siteName }} Insights</title>
    <meta name="description" content="Discover blogs and articles about {{ $category->name }}. Tips, tutorials, and insights to help you grow your web and app development knowledge.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $category->name }} Blogs & Articles | {{ $siteName }} Insights" />
    <meta property="og:description" content="Discover blogs and articles about {{ $category->name }}. Tips, tutorials, and insights to help you grow your web and app development knowledge." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ $defaultImage }}" />
    <meta property="og:site_name" content="{{ $siteName }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $category->name }} Blogs & Articles | {{ $siteName }} Insights" />
    <meta name="twitter:description" content="Discover blogs and articles about {{ $category->name }}. Tips, tutorials, and insights to help you grow your web and app development knowledge." />
    <meta name="twitter:image" content="{{ $defaultImage }}" />
    <meta name="twitter:site" content="@NexCodeForge" />
    <meta name="twitter:creator" content="@NexCodeForge" />

@else
    <!-- Default meta -->
    <title>{{ $siteName }} | Professional Web & App Development</title>
    <meta name="description" content="{{ $defaultDescription }}">
@endif
