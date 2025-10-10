<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Index method with filters
    public function index(Request $request)
    {
        // Start query
        $comments = Comment::query();

        // Filter by status (approved, pending, etc.)
        if ($request->has('status') && in_array($request->status, ['approved', 'pending'])) {
            $comments->where('status', $request->status);
        }

        // Filter by blog_id
        if ($request->has('blog_id') && is_numeric($request->blog_id)) {
            $comments->where('blog_id', $request->blog_id);
        }

        // Filter by user_id
        if ($request->has('user_id') && is_numeric($request->user_id)) {
            $comments->where('user_id', $request->user_id);
        }

        // Optional: search by name or email
        if ($request->has('search') && !empty($request->search)) {
            $comments->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        // Load relations
        $comments->with(['post', 'user']);

        // Paginate results
        $comments = $comments->orderBy('created_at', 'desc')->paginate(15);

        return view('backend.comments.index', compact('comments'));
    }

    // Destroy comment
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    // Update status (approve / pending)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->status = $request->status;
        $comment->save();

        return response()->json(['message' => 'Comment status updated successfully.']);
    }
}
