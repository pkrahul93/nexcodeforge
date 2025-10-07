<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display all categories and the form.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Common Store or Update method.
     */
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $request->id,
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ];

        Category::updateOrCreate(['id' => $request->id], $data);

        return redirect()->route('categories.index')->with('success', $request->id ? 'Category updated successfully' : 'Category created successfully');
    }

    /**
     * Delete a category.
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    /**
     * Update status via AJAX.
     */
    public function updateStatus(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update(['status' => $request->status]);

        return response()->json(['success' => true, 'message' => 'Category status updated successfully']);
    }
}
