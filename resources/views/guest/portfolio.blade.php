@extends('layouts.guest')
@section('title', 'Portfolio | NexCodeForge')
@section('meta_description',
    'NexCodeForge portfolio — examples and demos of websites, mobile apps, CRMs, ERPs, LMS and
    MLM/e-commerce integrations. Request a quote or download our pricing spec.')

    <style>
        /* Small style tweaks to match pricing page visual language */
        .hero-brief {
            max-width: 860px;
            margin: 0 auto;
        }

        .feature-card {
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        }

        .service-icon {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(13, 110, 253, 0.06);
            color: #0d6efd;
            font-size: 1.4rem;
        }

        .project-card {
            transition: box-shadow .12s ease;
        }

        .project-card:focus,
        .project-card:hover {
            box-shadow: 0 10px 28px rgba(15, 23, 42, .06);
            outline: none;
        }

        .tag {
            display: inline-block;
            margin: .18rem .18rem .18rem 0;
            padding: .22rem .45rem;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.04);
            font-size: .78rem;
        }

        .download-link {
            font-weight: 600;
            color: #0d6efd;
        }

        @media (max-width:575px) {
            .hero-brief {
                padding: 0 1rem;
            }
        }
    </style>

@section('content')
    <!-- page-title (keeps same structure as pricing page) -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Our Portfolio</h2>
                            </div>
                            <div class="breadcrumb-wrapper" aria-label="breadcrumb">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Portfolio</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section py-5">
        <div class="container">

            <!-- Hero -->
            <div class="row mb-4 justify-content-center">
                <div class="col-12 text-center hero-brief">
                    <h1 class="h2 fw-bold">We build clean, reliable web & mobile apps</h1>
                    <p class="text-muted mb-3">Startup-ready solutions: websites, CRMs, ERPs, LMS, MLM/e-commerce — built
                        with modern tech, secure defaults, and clear delivery timelines.</p>

                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">Request a Quote</a>
                        <a href="#projects" class="btn btn-outline-primary btn-lg">View Demos</a>
                        <a href="{{ asset('guest/assets/docs/NexCodeForge_Pricing_Spec.docx') }}"
                            class="btn btn-link download-link" download>Download pricing spec</a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Why / quick features -->
            <div class="row mb-4 gx-3 gy-3">
                <div class="col-12 col-md-4">
                    <div class="p-3 bg-white rounded feature-card h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="service-icon"><i class="bi bi-lightning-charge-fill"></i></div>
                            <div>
                                <h5 class="mb-1">Fast, Iterative Delivery</h5>
                                <p class="text-muted mb-0">MVP-first approach with rapid iterations and clear milestones.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="p-3 bg-white rounded feature-card h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="service-icon"><i class="bi bi-shield-lock-fill"></i></div>
                            <div>
                                <h5 class="mb-1">Security & Best Practices</h5>
                                <p class="text-muted mb-0">Basic security hardening, secure coding practices and backups.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="p-3 bg-white rounded feature-card h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="service-icon"><i class="bi bi-people-fill"></i></div>
                            <div>
                                <h5 class="mb-1">Support & Maintenance</h5>
                                <p class="text-muted mb-0">Hosting, support plans, and optional performance monitoring.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services (Bootstrap cards) -->
            <div class="row mb-5">
                <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Services</h4>
                    <a href="{{ route('pricing') }}" class="btn btn-sm btn-outline-primary">Get a custom plan</a>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex gap-3">
                                <div class="service-icon flex-shrink-0"><i class="bi bi-code-slash"></i></div>
                                <div>
                                    <h5 class="mb-1">Custom Web Apps</h5>
                                    <p class="text-muted mb-2">CRMs, ERPs, admin panels and internal tools built to your
                                        workflow.</p>
                                    <span class="tag">Laravel</span> <span class="tag">API-first</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex gap-3">
                                <div class="service-icon flex-shrink-0"><i class="bi bi-cart-fill"></i></div>
                                <div>
                                    <h5 class="mb-1">E-commerce & MLM</h5>
                                    <p class="text-muted mb-2">Single/Direct, Binary, Matrix MLM plans and
                                        reseller/e-commerce integrations.</p>
                                    <span class="tag">Payment gateways</span> <span class="tag">Inventory</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex gap-3">
                                <div class="service-icon flex-shrink-0"><i class="bi bi-palette"></i></div>
                                <div>
                                    <h5 class="mb-1">UI/UX & Maintenance</h5>
                                    <p class="text-muted mb-2">Design systems, prototypes, and monthly maintenance packages.
                                    </p>
                                    <span class="tag">Figma</span> <span class="tag">Design system</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects & Filters -->
            <div id="projects" class="row mb-4">
                <div class="col-12 d-flex align-items-center justify-content-between mb-3">
                    <h4 class="mb-0">Projects & demos</h4>

                    <div class="d-flex gap-2 align-items-center">
                        <div class="d-none d-sm-flex">
                            <button class="btn btn-sm btn-outline-primary active filter" data-filter="all">All</button>
                            <button class="btn btn-sm btn-outline-secondary filter" data-filter="web">Web</button>
                            <button class="btn btn-sm btn-outline-secondary filter" data-filter="mobile">Mobile</button>
                            <button class="btn btn-sm btn-outline-secondary filter" data-filter="mlm">MLM / Ecom</button>
                        </div>

                        <select id="mobileFilter" class="form-select form-select-sm d-sm-none">
                            <option value="all">All</option>
                            <option value="web">Web</option>
                            <option value="mobile">Mobile</option>
                            <option value="mlm">MLM / Ecom</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row g-3" id="projectsGrid">
                        <!-- CRM Demo -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card project-card h-100" data-type="web" tabindex="0">
                                <div class="card-body d-flex flex-column">
                                    <div id="crmCarousel" class="carousel slide mb-3" data-bs-ride="carousel"
                                        style="height:180px;">
                                        <div class="carousel-inner h-100 rounded">

                                            <!-- Slide 1 -->
                                            <div class="carousel-item active h-100">
                                                <img src="/path/to/screenshot1.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="CRM Screenshot 1">
                                            </div>

                                            <!-- Slide 2 -->
                                            <div class="carousel-item h-100">
                                                <img src="/path/to/screenshot2.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="CRM Screenshot 2">
                                            </div>

                                            <!-- Slide 3 -->
                                            <div class="carousel-item h-100">
                                                <img src="/path/to/screenshot3.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="CRM Screenshot 3">
                                            </div>

                                        </div>

                                        <!-- Indicators -->
                                        <div class="carousel-indicators" style="bottom:-20px;">
                                            <button type="button" data-bs-target="#crmCarousel" data-bs-slide-to="0"
                                                class="active"></button>
                                            <button type="button" data-bs-target="#crmCarousel"
                                                data-bs-slide-to="1"></button>
                                            <button type="button" data-bs-target="#crmCarousel"
                                                data-bs-slide-to="2"></button>
                                        </div>

                                        <!-- Controls -->
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#crmCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#crmCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    </div>

                                    <h5 class="card-title">CRM Starter Kit (Mock)</h5>
                                    <p class="text-muted small">Lead capture, pipelines & basic reporting — mock demo for
                                        sales teams.</p>
                                    <div class="mt-auto d-flex gap-2 align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary view-btn"
                                            data-title="CRM Starter Kit"
                                            data-desc="Lead capture, pipeline stages, reminders, CSV exports and basic dashboards.">View</button>
                                        <a href="{{ route('contact.index') }}" class="btn btn-sm btn-primary ms-auto">Get
                                            this setup</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile App Demo -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card project-card h-100" data-type="mobile" tabindex="0">
                                <div class="card-body d-flex flex-column">
                                    {{-- <div class="mb-3 bg-light rounded d-flex align-items-center justify-content-center"
                                        style="height:180px;">
                                        <span class="text-muted">Mobile app mock</span>
                                    </div> --}}
                                    <div id="mappCarousel" class="carousel slide mb-3" data-bs-ride="carousel"
                                        style="height:180px;">
                                        <div class="carousel-inner h-100 rounded">

                                            <!-- Slide 1 -->
                                            <div class="carousel-item active h-100">
                                                <img src="/path/to/screenshot1.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="M-App Screenshot 1">
                                            </div>

                                            <!-- Slide 2 -->
                                            <div class="carousel-item h-100">
                                                <img src="/path/to/screenshot2.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="M-App Screenshot 2">
                                            </div>

                                            <!-- Slide 3 -->
                                            <div class="carousel-item h-100">
                                                <img src="/path/to/screenshot3.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="M-App Screenshot 3">
                                            </div>

                                        </div>

                                        <!-- Indicators -->
                                        <div class="carousel-indicators" style="bottom:-20px;">
                                            <button type="button" data-bs-target="#mappCarousel" data-bs-slide-to="0"
                                                class="active"></button>
                                            <button type="button" data-bs-target="#mappCarousel"
                                                data-bs-slide-to="1"></button>
                                            <button type="button" data-bs-target="#mappCarousel"
                                                data-bs-slide-to="2"></button>
                                        </div>

                                        <!-- Controls -->
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#mappCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#mappCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    </div>
                                    <h5 class="card-title">Mobile App Mock</h5>
                                    <p class="text-muted small">Authentication flows, push notifications & basic user
                                        flows.</p>
                                    <div class="mt-auto d-flex gap-2 align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary view-btn"
                                            data-title="Mobile App Mock"
                                            data-desc="Auth, push notifications, forms and simple backend integration.">View</button>
                                        <a href="{{ route('contact.index') }}"
                                            class="btn btn-sm btn-primary ms-auto">Request Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MLM + Ecom Demo -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card project-card h-100" data-type="mlm" tabindex="0">
                                <div class="card-body d-flex flex-column">
                                    <div id="mlmCarousel" class="carousel slide mb-3" data-bs-ride="carousel"
                                        style="height:180px;">
                                        <div class="carousel-inner h-100 rounded">

                                            <!-- Slide 1 -->
                                            <div class="carousel-item active h-100">
                                                <img src="/path/to/screenshot1.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="MLM Screenshot 1">
                                            </div>

                                            <!-- Slide 2 -->
                                            <div class="carousel-item h-100">
                                                <img src="/path/to/screenshot2.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="MLM Screenshot 2">
                                            </div>

                                            <!-- Slide 3 -->
                                            <div class="carousel-item h-100">
                                                <img src="/path/to/screenshot3.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover" alt="MLM Screenshot 3">
                                            </div>

                                        </div>

                                        <!-- Indicators -->
                                        <div class="carousel-indicators" style="bottom:-20px;">
                                            <button type="button" data-bs-target="#mlmCarousel" data-bs-slide-to="0"
                                                class="active"></button>
                                            <button type="button" data-bs-target="#mlmCarousel"
                                                data-bs-slide-to="1"></button>
                                            <button type="button" data-bs-target="#mlmCarousel"
                                                data-bs-slide-to="2"></button>
                                        </div>

                                        <!-- Controls -->
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#mlmCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#mlmCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    </div>
                                    <h5 class="card-title">MLM + E-commerce Demo</h5>
                                    <p class="text-muted small">Binary plan + reseller store + commission mapping (mock).
                                    </p>
                                    <div class="mt-auto d-flex gap-2 align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary view-btn"
                                            data-title="MLM + E-commerce"
                                            data-desc="Binary tree, auto pairing, order-to-commission mapping and reseller wallets.">View</button>
                                        <a href="{{ route('contact.index') }}"
                                            class="btn btn-sm btn-primary ms-auto">Start Project</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Placeholder -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 border-dashed text-center p-4">
                                <div class="h-100 d-flex flex-column justify-content-center">
                                    <div class="mb-3 text-muted">No projects yet — coming soon</div>
                                    <a href="{{ route('contact.index') }}"
                                        class="btn btn-sm btn-outline-primary mt-2">Reserve a slot</a>
                                </div>
                            </div>
                        </div>

                    </div> {{-- row end --}}
                </div>
            </div>

            <!-- Contact / Quick Enquiry -->
            <div class="row mt-4">
                <div class="col-12 col-md-7">
                    <div class="card p-3">
                        <h3>Tell us about your project</h3>
                        <p class="text-muted small">We’ll scope an MVP and send a clear quote. Use the quick form below or
                            request a custom proposal.</p>

                        <form action="{{ route('enquiry.store') }}" method="POST" class="row g-2" novalidate>
                            @csrf
                            <div class="col-12 col-md-6">
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}"
                                    placeholder="Your name" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <input name="email" type="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <input name="mobile" class="form-control" placeholder="Phone"
                                    value="{{ old('mobile') }}" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <select name="enq_for" class="form-select" required>
                                    <option value="">Select service</option>

                                    <option value="Website Development"
                                        {{ old('enq_for') == 'Website Development' ? 'selected' : '' }}>
                                        Website Development</option>
                                    <option value="Mobile App" {{ old('enq_for') == 'Mobile App' ? 'selected' : '' }}>
                                        Mobile App
                                    </option>
                                    <option value="Custom Software"
                                        {{ old('enq_for') == 'Custom Software' ? 'selected' : '' }}>
                                        Custom Software</option>
                                    <option value="UI/UX Design" {{ old('enq_for') == 'UI/UX Design' ? 'selected' : '' }}>
                                        UI/UX Design</option>
                                    <option value="Hosting & Maintenance"
                                        {{ old('enq_for') == 'Hosting & Maintenance' ? 'selected' : '' }}>
                                        Hosting & Maintenance</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="message" rows="3" class="form-control" placeholder="Brief requirements" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn btn-success" type="submit">Send Enquiry</button>
                            </div>
                        </form>
                    </div>
                </div>

                <aside class="col-12 col-md-5">
                    <div class="card p-3">
                        <h6>Resources</h6>
                        <ul class="list-unstyled small">
                            <li><a class="download-link"
                                    href="{{ asset('guest/assets/docs/NexCodeForge_Pricing_Spec.docx') }}"
                                    download>Download pricing spec</a>
                            </li>
                            <li><a href="{{ route('about') }}">Company overview</a></li>
                            <li><a href="{{ route('contact.index') }}">Talk to sales</a></li>
                        </ul>
                        <hr>
                        <p class="small text-muted mb-0">We can provide detailed proposals, PDF spec sheets and demo logins
                            for selected projects — request when you contact us.</p>
                    </div>
                </aside>
            </div>

        </div> {{-- container end --}}
    </div> {{-- section end --}}

    <!-- Bootstrap-style Modal (works if Bootstrap JS present). Fallback JS included below -->
    <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="projectModalLabel" class="modal-title">Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="projectModalBody">Project details...</div>
                <div class="modal-footer">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary">Request Quote</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Lightweight JS: filter buttons + modal fallback if Bootstrap JS isn't loaded --}}
    <script>
        (function() {
            // --- CONFIG ---
            const HIGH_Z = 2147483646; // extremely high z-index to avoid stacking issues

            // --- Helpers ---
            function removeAllBackdrops() {
                document.querySelectorAll('.modal-backdrop').forEach(n => {
                    try {
                        n.remove();
                    } catch (e) {
                        /* ignore */
                    }
                });
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
            }

            // A tiny mutation observer to catch stray backdrops and remove them quickly.
            // It will auto-disconnect after N ms to avoid continuous observation.
            function observeAndCleanBackdrops(timeout = 2000) {
                const obs = new MutationObserver(() => {
                    const found = document.querySelectorAll('.modal-backdrop');
                    if (found.length) {
                        // remove them and aggressively restore body state
                        found.forEach(n => n.remove());
                        document.body.classList.remove('modal-open');
                        document.body.style.overflow = '';
                    }
                });
                obs.observe(document.body, {
                    childList: true,
                    subtree: true
                });
                setTimeout(() => obs.disconnect(), timeout);
            }

            // Force z-index for modal element (ensures it's above backdrops)
            function ensureModalOnTop(modalEl) {
                if (!modalEl) return;
                modalEl.style.zIndex = HIGH_Z;
                // if bootstrap inserted backdrop after show, remove it shortly after
                setTimeout(removeAllBackdrops, 50);
                // start observer to catch any late-inserted backdrops
                observeAndCleanBackdrops(1200);
            }

            // --- Filter logic (keeps yours but defensively coded) ---
            const filters = Array.from(document.querySelectorAll('.filter'));
            const mobileFilter = document.getElementById('mobileFilter');
            const projectCols = Array.from(document.querySelectorAll('#projectsGrid .col-12'));

            function applyFilter(type) {
                projectCols.forEach(col => {
                    const card = col.querySelector('.project-card');
                    if (!card) {
                        col.style.display = '';
                        return;
                    }
                    const t = card.getAttribute('data-type') || 'all';
                    col.style.display = (type === 'all' || t === type) ? '' : 'none';
                });
                filters.forEach(f => {
                    if (f.getAttribute('data-filter') === type) {
                        f.classList.remove('btn-outline-secondary');
                        f.classList.add('btn-outline-primary', 'active');
                        f.setAttribute('aria-pressed', 'true');
                    } else {
                        f.classList.remove('btn-outline-primary', 'active');
                        f.classList.add('btn-outline-secondary');
                        f.setAttribute('aria-pressed', 'false');
                    }
                });
            }
            filters.forEach(btn => btn.addEventListener('click', () => applyFilter(btn.getAttribute('data-filter'))));
            if (mobileFilter) mobileFilter.addEventListener('change', e => applyFilter(e.target.value));
            try {
                applyFilter('all');
            } catch (e) {
                console.error(e);
            }

            // --- Robust modal show (bootstrap preferred, strong cleanup) ---
            function showModal(title, bodyHtml) {
                // pre-cleanup - remove any stray backdrops before we do anything
                removeAllBackdrops();

                // If developer used data-body-id to reference hidden template content,
                // caller should already pass proper HTML. Here we accept bodyHtml as HTML string.
                try {
                    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                        const modalEl = document.getElementById('projectModal');
                        if (modalEl) {
                            const modalLabel = modalEl.querySelector('#projectModalLabel');
                            const modalBody = modalEl.querySelector('#projectModalBody');
                            if (modalLabel) modalLabel.textContent = title;
                            if (modalBody) modalBody.innerHTML = bodyHtml;

                            // Dispose any existing instance to avoid leftover backdrop or listeners
                            const existing = bootstrap.Modal.getInstance(modalEl);
                            if (existing) {
                                try {
                                    existing.hide();
                                    existing.dispose();
                                } catch (e) {
                                    /* ignore */
                                }
                            }

                            // Ensure modal element sits above any backdrop
                            ensureModalOnTop(modalEl);

                            // Create new instance and show
                            const inst = new bootstrap.Modal(modalEl, {
                                backdrop: true,
                                keyboard: true
                            });
                            modalEl.addEventListener('shown.bs.modal', () => {
                                // Immediately remove any stray backdrops (Bootstrap may create one, remove duplicates)
                                removeAllBackdrops();
                                // Ensure our modal stays on top
                                ensureModalOnTop(modalEl);
                            }, {
                                once: true
                            });

                            // Ensure cleanup after hidden
                            modalEl.addEventListener('hidden.bs.modal', () => {
                                removeAllBackdrops();
                                try {
                                    inst.dispose();
                                } catch (e) {
                                    /* ignore */
                                }
                            }, {
                                once: true
                            });

                            inst.show();
                            return;
                        }
                    }
                } catch (err) {
                    console.warn('Bootstrap path failed; falling back. Error:', err);
                }

                // FALLBACK: create lightweight modal overlay (safe, high z-index)
                fallbackModal(title, bodyHtml);
            }

            function fallbackModal(title, bodyHtml) {
                // remove any earlier overlays
                const existing = document.getElementById('ncf-fb-modal-overlay');
                if (existing) existing.remove();

                const overlay = document.createElement('div');
                overlay.id = 'ncf-fb-modal-overlay';
                Object.assign(overlay.style, {
                    position: 'fixed',
                    left: '0',
                    top: '0',
                    width: '100%',
                    height: '100%',
                    background: 'rgba(0,0,0,0.6)',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    zIndex: HIGH_Z,
                    padding: '20px',
                    boxSizing: 'border-box'
                });

                const box = document.createElement('div');
                box.setAttribute('role', 'dialog');
                box.setAttribute('aria-modal', 'true');
                Object.assign(box.style, {
                    background: '#fff',
                    padding: '20px',
                    borderRadius: '8px',
                    maxWidth: '960px',
                    width: '100%',
                    maxHeight: 'calc(100vh - 80px)',
                    overflowY: 'auto',
                    boxSizing: 'border-box',
                    outline: 'none'
                });

                const h = document.createElement('h3');
                h.textContent = title;
                h.style.margin = '0 0 10px 0';
                const body = document.createElement('div');
                body.innerHTML = bodyHtml;
                body.style.marginTop = '6px';
                const footer = document.createElement('div');
                footer.style.textAlign = 'right';
                footer.style.marginTop = '12px';
                const closeBtn = document.createElement('button');
                closeBtn.className = 'btn btn-sm btn-primary';
                closeBtn.textContent = 'Close';
                footer.appendChild(closeBtn);

                box.appendChild(h);
                box.appendChild(body);
                box.appendChild(footer);
                overlay.appendChild(box);
                document.body.appendChild(overlay);

                const prevOverflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
                box.setAttribute('tabindex', '-1');
                box.focus();

                function cleanup() {
                    document.body.style.overflow = prevOverflow || '';
                    overlay.remove();
                    document.removeEventListener('keydown', onKey);
                }

                function onKey(e) {
                    if (e.key === 'Escape') cleanup();
                }
                overlay.addEventListener('click', (evt) => {
                    if (evt.target === overlay) cleanup();
                });
                closeBtn.addEventListener('click', cleanup);
                document.addEventListener('keydown', onKey);
            }

            // --- Event delegation for view buttons (works for dynamic buttons) ---
            document.addEventListener('click', function(e) {
                const btn = e.target.closest && e.target.closest('.view-btn');
                if (!btn) return;
                e.preventDefault && e.preventDefault();

                const title = btn.getAttribute('data-title') || 'Project';
                const bodyId = btn.getAttribute('data-body-id');
                const desc = btn.getAttribute('data-desc') || '';

                // If data-body-id is provided, use that DOM content (safer for HTML)
                if (bodyId) {
                    const tpl = document.getElementById(bodyId);
                    if (tpl) {
                        showModal(title, tpl.innerHTML);
                        return;
                    }
                }

                showModal(title, desc);
            });

            // --- Developer utility: expose cleanup function for console testing ---
            window.NCF = window.NCF || {};
            window.NCF.removeAllBackdrops = removeAllBackdrops;
            window.NCF.observeAndCleanBackdrops = observeAndCleanBackdrops;

            // Optionally run one-time cleanup on load (remove leftover backdrops)
            try {
                removeAllBackdrops();
            } catch (e) {
                /* ignore */
            }

        })();
    </script>


@endsection
