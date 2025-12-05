@extends('layouts.guest')
@section('title', 'Free Audit | NexCodeForge')
@section('meta_description', '')

@section('content')
    <!-- page-title -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Free Audit</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Free Audit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main content -->
    <div class="container py-4">
        <div class="row justify-content-center">

            <div class="col-lg-8 mb-3">
                <div class="card p-4 shadow-sm">
                    <div class="text-center mb-3">
                        <img src="{{ asset('guest/assets/images/audit.jpeg') }}" class="img-fluid" width="300" alt="Audit">
                    </div>
                    <h1 class="h2 mb-3 fw-bold text-center">Get Free Website Audit</h1>
                    <p class="text-muted">Enter your site domain (example: <code>example.com</code> or
                        <code>https://example.com</code>) and get a downloadable audit report (DOCX).</p>

                    <form id="auditForm">
                        @csrf
                        <div class="mb-3">
                            <label for="domain" class="form-label">Website URL or Domain</label>
                            <input type="text" id="domain" name="domain" class="form-control"
                                placeholder="example.com or https://example.com" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="includeWhois" name="includeWhois" checked>
                            <label class="form-check-label" for="includeWhois">Include WHOIS & SSL checks</label>
                        </div>

                        <button type="submit" id="auditBtn" class="btn btn-primary">Run Free Audit</button>
                    </form>

                    <div id="statusBox" class="mt-4" style="display:none;">
                        <div id="statusText" class="mb-2">Starting audit...</div>
                        <div class="progress">
                            <div id="statusProgress" class="progress-bar" role="progressbar" style="width:0%">0%</div>
                        </div>
                    </div>

                    <div id="resultBox" class="mt-3" style="display:none;">
                        <div id="resultMessage" class="mb-2"></div>
                        <a id="downloadLink" class="btn btn-success" style="display:none;">Download Report (DOCX)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('auditForm');
            const statusBox = document.getElementById('statusBox');
            const resultBox = document.getElementById('resultBox');
            const statusText = document.getElementById('statusText');
            const progressBar = document.getElementById('statusProgress');
            const downloadLink = document.getElementById('downloadLink');
            const resultMessage = document.getElementById('resultMessage');
            const auditBtn = document.getElementById('auditBtn');

            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                statusBox.style.display = 'block';
                resultBox.style.display = 'none';
                resultMessage.textContent = '';
                downloadLink.style.display = 'none';
                statusText.textContent = 'Validating...';
                progressBar.style.width = '10%';
                progressBar.textContent = '10%';
                auditBtn.disabled = true;

                const formData = new FormData(form);
                try {
                    // Start request
                    statusText.textContent = 'Sending to server...';
                    progressBar.style.width = '25%';
                    progressBar.textContent = '25%';

                    const resp = await fetch("{{ route('audit.run') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    });

                    if (!resp.ok) {
                        const errorText = await resp.text();
                        throw new Error(errorText || 'Server error');
                    }

                    // Receive JSON response
                    progressBar.style.width = '60%';
                    progressBar.textContent = '60%';
                    const data = await resp.json();

                    if (data.success) {
                        statusText.textContent = 'Audit complete.';
                        progressBar.style.width = '100%';
                        progressBar.textContent = '100%';

                        resultBox.style.display = 'block';
                        resultMessage.innerHTML =
                            `<strong>Site:</strong> ${data.domain} <br><small>Report generated</small>`;
                        downloadLink.href = data.download_url;
                        downloadLink.style.display = 'inline-block';
                    } else {
                        throw new Error(data.message || 'Audit failed');
                    }
                } catch (err) {
                    statusText.textContent = 'Error: ' + err.message;
                    progressBar.style.width = '100%';
                    progressBar.textContent = '100%';
                    resultBox.style.display = 'block';
                    resultMessage.textContent = 'Audit failed: ' + err.message;
                } finally {
                    auditBtn.disabled = false;
                }
            });
        });
    </script>
@endsection

@endsection
