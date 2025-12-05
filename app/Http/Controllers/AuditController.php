<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AuditController extends Controller
{
    public function show()
    {
        return view('guest.free-audit'); // name of the blade from above
    }

    // List audits (admin / user)
    // public function index(Request $request)
    // {
    //     $query = Audit::query();
    //     if (auth()->check()) {
    //         // if you want users to see only their audits, uncomment:
    //         // $query->where('user_id', auth()->id());
    //     }
    //     $audits = $query->orderBy('created_at', 'desc')->paginate(20);
    //     return view('audits.index', compact('audits'));
    // }

    // // Show one audit
    // public function showDetail($id)
    // {
    //     $audit = Audit::findOrFail($id);
    //     return view('audits.show', compact('audit'));
    // }

    // public function run(Request $request)
    // {
    //     $request->validate([
    //         'domain' => 'required|string|max:255',
    //         'includeWhois' => 'sometimes|in:on'
    //     ]);

    //     $raw = trim($request->input('domain'));
    //     // normalize: add scheme if missing for python script convenience
    //     if (!preg_match('#^https?://#i', $raw)) {
    //         $domain = 'http://' . $raw;
    //     } else {
    //         $domain = $raw;
    //     }

    //     // sanitize further: remove spaces
    //     $domain = preg_replace('/\s+/', '', $domain);

    //     // create unique filename
    //     $uniq = uniqid('audit_');
    //     $outFilename = $uniq . '.docx';
    //     $outPath = storage_path('app/public/audits/' . $outFilename);

    //     // ensure directory exists
    //     if (!file_exists(dirname($outPath))) {
    //         mkdir(dirname($outPath), 0755, true);
    //     }

    //     // path to python script (place in project root or safe dir)
    //     $python = base_path('rembg_env/bin/python3');
    //     $script = base_path('scripts/audit.py');

    //     // build command safely
    //     $includeWhois = $request->has('includeWhois') ? '1' : '0';
    //     $process = new Process([
    //         $python,
    //         $script,
    //         '--url', $domain,
    //         '--output', $outPath,
    //         '--whois', $includeWhois
    //     ]);
    //     // recommended: set timeouts (e.g., 120 seconds)
    //     $process->setTimeout(120);

    //     try {
    //         $process->run();

    //         if (!$process->isSuccessful()) {
    //             // capture stderr for debug (do not leak sensitive info in production)
    //             throw new ProcessFailedException($process);
    //         }

    //         // check file exists
    //         if (!file_exists($outPath)) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Report generation failed: output file not found.'
    //             ], 500);
    //         }

    //         // store a copy in publicly accessible storage (or serve via controller)
    //         // We'll serve through controller /free-audit/download/{filename}
    //         return response()->json([
    //             'success' => true,
    //             'domain' => $domain,
    //             'download_url' => route('audit.download', ['filename' => $outFilename])
    //         ]);
    //     } catch (\Throwable $e) {
    //         Log::error('Audit error: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error running audit: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

    protected function makeShortCode(string $domain): string
    {
        $domain = strtolower($domain);
        $domain = str_replace(['http://', 'https://', 'www.'], '', $domain);
        $domain = preg_replace('/\/.*/', '', $domain); // remove path
        $parts = explode('.', $domain);
        $root = $parts[0] ?? 'GEN';
        return strtoupper(substr(preg_replace('/[^a-z0-9]/', '', $root), 0, 3) ?: 'GEN');
    }

    /**
     * Get next sequence (3 digits) for ADT-<SHORT>-YYYYMMDD-###
     * Resets daily per shortCode.
     */
    protected function getNextSequence(string $shortCode): string
    {
        $today = now()->format('Ymd');

        // Find last audit for this short code & date
        $last = Audit::where('audit_number', 'like', "ADT-{$shortCode}-{$today}-%")
            ->orderBy('audit_number', 'desc')
            ->first();

        if (! $last) {
            return '001';
        }

        // Extract last 3-digit sequence (rightmost 3 chars)
        $lastSeq = intval(substr($last->audit_number, -3));
        return str_pad($lastSeq + 1, 3, '0', STR_PAD_LEFT);
    }

    public function run(Request $request)
    {
        $request->validate([
            'domain' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^<>]*$/',                      // prevents < >
                'not_regex:/<script.*?>.*?<\\/script>/i', // prevents script tags
                'regex:/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // valid domain format
            ],
            'includeWhois' => 'sometimes|in:on',
        ], [
            'domain.regex' => 'Please enter a valid domain format.',
            'domain.not_regex' => 'HTML tags or script content are not allowed.',
        ]);

        // Normalize input domain (ensure scheme present for Python script)
        $raw = trim($request->input('domain'));

        if (! preg_match('#^https?://#i', $raw)) {
            $domain = 'http://' . $raw;
        } else {
            $domain = $raw;
        }

        $domain = preg_replace('/\s+/', '', $domain);
        $includeWhois = $request->has('includeWhois') ? true : false;

        // ---------- Enforce limit: max 3 audits per domain per IP per day ----------
        $MAX_PER_DAY_PER_DOMAIN_PER_IP = 3;
        $clientIp = $request->ip();

        // normalize host (example: http://example.com/path -> example.com)
        $host = parse_url($domain, PHP_URL_HOST) ?: $domain;
        $host = strtolower($host);

        $startOfDay = now()->startOfDay();
        $endOfDay   = now()->endOfDay();

        $existingCount = Audit::where('domain', 'like', "%{$host}%")
            ->where('user_ip', $clientIp)
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->count();

        if ($existingCount >= $MAX_PER_DAY_PER_DOMAIN_PER_IP) {
            return response()->json([
                'success' => false,
                'message' => "Limit reached: You have already generated {$existingCount} audits for {$host} from your IP today. Please try again tomorrow."
            ], 429);
        }

        // ---------- Generate audit number ADT-<SHORT>-YYYYMMDD-### ----------
        $shortCode = $this->makeShortCode($domain);   // e.g. NEX
        $today = now()->format('Ymd');                // e.g. 20251123
        $sequence = $this->getNextSequence($shortCode);
        $auditNumber = "ADT-{$shortCode}-{$today}-{$sequence}";

        // ---------- Prepare DB record (status: running) ----------
        $audit = Audit::create([
            'audit_number'  => $auditNumber,
            'domain'        => $domain,
            'status'        => 'running',
            'include_whois' => $includeWhois,
            'started_at'    => Carbon::now(),
            'user_ip'       => $clientIp,
        ]);

        // ---------- Prepare output file path ----------
        $uniq = uniqid('audit_');
        $outFilename = $uniq . '.docx';
        $outPath = storage_path('app/public/audits/' . $outFilename);

        if (! file_exists(dirname($outPath))) {
            @mkdir(dirname($outPath), 0755, true);
        }

        // update audit with file info early
        $audit->update([
            'file_name' => $outFilename,
            'file_path' => 'storage/app/public/audits/' . $outFilename,
        ]);

        // ---------- Build Python command (safe fallback if .env wrong) ----------
        // Prefer env PYTHON_PATH, but ensure it's a filesystem executable — fall back to 'python3'
        $python = env('PYTHON_PATH', 'python3');

        // If user accidentally placed a URL in PYTHON_PATH, try to recover path component
        if (filter_var($python, FILTER_VALIDATE_URL)) {
            $parts = parse_url($python);
            $python = $parts['path'] ?? 'python3';
        }

        // If it's a relative path under project (like base_path('rembg_env/bin/python3')) you can use that,
        // but here we attempt to resolve common project venv path if the env value looks like a relative string.
        if (! file_exists($python) || ! is_executable($python)) {
            // try typical project venv location
            $try = base_path('rembg_env/bin/python3');
            if (file_exists($try) && is_executable($try)) {
                $python = $try;
            } else {
                // fall back to system python3
                $python = 'python3';
            }
        }

        $script = base_path('scripts/audit.py');

        $process = new Process([
            $python,
            $script,
            '--url',
            $domain,
            '--output',
            $outPath,
            '--whois',
            $includeWhois ? '1' : '0'
        ]);

        // adjust timeout if needed (WHOIS, HEAD checks may take longer)
        $process->setTimeout(180);

        try {
            // stream output to DB columns (stdout/stderr)
            $process->run(function ($type, $buffer) use ($audit) {
                if ($type === Process::OUT) {
                    $audit->stdout = trim(($audit->stdout ?? '') . "\n" . $buffer);
                    $audit->saveQuietly();
                } else {
                    $audit->stderr = trim(($audit->stderr ?? '') . "\n" . $buffer);
                    $audit->saveQuietly();
                }
            });

            if (! $process->isSuccessful()) {
                $audit->status = 'failed';
                $audit->stderr = $process->getErrorOutput() ?: $audit->stderr;
                $audit->finished_at = Carbon::now();
                $audit->save();

                return response()->json([
                    'success' => false,
                    'message' => 'Error running audit: ' . $process->getErrorOutput()
                ], 500);
            }

            // on success, capture outputs
            $stdOut = $process->getOutput();
            $stdErr = $process->getErrorOutput();

            // attempt to parse JSON meta if script prints it
            $meta = null;
            $maybeJson = trim($stdOut);
            if ($maybeJson && (Str::startsWith($maybeJson, '{') || Str::startsWith($maybeJson, '['))) {
                try {
                    $meta = json_decode($maybeJson, true);
                } catch (\Throwable $e) {
                    $meta = null;
                }
            }

            // final DB update
            $audit->status = 'completed';
            $audit->stdout = $stdOut ?: $audit->stdout;
            $audit->stderr = $stdErr ?: $audit->stderr;
            $audit->meta = $meta;
            $audit->finished_at = Carbon::now();
            $audit->save();

            // ensure report file exists
            if (! file_exists($outPath)) {
                $audit->status = 'failed';
                $audit->save();

                return response()->json([
                    'success' => false,
                    'message' => 'Report generated but output file not found.'
                ], 500);
            }

            return response()->json([
                'success' => true,
                'domain' => $domain,
                'download_url' => route('audit.download', ['filename' => $outFilename]),
                'audit_id' => $audit->id,
                'audit_number' => $auditNumber,
            ]);
        } catch (\Throwable $e) {
            $audit->status = 'failed';
            $audit->stderr = ($audit->stderr ?? '') . "\nException: " . $e->getMessage();
            $audit->finished_at = Carbon::now();
            $audit->save();

            Log::error('AuditController::run error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unexpected error running audit.'
            ], 500);
        }
    }

    public function download($filename)
    {
        $path = storage_path('app/public/audits/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
        // optional: add download headers and a friendly filename
        return response()->download($path, 'site-audit-' . date('Y-m-d') . '.docx');
    }
}
