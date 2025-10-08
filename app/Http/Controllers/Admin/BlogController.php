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

    // Show add/edit form
    public function createOrEdit($id = null)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $blog = $id ? Blog::with('tags')->findOrFail($id) : null;
        $selectedTags = $blog ? $blog->tags->pluck('id')->toArray() : [];

        return view('backend.blogs.manage', compact('categories', 'tags', 'blog', 'selectedTags'));
    }

    // Store or update
    public function storeOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'array',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $data = [
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ];

        // Handle image
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $data['featured_image'] = $filename;
        }

        // Create or update blog
        $blog = Blog::updateOrCreate(['id' => $id], $data);

        // Sync tags
        $blog->tags()->sync($request->tags ?? []);

        return redirect()->route('blogs.index')->with('success', $id ? 'Blog updated successfully' : 'Blog created successfully');
    }

    // Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }

    // Update status via AJAX
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:draft,published,archived',
        ]);

        $blog = Blog::findOrFail($id);

        $blog->status = $request->status;

        // If status is 'published' and published_at is null or not set, update it
        if ($request->status === 'published' && empty($blog->published_at)) {
            $blog->published_at = now(); // uses current timestamp
        }

        // Optionally, if status is not published, you can clear published_at
        if ($request->status !== 'published') {
            $blog->published_at = null;
        }

        $blog->save();

        return response()->json([
            'success' => true,
            'status' => $blog->status,
            'message' => 'Blog status updated to ' . ucfirst($blog->status) . '.',
        ]);
    }
}
