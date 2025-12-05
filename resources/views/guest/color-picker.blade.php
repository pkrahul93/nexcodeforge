@extends('layouts.guest')

@section('title', 'Color Picker | ' . config('app.name', 'NexCodeForge'))
@section('meta_description', 'Pick colors quickly — copy hex, RGB, RGBA or HSL values, preview shades, and store recent
    colors.')

@section('content')
    <!-- page-title (matches site layout) -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Color Picker</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Color Picker</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="shadow-lg p-4 bg-white rounded">

                    <h1 class="fw-b text-center">Color Picker</h1>
                    <p class="text-muted small text-center">
                        Searching for that perfect color? Use our hex color picker to browse millions of colors and
                        harmonies.
                    </p>
                    <hr>

                    <section class="mb-4">
                        <div class="row gx-4 gy-4 align-items-start">
                            <!-- Left column: controls -->
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <input id="colorPicker" type="color" class="form-control p-0" value="#3490dc"
                                        aria-label="Pick color"
                                        style="width:64px;height:48px;border-radius:8px;border:none;">
                                    <div class="flex-grow-1">
                                        <label class="mb-1 small text-muted">Selected</label>
                                        <div id="selectedLabel" class="h5 mb-0">#3490dc</div>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col-12">
                                        <label class="form-label small">Hex</label>
                                        <input id="hexInput" type="text" class="form-control form-control-lg"
                                            value="#3490dc" aria-label="Hex value">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label small">R</label>
                                        <input id="rInput" type="number" min="0" max="255"
                                            class="form-control" aria-label="Red value">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label small">G</label>
                                        <input id="gInput" type="number" min="0" max="255"
                                            class="form-control" aria-label="Green value">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label small">B</label>
                                        <input id="bInput" type="number" min="0" max="255"
                                            class="form-control" aria-label="Blue value">
                                    </div>

                                    <div class="col-8">
                                        <label class="form-label small">Alpha (opacity)</label>
                                        <input id="aInput" type="range" min="0" max="1" step="0.01"
                                            class="form-range" aria-label="Alpha slider">
                                        <div class="small text-muted mt-1">Opacity: <span id="aLabel">1.00</span></div>
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label small">Format</label>
                                        <select id="format" class="form-select" aria-label="Output format">
                                            <option value="hex">Hex (#rrggbb)</option>
                                            <option value="rgb">RGB (rgb(r, g, b))</option>
                                            <option value="rgba">RGBA (rgba(r, g, b, a))</option>
                                            <option value="hsl">HSL (hsl(h, s%, l%))</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label small">Result</label>
                                        <div class="input-group input-group-lg">
                                            <input id="result" readonly class="form-control bg-light"
                                                aria-label="Color result" />
                                            <button id="copyBtn" class="btn btn-primary"
                                                aria-label="Copy color">Copy</button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label small">Contrast Checker</label>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div id="contrastSample" class="flex-grow-1 p-3 rounded text-center">Aa</div>
                                            <div class="small text-muted">
                                                <div>Foreground: <span id="fgColor">#000000</span></div>
                                                <div>Background: <span id="bgColor">#ffffff</span></div>
                                                <div>Ratio: <strong id="contrastRatio">—</strong></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-3">
                                    <label class="form-label small">Recent colors</label>
                                    <div id="recentColors" class="d-flex flex-wrap"></div>
                                </div>
                            </div>

                            <!-- Right column: preview & swatches -->
                            <div class="col-12 col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div id="preview" class="card-body rounded-top" style="min-height:220px;"></div>
                                    <div class="card-footer bg-white d-flex flex-column gap-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-0">Preview</h6>
                                                <small class="text-muted">How the color looks at different sizes</small>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <button id="copyHexBtn" class="btn btn-outline-secondary btn-sm">Copy
                                                    Hex</button>
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2 mt-2 flex-wrap align-items-center">
                                            <div class="p-3 rounded" id="bigSample" style="width:100%;height:80px;">
                                                &nbsp;</div>
                                            <div class="p-2 rounded" id="midSample" style="width:48px;height:48px;">
                                                &nbsp;</div>
                                            <div class="p-2 rounded" id="smallSample" style="width:32px;height:32px;">
                                                &nbsp;</div>
                                        </div>

                                        <div class="mt-2 small text-muted">Examples: <code>#ff6347</code>,
                                            <code>#0d6efd</code>, <code>#38bdf8</code></div>
                                    </div>
                                </div>

                                <div class="mt-3 p-3 bg-light rounded">
                                    <h6 class="mb-2">Accessibility</h6>
                                    <p class="small text-muted mb-0">This tool shows a basic contrast ratio. For production
                                        use, verify contrast against WCAG 2.1 standards.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <hr>

                    <p class="small text-muted text-center mb-0">This tool stores recent color choices in your browser
                        only. No data is sent to the server.</p>
                </div>

            </div>
        </div>
    </div>
    <style>
        /* small visual enhancements */
        #recentColors button {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.08);
            margin: 4px;
        }

        #preview {
            border-radius: 8px;
            min-height: 220px;
        }

        #contrastSample {
            border-radius: 6px;
            width: 64px;
        }

        /* mobile tweaks */
        @media (max-width:575.98px) {
            #bigSample {
                height: 64px;
            }

            #preview {
                min-height: 180px;
            }
        }
    </style>


    <script>
        (function() {
            const colorPicker = document.getElementById('colorPicker');
            const hexInput = document.getElementById('hexInput');
            const rInput = document.getElementById('rInput');
            const gInput = document.getElementById('gInput');
            const bInput = document.getElementById('bInput');
            const aInput = document.getElementById('aInput');
            const preview = document.getElementById('preview');
            const result = document.getElementById('result');
            const format = document.getElementById('format');
            const copyBtn = document.getElementById('copyBtn');
            const recentColors = document.getElementById('recentColors');
            const selectedLabel = document.getElementById('selectedLabel');
            const aLabel = document.getElementById('aLabel');
            const fgColor = document.getElementById('fgColor');
            const bgColor = document.getElementById('bgColor');
            const contrastRatioEl = document.getElementById('contrastRatio');
            const contrastSample = document.getElementById('contrastSample');
            const bigSample = document.getElementById('bigSample');
            const midSample = document.getElementById('midSample');
            const smallSample = document.getElementById('smallSample');

            function clamp(n, a, b) {
                return Math.min(b, Math.max(a, n));
            }

            function padHex(s) {
                return s.length === 1 ? '0' + s : s;
            }

            function toHex(n) {
                return padHex(Math.round(n).toString(16));
            }

            function rgbToHex(r, g, b) {
                return '#' + toHex(r) + toHex(g) + toHex(b);
            }

            function hexToRgb(hex) {
                hex = (hex || '').replace('#', '');
                if (hex.length === 3) hex = hex.split('').map(ch => ch + ch).join('');
                if (!/^[0-9a-fA-F]{6}$/.test(hex)) return {
                    r: 52,
                    g: 144,
                    b: 220
                };
                const num = parseInt(hex, 16);
                return {
                    r: (num >> 16) & 255,
                    g: (num >> 8) & 255,
                    b: num & 255
                };
            }

            function rgbToHsl(r, g, b) {
                r /= 255;
                g /= 255;
                b /= 255;
                const max = Math.max(r, g, b),
                    min = Math.min(r, g, b);
                let h = 0,
                    s = 0,
                    l = (max + min) / 2;
                if (max !== min) {
                    const d = max - min;
                    s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                    switch (max) {
                        case r:
                            h = (g - b) / d + (g < b ? 6 : 0);
                            break;
                        case g:
                            h = (b - r) / d + 2;
                            break;
                        case b:
                            h = (r - g) / d + 4;
                            break;
                    }
                    h /= 6;
                }
                return {
                    h: Math.round(h * 360),
                    s: Math.round(s * 100),
                    l: Math.round(l * 100)
                };
            }

            function hslString(r, g, b) {
                const hsl = rgbToHsl(r, g, b);
                return `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;
            }

            // contrast calculation (relative luminance)
            function luminance(r, g, b) {
                const srgb = [r, g, b].map(v => v / 255);
                const arr = srgb.map(c => c <= 0.03928 ? c / 12.92 : Math.pow((c + 0.055) / 1.055, 2.4));
                return 0.2126 * arr[0] + 0.7152 * arr[1] + 0.0722 * arr[2];
            }

            function contrastRatio(rgb1, rgb2) {
                const L1 = luminance(rgb1.r, rgb1.g, rgb1.b);
                const L2 = luminance(rgb2.r, rgb2.g, rgb2.b);
                const lighter = Math.max(L1, L2);
                const darker = Math.min(L1, L2);
                return (lighter + 0.05) / (darker + 0.05);
            }

            function setFromHex(hex) {
                try {
                    const rgb = hexToRgb(hex);
                    rInput.value = rgb.r;
                    gInput.value = rgb.g;
                    bInput.value = rgb.b;
                    colorPicker.value = rgbToHex(rgb.r, rgb.g, rgb.b);
                    selectedLabel.textContent = rgbToHex(rgb.r, rgb.g, rgb.b);
                    updatePreview();
                } catch (e) {}
            }

            function setFromRgb(r, g, b) {
                r = clamp(parseInt(r || 0), 0, 255);
                g = clamp(parseInt(g || 0), 0, 255);
                b = clamp(parseInt(b || 0), 0, 255);
                const hex = rgbToHex(r, g, b);
                hexInput.value = hex;
                colorPicker.value = hex;
                selectedLabel.textContent = hex;
                updatePreview();
            }

            function updatePreview() {
                const hex = hexInput.value.trim();
                const rgb = hexToRgb(hex);
                const a = parseFloat(aInput.value || 1);
                const rgba = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${a})`;
                preview.style.background = rgba;
                bigSample.style.background = rgba;
                midSample.style.background = rgba;
                smallSample.style.background = rgba;
                renderResult();
                updateContrast();
            }

            function renderResult() {
                const hex = hexInput.value.trim();
                const rgb = hexToRgb(hex);
                const a = parseFloat(aInput.value || 1);
                const fmt = format.value;
                if (fmt === 'hex') result.value = rgbToHex(rgb.r, rgb.g, rgb.b);
                else if (fmt === 'rgb') result.value = `rgb(${rgb.r}, ${rgb.g}, ${rgb.b})`;
                else if (fmt === 'rgba') result.value = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${a})`;
                else result.value = hslString(rgb.r, rgb.g, rgb.b);
            }

            function addRecent(hex) {
                if (!hex) return;
                let arr = JSON.parse(localStorage.getItem('recentColors') || '[]');
                arr = arr.filter(x => x.toLowerCase() !== hex.toLowerCase());
                arr.unshift(hex);
                if (arr.length > 12) arr.pop();
                localStorage.setItem('recentColors', JSON.stringify(arr));
                renderRecent();
            }

            function renderRecent() {
                recentColors.innerHTML = '';
                const arr = JSON.parse(localStorage.getItem('recentColors') || '[]');
                arr.forEach(hex => {
                    const btn = document.createElement('button');
                    btn.className = '';
                    btn.style.width = '36px';
                    btn.style.height = '36px';
                    btn.style.borderRadius = '8px';
                    btn.style.border = '1px solid rgba(0,0,0,0.08)';
                    btn.style.background = hex;
                    btn.title = hex;
                    btn.addEventListener('click', () => {
                        hexInput.value = hex;
                        setFromHex(hex);
                    });
                    recentColors.appendChild(btn);
                });
            }

            // events
            colorPicker.addEventListener('input', () => {
                hexInput.value = colorPicker.value;
                setFromHex(colorPicker.value);
                addRecent(colorPicker.value);
            });

            hexInput.addEventListener('input', () => {
                const v = hexInput.value.trim();
                if (!v) return;
                let withHash = v.startsWith('#') ? v : '#' + v;
                if (/^#?[0-9a-fA-F]{3}$/.test(v) || /^#?[0-9a-fA-F]{6}$/.test(v)) {
                    setFromHex(withHash);
                }
            });

            [rInput, gInput, bInput].forEach(inp => {
                inp.addEventListener('input', () => {
                    setFromRgb(rInput.value, gInput.value, bInput.value);
                    addRecent(hexInput.value);
                });
            });

            aInput.addEventListener('input', () => {
                aLabel.textContent = parseFloat(aInput.value).toFixed(2);
                updatePreview();
            });

            format.addEventListener('change', renderResult);

            copyBtn.addEventListener('click', () => {
                result.select();
                document.execCommand('copy');
                copyBtn.textContent = 'Copied!';
                setTimeout(() => copyBtn.textContent = 'Copy', 1200);
                addRecent(hexInput.value);
            });

            document.getElementById('copyHexBtn').addEventListener('click', () => {
                const rgb = hexToRgb(hexInput.value);
                const hex = rgbToHex(rgb.r, rgb.g, rgb.b);
                navigator.clipboard.writeText(hex).then(() => {
                    alert('Copied ' + hex);
                    addRecent(hex);
                });
            });

            function updateContrast() {
                const bg = hexToRgb(hexInput.value);
                // choose a default foreground — black or white — and compute ratio
                const white = {
                    r: 255,
                    g: 255,
                    b: 255
                };
                const black = {
                    r: 0,
                    g: 0,
                    b: 0
                };
                const ratioWithWhite = contrastRatio(bg, white);
                const ratioWithBlack = contrastRatio(bg, black);
                const better = ratioWithWhite > ratioWithBlack ? 'white' : 'black';
                const ratio = Math.max(ratioWithWhite, ratioWithBlack);
                contrastRatioEl.textContent = ratio.toFixed(2) + ':1 (' + (better === 'white' ? 'use white' :
                    'use black') + ')';
                fgColor.textContent = better === 'white' ? '#ffffff' : '#000000';
                bgColor.textContent = rgbToHex(bg.r, bg.g, bg.b);
                contrastSample.style.background = rgbToHex(bg.r, bg.g, bg.b);
                contrastSample.style.color = better === 'white' ? '#ffffff' : '#000000';
            }

            // init
            aInput.value = 1;
            aLabel.textContent = '1.00';
            setFromHex(hexInput.value || '#3490dc');
            renderRecent();
        })();
    </script>
@endsection
