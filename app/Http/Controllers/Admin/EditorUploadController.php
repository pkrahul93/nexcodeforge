<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditorUploadController extends Controller
{

    public function store(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // Optional: validate image
            $request->validate([
                'upload' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);

            $path = $file->store('blogs', 'public'); // storage/app/public/blogs
            $url = asset('storage/' . $path);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $file->getClientOriginalName(),
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'No file uploaded.']
        ]);
    }

    // public function store(Request $request)
    // {
    //     // Validate upload
    //     $request->validate([
    //         'upload' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
    //     ]);

    //     if ($request->hasFile('upload')) {
    //         $file = $request->file('upload');

    //         // Sanitize filename
    //         $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $file->getClientOriginalName());

    //         // Resize image (max width 1200px, maintain aspect ratio)
    //         $image = Image::make($file)
    //             ->resize(1200, null, function ($constraint) {
    //                 $constraint->aspectRatio();
    //                 $constraint->upsize();
    //             });

    //         // Save to storage/app/public/blogs
    //         $path = 'blogs/' . $filename;
    //         Storage::disk('public')->put($path, (string) $image->encode());

    //         $url = asset('storage/' . $path);

    //         // Return CKEditor 5 compatible JSON
    //         return response()->json([
    //             'uploaded' => 1,
    //             'fileName' => $filename,
    //             'url' => $url
    //         ]);
    //     }

    //     return response()->json([
    //         'uploaded' => 0,
    //         'error' => ['message' => 'No file uploaded.']
    //     ]);
    // }
}
