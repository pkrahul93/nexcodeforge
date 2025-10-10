<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $query = Promotion::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%")
                ->orWhere('content', 'like', "%{$request->search}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $promotions = $query->latest()->paginate(10);

        return view('backend.promotions.index', compact('promotions'));
    }


    public function createOrEdit($id = null)
    {
        $promotion = $id ? Promotion::findOrFail($id) : null;
        return view('backend.promotions.manage', compact('promotion'));
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'nullable|string',
            'button_text'   => 'nullable|string|max:100',
            'button_link'   => 'nullable|url',
            'timer'         => 'nullable|integer|min:0',
            'show_interval' => 'nullable|integer|min:0',
            'start_date'    => 'nullable|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
            'status'        => 'required|boolean',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // If updating, fetch the existing promotion
        $promotion = $id ? Promotion::find($id) : null;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($promotion && $promotion->image && file_exists(public_path('uploads/promotions/' . $promotion->image))) {
                unlink(public_path('uploads/promotions/' . $promotion->image));
            }

            // Upload new image
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads/promotions'), $imageName);
            $validated['image'] = $imageName;
        } else {
            // Avoid overwriting old image if updating
            if ($promotion) {
                unset($validated['image']);
            }
        }

        // Create or update promotion
        Promotion::updateOrCreate(['id' => $id], $validated);

        return redirect()->route('promotions.index')
            ->with('success', $id ? 'Promotion updated successfully!' : 'Promotion created successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->update(['status' => $request->status]);
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);

        if ($promotion->image && file_exists(public_path('uploads/promotions/' . $promotion->image))) {
            unlink(public_path('uploads/promotions/' . $promotion->image));
        }

        $promotion->delete();
        return response()->json(['message' => 'Promotion deleted successfully']);
    }
}
