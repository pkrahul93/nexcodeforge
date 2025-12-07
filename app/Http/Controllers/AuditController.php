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
use Symfony\Component\Process\ExecutableFinder;


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
    
    private function auditLog($auditId, $message)
    {
        Log::info("[AUDIT {$auditId}] {$message}");
    }

    public function run(Request $request)
    {
        // quick probe so we can see the request hit the exact file executed
        @file_put_contents('/tmp/audit_run_hit.txt', date('c') . ' - run() entry - ' . __FILE__ . ' - IP: ' . $request->ip() . PHP_EOL, FILE_APPEND);
    
        Log::info("Audit run() called with domain=" . $request->input('domain'));
    
        // Log a few request details for debugging (do NOT log sensitive headers or bearer tokens)
        Log::info('Audit request payload keys: ' . implode(',', array_keys($request->all())));
        Log::info('Audit request IP: ' . $request->ip());
        if ($request->headers->has('referer')) {
            Log::info('Audit referer: ' . substr($request->headers->get('referer'), 0, 200));
        }
    
        // ---------------- NORMALIZE domain first (so validation accepts http(s)://host and host)
        $raw = trim((string) $request->input('domain', ''));
    
        // remove surrounding quotes if any, and leading/trailing whitespace
        $raw = trim($raw, " \t\n\r\0\x0B\"'");
    
        // remove scheme (http:// or https://) if present
        $noScheme = preg_replace('#^https?://#i', '', $raw);
    
        // strip path, query and fragment (keep only host[:port])
        $hostOnly = preg_replace('#[/:?].*$#', '', $noScheme);
    
        // remove any leading "www." for storage/validation simplicity (keeps dns root)
        $hostOnly = preg_replace('#^www\.#i', '', $hostOnly);
    
        // final trim
        $hostOnly = trim($hostOnly);
    
        // If empty after normalization, return validation error early
        if ($hostOnly === '') {
            Log::warning('Audit validation failed: empty domain after normalization for raw=' . $raw);
            @file_put_contents('/tmp/audit_validation_err.txt', date('c') . ' - validation failed - empty domain after normalization - raw=' . $raw . PHP_EOL, FILE_APPEND);
    
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid domain (example: example.com).',
            ], 422);
        }
    
        // ---------------- VALIDATION (validate host-only value)
        $validator = \Validator::make(
            ['domain' => $hostOnly, 'includeWhois' => $request->input('includeWhois')],
            [
                'domain' => [
                    'required',
                    'string',
                    'max:255',
                    // basic hostname+TLD check (allows subdomains). Adjust if you need IDN support.
                    'regex:/^[A-Za-z0-9](?:[A-Za-z0-9-]{0,61}[A-Za-z0-9])?(?:\.[A-Za-z]{2,})+$/',
                ],
                'includeWhois' => 'sometimes|in:on,1,true',
            ],
            [
                'domain.regex' => 'Please enter a valid domain format (example: example.com).',
            ]
        );
    
        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            Log::warning('Audit validation failed: ' . json_encode($errors));
            @file_put_contents('/tmp/audit_validation_err.txt', date('c') . ' - validation failed - ' . json_encode($errors) . PHP_EOL, FILE_APPEND);
    
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors'  => $errors,
            ], 422);
        }
    
        Log::info("Validation passed for hostOnly: " . $hostOnly);
    
        // Rebuild a full URL to use for script (always include scheme for python script convenience)
        $domain = (preg_match('#^https?://#i', $raw) ? $raw : ('http://' . $hostOnly));
        $domain = preg_replace('/\s+/', '', $domain); // remove any whitespace
    
        // ensure parse_url can extract host; fallback to hostOnly we validated
        $parsedHost = parse_url($domain, PHP_URL_HOST) ?: $hostOnly;
        if (! $parsedHost || $parsedHost === '') {
            Log::error('Failed to parse host from domain: ' . $domain);
            return response()->json([
                'success' => false,
                'message' => 'Unable to determine host from the provided domain.',
            ], 422);
        }
    
        $includeWhois = $request->has('includeWhois') && in_array($request->input('includeWhois'), ['on', '1', 'true'], true);
    
        Log::info("Normalized domain: {$domain}");
    
        // ---------------- RATE LIMIT ----------------
        $clientIp = $request->ip();
        $host = strtolower($parsedHost);
    
        Log::info("Checking audit rate-limit for host={$host} IP={$clientIp}");
    
        $existingCount = Audit::where('domain', 'like', "%{$host}%")
            ->where('user_ip', $clientIp)
            ->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])
            ->count();
    
        $MAX_PER_DAY_PER_DOMAIN_PER_IP = 3;
        if ($existingCount >= $MAX_PER_DAY_PER_DOMAIN_PER_IP) {
            Log::warning("Rate limit hit for host={$host}, IP={$clientIp}");
            return response()->json([
                'success' => false,
                'message' => "Limit reached for $host."
            ], 429);
        }
    
        // ---------------- CREATE AUDIT RECORD ----------------
        $shortCode = $this->makeShortCode($host);
        $auditNumber = "ADT-{$shortCode}-" . now()->format("Ymd") . "-" . $this->getNextSequence($shortCode);
    
        $audit = Audit::create([
            'audit_number'  => $auditNumber,
            'domain'        => $domain,
            'status'        => 'running',
            'include_whois' => (int) $includeWhois,
            'started_at'    => now(),
            'user_ip'       => $clientIp,
        ]);
    
        $this->auditLog($audit->id, "Audit record created. Number: {$auditNumber}");
    
        // ---------------- PREPARE OUTPUT PATH ----------------
        $outFilename = uniqid("audit_") . ".docx";
        $outPath     = storage_path("app/public/audits/{$outFilename}");
        @mkdir(dirname($outPath), 0755, true);
    
        $audit->update([
            'file_name' => $outFilename,
            'file_path' => "storage/app/public/audits/{$outFilename}",
        ]);
    
        $this->auditLog($audit->id, "Output path prepared: {$outPath}");
    
        // ---------------- PYTHON & SCRIPT RESOLUTION ----------------
        $python = env('PYTHON_PATH', '/home/u255773032/micromamba_env/bin/python');
        $script = env('AUDIT_SCRIPT', base_path('scripts/audit.py'));
    
        $this->auditLog($audit->id, "Resolved python={$python}");
        $this->auditLog($audit->id, "Resolved script={$script}");
    
        if (!file_exists($python)) {
            $this->auditLog($audit->id, "Python binary missing: {$python}");
        }
        if (!file_exists($script)) {
            $this->auditLog($audit->id, "Audit script missing: {$script}");
        }
    
        // ---------------- RUN PYTHON PROCESS ----------------
        $envVars = [
            'OPENBLAS_NUM_THREADS' => '1',
            'OMP_NUM_THREADS'      => '1',
            'MKL_NUM_THREADS'      => '1',
            'NUMBA_NUM_THREADS'    => '1',
        ];
    
        $process = new Process([
            $python,
            $script,
            '--url', $domain,
            '--output', $outPath,
            '--whois', $includeWhois ? '1' : '0'
        ], null, $envVars);
    
        // allow more time for slow sites; tune as needed
        $process->setTimeout(300);
    
        $this->auditLog($audit->id, "Process starting...");
    
        try {
            $process->run(function ($type, $buffer) use ($audit) {
                if ($type === Process::OUT) {
                    $this->auditLog($audit->id, "[PYTHON STDOUT] " . trim($buffer));
                } else {
                    $this->auditLog($audit->id, "[PYTHON STDERR] " . trim($buffer));
                }
            });
    
            $exitCode = $process->getExitCode();
            $this->auditLog($audit->id, "Process finished with exit code={$exitCode}");
    
            if (!$process->isSuccessful()) {
                $err = $process->getErrorOutput();
                $this->auditLog($audit->id, "Python error: " . $err);
                $audit->update([
                    'status' => 'failed',
                    'stderr' => $err,
                    'finished_at' => now(),
                ]);
    
                return response()->json([
                    'success' => false,
                    'message' => 'Audit failed: Python error',
                    'stderr'  => $err,
                ], 500);
            }
    
            // ---------------- CHECK OUTPUT FILE ----------------
            if (!file_exists($outPath)) {
                $this->auditLog($audit->id, "ERROR: Output file not found at {$outPath}");
                $audit->update([
                    'status' => 'failed',
                    'stderr' => 'Output file missing',
                    'finished_at' => now(),
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Report generated but output file missing.',
                ], 500);
            }
    
            // ---------------- SUCCESS ----------------
            $audit->update([
                'status'       => 'completed',
                'finished_at'  => now(),
                'stdout'       => $process->getOutput(),
                'stderr'       => $process->getErrorOutput(),
            ]);
    
            $this->auditLog($audit->id, "Audit completed successfully.");
    
            return response()->json([
                'success' => true,
                'domain'  => $domain,
                'download_url' => route('audit.download', ['filename' => $outFilename]),
                'audit_id'     => $audit->id,
                'audit_number' => $auditNumber,
            ]);
    
        } catch (\Throwable $e) {
    
            $this->auditLog($audit->id, "Exception caught: {$e->getMessage()}");
            Log::error('AuditController::run exception: ' . $e->getMessage());
    
            $audit->update([
                'status'       => 'failed',
                'stderr'       => $e->getMessage(),
                'finished_at'  => now(),
            ]);
    
            return response()->json([
                'success' => false,
                'message' => 'Unexpected server error.',
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
