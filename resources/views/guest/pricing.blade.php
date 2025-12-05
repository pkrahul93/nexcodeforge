@extends('layouts.guest')
@section('title', 'Pricing | NexCodeForge')
@section('meta_description',
    'Discover NexCodeForge’s affordable pricing plans for web and app development solutions.
    Choose the plan that fits your budget and needs.')

    {{-- Bootstrap Icons CDN (used for icons) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Visual polish */
        .plan-card {
            transition: transform .18s ease, box-shadow .18s ease;
            border: 1px solid rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .plan-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .plan-icon {
            width: 56px;
            height: 56px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.08), rgba(13, 110, 253, 0.03));
            color: #0d6efd;
            font-size: 1.4rem;
            margin-bottom: .6rem;
        }

        .plan-card .card-body h5 {
            margin-top: .25rem;
            margin-bottom: .5rem;
        }

        .price-display .price-range {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .price-display small {
            color: #6c757d;
        }

        .badge-feature {
            display: inline-block;
            margin: .18rem .18rem .18rem 0;
            padding: .22rem .45rem;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.04);
            font-size: .78rem;
        }

        .recommended {
            border-color: #0d6efd !important;
        }

        .recommended .plan-icon {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.16), rgba(13, 110, 253, 0.06));
            color: #0d6efd;
        }

        /* subtle plan ribbon */
        .ribbon {
            position: absolute;
            left: -48px;
            top: 12px;
            background: #0d6efd;
            color: #fff;
            transform: rotate(-45deg);
            padding: 6px 64px;
            font-size: .75rem;
            box-shadow: 0 6px 12px rgba(13, 110, 253, 0.08);
        }

        /* responsive tweaks */
        @media (max-width:767px) {
            .plan-icon {
                width: 46px;
                height: 46px;
                font-size: 1.1rem;
            }
        }

        /* CTA button style */
        .prt-btn-color-gradiant {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            border: none;
            color: #fff;
        }
    </style>

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
                                <h2 class="title">Pricing</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Pricing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <div class="section section-pricing py-5">
        <div class="container">

            {{-- Intro --}}
            <div class="row mb-4 align-items-center">
                <div class="col-md-8">
                    <h2 class="mb-2">Affordable plans </h2>
                    <p class="mb-0">Choose a plan based on your needs — we offer starter to enterprise pricing and custom
                        quotes for complex projects.</p>
                </div>

                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('contact.index') }}" class="btn btn-outline-primary">Request Custom Quote</a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Website Development --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h4 class="mb-3">Website Development</h4>
                </div>

                {{-- Starter --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-file-earmark-code"></i></div>
                            <h5 class="card-title">Starter Website (Basic)</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 7,999 – 12,999</div>
                                <small class="text-muted d-block">one-time</small>
                            </div>

                            <ul class="list-unstyled mt-3 mb-0 text-start">
                                <li>4–5 pages</li>
                                <li>Mobile responsive</li>
                                <li>Basic UI & contact form</li>
                                <li>Deployment & 1 month support</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}"
                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant">Get
                                Started</a>
                        </div>
                    </div>
                </div>

                {{-- Business (Recommended) --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-primary plan-card recommended position-relative">
                        <div class="ribbon">Popular</div>
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-briefcase-fill"></i></div>
                            <h5 class="card-title">Business Website (Standard)</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 14,999 – 24,999</div>
                                <small class="text-muted d-block">one-time</small>
                            </div>

                            <ul class="list-unstyled mt-3 mb-0 text-start">
                                <li>6–10 pages</li>
                                <li>Professional UI/UX</li>
                                <li>WhatsApp & enquiry forms</li>
                                <li>Speed optimization & basic SEO</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}"
                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant">Request
                                Quote</a>
                        </div>
                    </div>
                </div>

                {{-- Premium --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-building"></i></div>
                            <h5 class="card-title">Premium Corporate Website</h5>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 29,999 – 49,999</div>
                                <small class="text-muted d-block">one-time</small>
                            </div>

                            <ul class="list-unstyled mt-3 mb-0 text-start">
                                <li>Custom UI/UX & animations</li>
                                <li>Dashboard & API integrations</li>
                                <li>On-page SEO, Blog module</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}"
                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant">Talk
                                to Sales</a>
                        </div>
                    </div>
                </div>

                {{-- E-Commerce --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-cart-fill"></i></div>
                            <h5 class="card-title">E-Commerce Website</h5>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 24,999 – 59,999</div>
                                <small class="text-muted d-block">one-time</small>
                            </div>

                            <ul class="list-unstyled mt-3 mb-0 text-start">
                                <li>Product listing & filters</li>
                                <li>Cart + Checkout, Payment integration</li>
                                <li>Admin panel, Coupons & Analytics</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}"
                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant">Start
                                E-commerce</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mobile App Development --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h4 class="mb-3">Mobile App Development</h4>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-phone"></i></div>
                            <h5>Basic App (Android Only)</h5>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 24,999 – 49,999</div>
                                <small class="text-muted d-block">one-time</small>
                            </div>
                            <ul class="mb-0 text-start">
                                <li>5–6 screens</li>
                                <li>Simple functionality</li>
                                <li>Firebase backend</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}"
                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant">Enquire</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-primary plan-card recommended position-relative">
                        <div class="ribbon">Recommended</div>
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-phone-fill"></i></div>
                            <h5>Standard App (Android + iOS)</h5>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 49,999 – 99,999</div>
                                <small class="text-muted d-block">one-time</small>
                            </div>
                            <ul class="mb-0 text-start">
                                <li>Authentication, Push notifications</li>
                                <li>Forms, lists, filters & API integration</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}"
                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant">Get
                                Quote</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-layers-half"></i></div>
                            <h5>Advanced Application</h5>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 1,20,000 – 3,50,000+</div>
                                <small class="text-muted d-block">starting</small>
                            </div>
                            <ul class="mb-0 text-start">
                                <li>Multiple modules, Custom backend</li>
                                <li>Admin panel, Payment gateway & Cloud hosting</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}"
                                class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-gradiant">Discuss
                                Project</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============================
   Custom Software + MLM Section
   Replace the prior "Custom Software" block with this
   ============================ --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h4 class="mb-3">Custom Software (CRM / ERP / LMS)</h4>
                    <p class="text-muted">Tailored platforms for sales, operations and learning. Choose a base package and
                        add modules as needed (integrations, reporting, multi-branch, ecommerce).</p>
                </div>

                {{-- CRM --}}
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-people-fill"></i></div>
                            <h5 class="card-title">CRM</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 40,000 – 1,50,000</div>
                                <small class="text-muted d-block">project / customizable</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Lead & pipeline management</li>
                                <li>Contact & account management</li>
                                <li>Activity tracking, reminders & tasks</li>
                                <li>Basic dashboards & CSV export</li>
                            </ul>

                            <p>
                                <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#crmDetails"
                                    role="button" aria-expanded="false" aria-controls="crmDetails">
                                    View full features
                                </a>
                            </p>

                            <div class="collapse" id="crmDetails">
                                <div class="mt-3 text-start small">
                                    <strong>Optional modules:</strong>
                                    <ul>
                                        <li>Advanced reporting & BI dashboards</li>
                                        <li>Role-based permissions & audit logs</li>
                                        <li>WhatsApp & email automation</li>
                                        <li>Mobile app (Android/iOS) for agents</li>
                                    </ul>
                                    <div class="text-muted">Delivery: 2–6 weeks depending on modules.</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Request CRM Quote</a>
                        </div>
                    </div>
                </div>

                {{-- ERP --}}
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-box-seam"></i></div>
                            <h5 class="card-title">ERP (Inventory / Finance / HR)</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 1,50,000 – 6,00,000+</div>
                                <small class="text-muted d-block">project</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Inventory, Purchase & Sales</li>
                                <li>Accounting & invoicing</li>
                                <li>Payroll & HR basics</li>
                                <li>Multi-branch & role-based access</li>
                            </ul>

                            <p>
                                <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#erpDetails"
                                    role="button" aria-expanded="false" aria-controls="erpDetails">
                                    View full features
                                </a>
                            </p>

                            <div class="collapse" id="erpDetails">
                                <div class="mt-3 text-start small">
                                    <strong>Optional modules:</strong>
                                    <ul>
                                        <li>Multi-currency & GST-ready invoicing</li>
                                        <li>Advanced inventory forecasting</li>
                                        <li>Third-party API integrations (courier, payment gateways)</li>
                                        <li>Role-based dashboards & scheduled reports</li>
                                    </ul>
                                    <div class="text-muted">Delivery: 6–16+ weeks depending on complexity.</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Discuss ERP</a>
                        </div>
                    </div>
                </div>

                {{-- LMS --}}
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-mortarboard-fill"></i></div>
                            <h5 class="card-title">LMS (Learning Management)</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 60,000 – 2,50,000</div>
                                <small class="text-muted d-block">project</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Course + lesson manager</li>
                                <li>Video hosting, quizzes & certificates</li>
                                <li>Student progress & basic analytics</li>
                            </ul>

                            <p>
                                <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#lmsDetails"
                                    role="button" aria-expanded="false" aria-controls="lmsDetails">
                                    View full features
                                </a>
                            </p>

                            <div class="collapse" id="lmsDetails">
                                <div class="mt-3 text-start small">
                                    <strong>Optional modules:</strong>
                                    <ul>
                                        <li>Live classes (WebRTC/Zoom integration)</li>
                                        <li>Advanced analytics & cohort reporting</li>
                                        <li>Subscriptions, coupons & single sign-on (SSO)</li>
                                    </ul>
                                    <div class="text-muted">Delivery: 3–10 weeks depending on modules.</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Request LMS Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============================
   NEW: MLM Software section
   ============================ --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h4 class="mb-3">MLM Software (Multi-Level Marketing Solutions)</h4>
                    <p class="text-muted">We build secure MLM platforms with payout calculations, genealogy trees,
                        commission reports, KYC flows and optional ecommerce/reseller modules. Pick a plan type below — each
                        can be extended for resellers, white-labeling, wallets and multi-currency support.</p>
                </div>

                {{-- Single / Direct Level --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-people"></i></div>
                            <h6 class="card-title">Single / Direct Level Plan</h6>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 50,000 – 1,20,000</div>
                                <small class="text-muted d-block">project</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Single upline per user</li>
                                <li>Direct commission calculation</li>
                                <li>Referrals & simple payout reports</li>
                            </ul>

                            <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#mlmDirect"
                                role="button" aria-expanded="false" aria-controls="mlmDirect">More</a>

                            <div class="collapse mt-2" id="mlmDirect">
                                <div class="small text-start">
                                    <strong>Included:</strong>
                                    <ul>
                                        <li>Member registration, KYC checks</li>
                                        <li>Direct commission & manual payouts</li>
                                        <li>CSV export & basic ledger</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Request MLM Quote</a>
                        </div>
                    </div>
                </div>

                {{-- Binary --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-diagram-3"></i></div>
                            <h6 class="card-title">Binary Level Plan</h6>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 75,000 – 2,50,000</div>
                                <small class="text-muted d-block">project</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Left/Right leg balancing</li>
                                <li>Auto carry-forward & pair matching</li>
                                <li>Multiple commission types (pair, override)</li>
                            </ul>

                            <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#mlmBinary"
                                role="button" aria-expanded="false" aria-controls="mlmBinary">More</a>

                            <div class="collapse mt-2" id="mlmBinary">
                                <div class="small text-start">
                                    <strong>Included:</strong>
                                    <ul>
                                        <li>Genealogy visualizer</li>
                                        <li>Daily/weekly payout cycles</li>
                                        <li>Binary caps, carry-forward rules</li>
                                        <li>Admin override for adjustments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Request MLM Quote</a>
                        </div>
                    </div>
                </div>

                {{-- Matrix --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-grid-3x3-gap-fill"></i></div>
                            <h6 class="card-title">Matrix Level Plan</h6>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 1,00,000 – 2,80,000</div>
                                <small class="text-muted d-block">project</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Fixed-width matrix (2xN, 3xN)</li>
                                <li>Auto-fill & spillover rules</li>
                                <li>Matrix commission & level bonuses</li>
                            </ul>

                            <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#mlmMatrix"
                                role="button" aria-expanded="false" aria-controls="mlmMatrix">More</a>

                            <div class="collapse mt-2" id="mlmMatrix">
                                <div class="small text-start">
                                    <strong>Included:</strong>
                                    <ul>
                                        <li>Configurable matrix size (e.g., 3x7)</li>
                                        <li>Auto-tracking for spillover commissions</li>
                                        <li>Reports: level income, matrix fill-statistics</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Request MLM Quote</a>
                        </div>
                    </div>
                </div>

                {{-- Binary + E-commerce / Reseller --}}
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 plan-card border-primary recommended">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-basket3-fill"></i></div>
                            <h6 class="card-title">Binary + E-commerce / Reseller</h6>
                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 1,25,000 – 3,50,000+</div>
                                <small class="text-muted d-block">project (depends on product catalog &
                                    integrations)</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Binary MLM core + built-in e-store</li>
                                <li>Auto-order commissions & reseller pricing</li>
                                <li>Inventory & order sync, payment gateway</li>
                            </ul>

                            <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#mlmEcom"
                                role="button" aria-expanded="false" aria-controls="mlmEcom">More</a>

                            <div class="collapse mt-2" id="mlmEcom">
                                <div class="small text-start">
                                    <strong>Included:</strong>
                                    <ul>
                                        <li>Product catalog, SKUs, stock management</li>
                                        <li>Orders mapped to member commissions</li>
                                        <li>Cart, taxes, shipping rules & multiple PGs</li>
                                        <li>Reseller wallets, cashback & return handling</li>
                                    </ul>
                                    <div class="text-muted">Delivery: 8–20+ weeks depending on catalog size and third-party
                                        integrations.</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Request MLM Quote</a>
                        </div>
                    </div>
                </div>

                {{-- Common MLM notes --}}
                <div class="col-12 mt-3">
                    <div class="alert alert-light small">
                        <strong>Notes:</strong>
                        <ul class="mb-0">
                            <li>All MLM plans include admin dashboard, user management, payout & ledger exports.</li>
                            <li>Integration add-ons (SMS / Email / KYC / Payment gateways) are priced separately.</li>
                            <li>We provide code review, basic security hardening, and deployment on your server or our
                                managed hosting.</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ============================
   Expanded UI / UX Design Section
   Replace your existing UI/UX block with this
   ============================ --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h4 class="mb-3">UI / UX Design — Detailed Services & Deliverables</h4>
                    <p class="text-muted">Design services focused on conversion, usability and brand coherence. We provide
                        research-driven design, rapid prototyping and developer-ready handoffs.</p>
                </div>

                {{-- Landing Page Design --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-layout-wtf"></i></div>
                            <h5 class="card-title">Landing Page Design</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 3,999 – 6,999</div>
                                <small class="text-muted d-block">per landing</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Quick user research & competitor review</li>
                                <li>Wireframe → High-fidelity prototype</li>
                                <li>CTA optimization & microcopy suggestions</li>
                            </ul>

                            <p>
                                <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#lpDetails"
                                    aria-expanded="false">Details & deliverables</a>
                            </p>

                            <div class="collapse mt-2" id="lpDetails">
                                <div class="small text-start">
                                    <strong>Deliverables:</strong>
                                    <ul>
                                        <li>1 clickable Figma/Adobe XD prototype</li>
                                        <li>2 rounds of revisions</li>
                                        <li>Exportable assets + style notes for dev</li>
                                    </ul>
                                    <div class="text-muted">Timeline: 3–7 days</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Website UI Kit --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-palette"></i></div>
                            <h5 class="card-title">Website UI Kit / Design System</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 9,999 – 18,999</div>
                                <small class="text-muted d-block">kit</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Design tokens (colors, spacing, typography)</li>
                                <li>Reusable components & patterns</li>
                                <li>Accessibility & responsive guidelines</li>
                            </ul>

                            <p>
                                <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#uiKitDetails"
                                    aria-expanded="false">What you get</a>
                            </p>

                            <div class="collapse mt-2" id="uiKitDetails">
                                <div class="small text-start">
                                    <strong>Deliverables:</strong>
                                    <ul>
                                        <li>Figma/Sketch library with components</li>
                                        <li>Component documentation + usage examples</li>
                                        <li>Token file (CSS variables / JSON) for dev handoff</li>
                                    </ul>
                                    <div class="text-muted">Timeline: 1–3 weeks depending on components</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Mobile App UI --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-phone"></i></div>
                            <h5 class="card-title">Mobile App UI (10–20 screens)</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 14,999 – 34,999</div>
                                <small class="text-muted d-block">per app</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>User flows & interactive prototypes</li>
                                <li>Platform-specific patterns (Android & iOS)</li>
                                <li>Handoff-ready screens and assets</li>
                            </ul>

                            <p>
                                <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse"
                                    href="#mobileUIDetails" aria-expanded="false">Prototype & handoff</a>
                            </p>

                            <div class="collapse mt-2" id="mobileUIDetails">
                                <div class="small text-start">
                                    <strong>Deliverables:</strong>
                                    <ul>
                                        <li>Flow diagrams + clickable prototype</li>
                                        <li>Production-ready assets (SVGs, icons, export settings)</li>
                                        <li>Design spec for developers (spacing, tokens, behavior)</li>
                                    </ul>
                                    <div class="text-muted">Timeline: 2–4 weeks</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Research & Testing / UX Audit --}}
                <div class="col-12">
                    <div class="card mb-3 plan-card">
                        <div class="card-body">
                            <h6>UX Research & Audit (Optional)</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small"><strong>What we do:</strong> Heuristic audit, analytics review, user
                                        interviews, conversion funnel analysis and prioritized recommendations.</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small"><strong>Deliverables:</strong> Audit report, prioritized fixes,
                                        wireframe sketches, A/B test suggestions.</p>
                                    <p class="small"><strong>Price:</strong> ₹7,999 – ₹29,999. Timeline: 1–2 weeks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Add-ons / Accessibility / Usability Testing --}}
                <div class="col-12">
                    <div class="alert alert-light small">
                        <strong>Add-ons & optional services:</strong>
                        <ul class="mb-0">
                            <li>Usability testing (3–8 users) — ₹9,999+</li>
                            <li>Accessibility audit & remediation (WCAG) — ₹12,999+</li>
                            <li>Brand identity & iconography — ₹4,999 – ₹19,999</li>
                            <li>Ongoing Design Retainer (monthly) — custom pricing</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ============================
   Expanded Hosting & Maintenance Section
   Replace your existing Hosting & Maintenance block with this
   ============================ --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h4 class="mb-3">Hosting & Maintenance — Plans, SLAs & Add-ons</h4>
                    <p class="text-muted">Managed hosting and maintenance plans to keep sites and apps secure, fast and
                        updated. Choose the level that fits your traffic and uptime expectations.</p>
                </div>

                {{-- Basic Maintenance --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-shield-check"></i></div>
                            <h5 class="card-title">Basic Maintenance</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 999 / month</div>
                                <small class="text-muted d-block">monthly</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Weekly backups</li>
                                <li>Security & plugin updates (monthly)</li>
                                <li>Minor bug fixes (limited hrs)</li>
                            </ul>

                            <p class="small text-muted">Recommended for small brochure sites and low-traffic blogs.</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-primary">Choose Basic</a>
                        </div>
                    </div>
                </div>

                {{-- Advanced Maintenance --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-speedometer2"></i></div>
                            <h5 class="card-title">Advanced Maintenance</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 2,999 / month</div>
                                <small class="text-muted d-block">monthly</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Daily backups + 30-day retention</li>
                                <li>Performance tuning & cache config</li>
                                <li>Security monitoring & malware scan</li>
                                <li>1–2 hours support per month</li>
                            </ul>

                            <p class="small text-muted">Recommended for small e-commerce and SaaS MVPs.</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-primary">Choose Advanced</a>
                        </div>
                    </div>
                </div>

                {{-- Premium Maintenance --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 plan-card">
                        <div class="card-body text-center">
                            <div class="plan-icon mx-auto"><i class="bi bi-cloud-arrow-up"></i></div>
                            <h5 class="card-title">Premium Maintenance</h5>

                            <div class="price-display my-2">
                                <div class="price-range">&#8377; 6,999 / month</div>
                                <small class="text-muted d-block">monthly</small>
                            </div>

                            <ul class="text-start mb-2">
                                <li>Uptime monitoring + 99.9% target SLA</li>
                                <li>Managed server + security hardening</li>
                                <li>Priority support & emergency response</li>
                                <li>Performance reports & optimisation</li>
                            </ul>

                            <p class="small text-muted">Recommended for enterprise websites, high-traffic e-commerce &
                                mission-critical apps.</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-primary">Choose Premium</a>
                        </div>
                    </div>
                </div>

                {{-- Hosting Add-ons --}}
                <div class="col-12 mt-3">
                    <div class="card plan-card">
                        <div class="card-body">
                            <h6>Hosting & Add-ons</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="small"><strong>Managed Cloud Setup:</strong> ₹4,999 – ₹14,999 (one-time).
                                        Includes server provisioning, firewall, basic autoscaling config.</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="small"><strong>CDN Integration:</strong> ₹999 – ₹3,499 / month depending on
                                        bandwidth. Recommended for global reach.</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="small"><strong>Disaster Recovery:</strong> ₹9,999+ (one-time + monthly
                                        replication costs). Offsite backups & restore drills.</p>
                                </div>
                            </div>

                            <hr />

                            <div class="small">
                                <strong>Support & SLAs:</strong>
                                <ul>
                                    <li>Basic: Email support (48–72 hrs response)</li>
                                    <li>Advanced: Business hours support (24 hrs response)</li>
                                    <li>Premium: 24x7 priority support (SLA-based, optionally with dedicated engineer)</li>
                                </ul>
                                <strong>Onboarding:</strong> New clients receive a one-time onboarding session and baseline
                                security & performance audit (₹2,499 included for first month on annual plans).
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick recommendation --}}
                <div class="col-12 mt-3">
                    <div class="alert alert-info small mb-0">
                        <strong>Recommendation:</strong> Start with Advanced for growing stores/MVPs, upgrade to Premium
                        when you need faster response times, guaranteed SLAs and active performance management. We can
                        provide a custom quote after a free server & app audit.
                    </div>
                </div>
            </div>

            {{-- Add-Ons --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h4 class="mb-3">Add-Ons</h4>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card p-3 h-100 plan-card">
                        <div class="d-flex align-items-center">
                            <div class="me-3 plan-icon"><i class="bi bi-globe"></i></div>
                            <div>
                                <strong>Domain (.com)</strong>
                                <div class="text-muted">₹799 – ₹999 / year</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card p-3 h-100 plan-card">
                        <div class="d-flex align-items-center">
                            <div class="me-3 plan-icon"><i class="bi bi-hdd-network"></i></div>
                            <div>
                                <strong>Hosting</strong>
                                <div class="text-muted">₹1,500 – ₹6,000 / year</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card p-3 h-100 plan-card">
                        <div class="d-flex align-items-center">
                            <div class="me-3 plan-icon"><i class="bi bi-search"></i></div>
                            <div>
                                <strong>SEO Basic</strong>
                                <div class="text-muted">₹4,999 / month</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card p-3 h-100 plan-card">
                        <div class="d-flex align-items-center">
                            <div class="me-3 plan-icon"><i class="bi bi-credit-card-2-front"></i></div>
                            <div>
                                <strong>Payment Gateway Setup</strong>
                                <div class="text-muted">₹1,499 – ₹2,999</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card p-3 h-100 plan-card">
                        <div class="d-flex align-items-center">
                            <div class="me-3 plan-icon"><i class="bi bi-envelope-at"></i></div>
                            <div>
                                <strong>Business Email</strong>
                                <div class="text-muted">₹199 / month / user</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card p-3 h-100 plan-card">
                        <div class="d-flex align-items-center">
                            <div class="me-3 plan-icon"><i class="bi bi-palette"></i></div>
                            <div>
                                <strong>Logo Design</strong>
                                <div class="text-muted">₹1,499 – ₹4,999</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Note and CTA --}}
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="alert alert-info">
                        <strong>Note:</strong>
                        Prices depend on features, design quality & delivery time. EMI options available for large projects.
                        Standard payment terms: <strong>50% advance | 50% on delivery</strong>.
                    </div>
                    <a href="{{ route('contact.index') }}" class="btn btn-lg prt-btn-color-gradiant">Request Custom
                        Quote</a>
                </div>
            </div>

            {{-- Quick contact form (small) --}}
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card p-3">
                        <h5 class="mb-3">Quick Enquiry</h5>

                        <form action="{{ route('enquiry.store') }}" method="POST">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control" placeholder="Your name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" value="{{ old('mobile') }}"
                                        class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="col-md-6">
                                    <select name="enq_for" class="form-select form-select-lg" required>
                                        <option value="">Select service</option>

                                        <option value="Website Development" {{ old('enq_for') == 'Website Development' ? 'selected' : '' }}>
                                            Website Development</option>
                                        <option value="Mobile App" {{ old('enq_for') == 'Mobile App' ? 'selected' : '' }}>Mobile App
                                        </option>
                                        <option value="Custom Software" {{ old('enq_for') == 'Custom Software' ? 'selected' : '' }}>
                                            Custom Software</option>
                                        <option value="UI/UX Design" {{ old('enq_for') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                        <option value="Hosting & Maintenance" {{ old('enq_for') == 'Hosting & Maintenance' ? 'selected' : '' }}>
                                            Hosting & Maintenance</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" rows="3" class="form-control" placeholder="Brief requirements" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success">Send Enquiry</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div> {{-- container end --}}
    </div> {{-- section end --}}
@endsection
