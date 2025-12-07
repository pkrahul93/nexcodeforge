<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackgroundRemoveController extends Controller
{
    public function removeBackground(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);
    
        $inputFile = $request->file('image');
        $timestamp = time();
        $ext = $inputFile->getClientOriginalExtension() ?: 'png';
        $tempInput = storage_path('app/input_' . $timestamp . '.' . $ext);
        $inputFile->move(dirname($tempInput), basename($tempInput));
    
        $outputFile = storage_path('app/output_' . $timestamp . '.png');
    
        // Python interpreter - prefer to set in .env
        $python = env('REMBG_PYTHON', '/home/u255773032/micromamba_env/bin/python');
    
        $script = base_path('scripts/rembg_process.py');
    
        // Env vars to force single-threaded BLAS/Numba
        $envVars = [
            'OPENBLAS_NUM_THREADS' => '1',
            'OMP_NUM_THREADS'      => '1',
            'MKL_NUM_THREADS'      => '1',
            'NUMBA_NUM_THREADS'    => '1',
        ];
    
        // Build the command as an array (avoids shell escaping issues)
        $process = new Process([$python, $script, $tempInput, $outputFile], /*cwd*/ null, $envVars);
    
        // Optionally increase timeout (default 60s). Set to null for no timeout.
        $process->setTimeout(300); // 5 minutes, tune as needed
    
        try {
            $process->run();
    
            // Always remove temp input file
            if (file_exists($tempInput)) {
                @unlink($tempInput);
            }
    
            // Check result
            if (!$process->isSuccessful() || !file_exists($outputFile)) {
                $output = trim($process->getErrorOutput() ?: $process->getOutput());
                return response()->json([
                    'status' => 'error',
                    'message' => 'Background removal failed.',
                    'python_exit_code' => $process->getExitCode(),
                    'python_output' => $output
                ], 500);
            }
    
            return response()->download($outputFile)->deleteFileAfterSend(true);
    
        } catch (ProcessFailedException $e) {
            // remove temp files
            if (file_exists($tempInput)) {
                @unlink($tempInput);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Background removal process failed to run.',
                'exception' => $e->getMessage()
            ], 500);
        } catch (\Throwable $t) {
            if (file_exists($tempInput)) {
                @unlink($tempInput);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error when running the background removal.',
                'error' => $t->getMessage()
            ], 500);
        }
    }

}
