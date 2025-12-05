<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackgroundRemoveController extends Controller
{
    public function removeBackground(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        // Upload input image to temporary folder
        $inputFile = $request->file('image');
        $tempInput = storage_path('app/input_' . time() . '.' . $inputFile->getClientOriginalExtension());
        $inputFile->move(dirname($tempInput), basename($tempInput));

        // Output file path
        $outputFile = storage_path('app/output_' . time() . '.png');

        // Python command
        $python = base_path('rembg_env/bin/python3');
        $script = base_path('scripts/rembg_process.py');

        $command = "$python \"$script\" \"$tempInput\" \"$outputFile\" 2>&1";

        $response = shell_exec($command);

        if (!file_exists($outputFile)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Background removal failed.',
                'python_output' => $response
            ], 500);
        }

        return response()->download($outputFile)->deleteFileAfterSend(true);
    }
}
