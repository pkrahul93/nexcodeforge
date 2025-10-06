<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // List all posts
    public function index()
    {
        $posts = Blog::with(['category', 'tags', 'user'])->latestFirst()->get();
        return view('backend.blogs.index', compact('posts'));
    }

    // Show form to create post
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = [];
        return view('backend.blogs.manage', compact('categories', 'tags', 'selectedTags'));
    }

    // Store post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'array'
        ]);

        $post = Blog::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        // Attach multiple tags
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('blogs.index')->with('success', 'Post created successfully.');
    }

    // Edit post
    public function edit(Blog $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = $post->tags->pluck('id')->toArray();
        return view('backend.blogs.manage', compact('post', 'categories', 'tags', 'selectedTags'));
    }

    // Update post
    public function update(Request $request, Blog $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'array'
        ]);

        $post->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags); // replaces existing with new ones
        }

        return redirect()->route('blogs.index')->with('success', 'Post updated successfully.');
    }

    // Delete post
    public function destroy(Blog $post)
    {
        $post->delete();
        return redirect()->route('blogs.index')->with('success', 'Post deleted successfully.');
    }
}
