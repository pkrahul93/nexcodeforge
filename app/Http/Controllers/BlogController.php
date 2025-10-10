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
    public function index(Request $request)
    {
        $posts = Blog::with(['category', 'tags', 'user'])
            ->where('status', 'published')
            ->latest()
            ->paginate(6);

        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

        // AJAX request: return only partial view
        if ($request->ajax()) {
            return view('guest.partials.blog-list', compact('posts'))->render();
        }

        return view('guest.blog', compact('posts', 'categories', 'tags'));
    }


    public function blogDetails($slug = null)
    {
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

        $blog = $slug
            ? Blog::with(['category', 'tags', 'user', 'comments'])
            ->where('slug', $slug)
            ->firstOrFail()
            ->toArray()
            : null;

        return view('guest.blog-details', compact('categories', 'tags', 'blog'));
    }

    public function blogsByCategory(Request $request, $slug)
    {
        // Fetch the category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get paginated blogs for this category
        $posts = $category->posts()
            ->with(['category', 'tags', 'user'])
            ->where('status', 'published')
            ->latest()
            ->paginate(3);

        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

        // Handle AJAX pagination
        if ($request->ajax()) {
            return view('guest.partials.category-blog-list', compact('posts'))->render();
        }

        return view('guest.blogs-by-category', compact('posts', 'category', 'categories', 'tags'));
    }

    public function blogsByTag(Request $request, $slug)
    {
        // Fetch the tag by slug
        $tag = Tag::where('slug', $slug)->firstOrFail();

        // Get paginated blogs for this tag
        $posts = $tag->posts()
            ->with(['category', 'tags', 'user'])
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

        // Handle AJAX pagination
        if ($request->ajax()) {
            return view('guest.partials.tag-blog-list', compact('posts'))->render();
        }

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

    public function search(Request $request)
    {
        $query = $request->input('q');

        // If no search query, redirect back to blog index
        if (!$query) {
            return redirect()->route('blogs.index');
        }

        // Paginate search results like index method
        $posts = Blog::with(['category', 'tags', 'user'])
            ->where('status', 'published')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('meta_description', 'like', "%{$query}%")
                    ->orWhereHas('tags', function ($tagQuery) use ($query) {
                        $tagQuery->where('name', 'like', "%{$query}%");
                    })
                    ->orWhereHas('category', function ($catQuery) use ($query) {
                        $catQuery->where('name', 'like', "%{$query}%");
                    });
            })
            ->latest()
            ->paginate(6); // ✅ Pagination instead of get()->toArray()

        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

        // Handle AJAX request
        if ($request->ajax()) {
            return view('guest.partials.blog-list', compact('posts'))->render();
        }

        // Return full view for normal page load
        return view('guest.blog', compact('posts', 'query', 'categories', 'tags'));
    }
}
