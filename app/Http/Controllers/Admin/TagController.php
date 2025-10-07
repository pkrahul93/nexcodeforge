<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display list of all tags.
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('backend.tags.manage', compact('tags'));
    }

    /**
     * Store or update tag (common method).
     */
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $request->id,
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        // If 'id' exists → update, else create new
        $tag = Tag::updateOrCreate(['id' => $request->id], $data);

        return redirect()->back()->with('success', $request->id ? 'Tag updated successfully' : 'Tag created successfully');
    }

    /**
     * Delete a tag.
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Tag deleted successfully');
    }

    /**
     * Update tag status.
     */
    public function updateStatus(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(['status' => $request->status]);
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }

}
