<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::with(['category', 'tags', 'user'])
            ->where('status', 'published')
            ->latest()
            ->get()
            ->toArray();

        $categories = Category::all();
        $tags = Tag::all(); // all tags, for sidebar/filter

        return view('guest.blog', compact('posts', 'categories', 'tags'));
    }

    public function blogDetails($slug = null)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $blog = $slug
            ? Blog::with(['category', 'tags', 'user', 'comments'])
            ->where('slug', $slug)
            ->firstOrFail()
            ->toArray()
            : null;

        return view('guest.blog-details', compact('categories', 'tags', 'blog'));
    }

    public function blogsByTag($slug)
    {
        // Fetch the tag by slug
        $tag = Tag::where('slug', $slug)->firstOrFail();

        // Get all blogs associated with this tag (only published blogs)
        $posts = $tag->posts()
            ->with(['category', 'tags', 'user'])
            ->where('status', 'published')
            ->latest()
            ->get()
            ->toArray();

        $categories = Category::all();
        $tags = Tag::all(); // all tags, for sidebar/filter

        return view('guest.blogs-by-tag', compact('posts', 'tag', 'categories', 'tags'));
    }

    public function storeComment(Request $request, Blog $blog)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'comment' => 'required|string|max:2000',
            'cookies-consent' => 'required',
        ]);

        $comment = new Comment();
        $comment->blog_id = $blog->id;
        $comment->user_id = Auth::id() ?? null; // if user logged in, store user_id
        $comment->name = $request->author;
        $comment->email = $request->email;
        $comment->website = $request->website;
        $comment->content = $request->comment;
        $comment->status = 'pending'; // default pending, admin can approve later
        $comment->save();

        return redirect()->back()->with('success', 'Your comment has been submitted for review.');
    }
}
