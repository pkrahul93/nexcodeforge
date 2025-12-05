@extends('layouts.guest')
@section('title', 'FAQ | NexCodeForge')
@section('meta_description',
    'Frequently Asked Questions about NexCodeForge — answers to common queries about our
    services, policies, and support.')

    {{-- small styles for better mobile spacing (optional) --}}
    <style>
        @media (max-width: 575.98px) {
            .accordion-button {
                padding: 0.75rem 1rem;
            }

            .accordion-body {
                font-size: 0.95rem;
            }
        }

        .faq-tag.active {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }
    </style>

    @php
        $sampleAuditPath = '/mnt/data/site-audit-2025-11-23.docx'; // replace with Storage::url(...) in production if needed

        // FAQ items: each item = ['q'=>question, 'a'=>answer (HTML allowed), 'icon'=>'bi-class', 'tags'=>['tag1','tag2']]
        $faqs = [
            [
                'q' => 'How do I contact support?',
                'a' =>
                    'You can reach us via the <a href="' .
                    route('contact.index') .
                    '">Contact</a> page, email at <a href="mailto:support@nexcodeforge.com">support@nexcodeforge.com</a>, or call <strong>+91 76691 66975</strong> (Mon–Fri 10:00–18:00). For faster help, include your domain and a short summary of the issue.',
                'icon' => 'bi-phone',
                'tags' => ['support', 'contact'],
            ],
            [
                'q' => 'What payment methods are accepted?',
                'a' =>
                    'We accept UPI, net banking, credit/debit cards, and bank transfers. For large projects we use milestone payments — payment schedule is included in the quotation.',
                'icon' => 'bi-credit-card',
                'tags' => ['payment', 'billing'],
            ],
            [
                'q' => 'Can I request a refund?',
                'a' =>
                    'Refunds follow our <a href="' .
                    route('refund-policy') .
                    '">Refund Policy</a>. Generally work already delivered or customised assets may be non-refundable or partially refundable. Contact support for case-specific resolution.',
                'icon' => 'bi-arrow-counterclockwise',
                'tags' => ['billing', 'policy'],
            ],
            [
                'q' => 'How is my data protected?',
                'a' =>
                    'We follow standard security practices (HTTPS, strong passwords, role based access). See the <a href="' .
                    route('privacy-policy') .
                    '">Privacy Policy</a> for details on data retention, encryption and access controls.',
                'icon' => 'bi-shield-lock',
                'tags' => ['security', 'privacy'],
            ],
            [
                'q' => 'How long will my website or app take to build?',
                'a' =>
                    '<ul><li><strong>Landing page:</strong> 1–2 weeks</li><li><strong>Business website (5–10 pages):</strong> 2–4 weeks</li><li><strong>Custom web app:</strong> 4+ weeks</li><li><strong>Mobile app (iOS/Android):</strong> 6+ weeks</li></ul>Timeline depends on features, feedback cycles and integrations.',
                'icon' => 'bi-clock',
                'tags' => ['timelines', 'delivery'],
            ],
            [
                'q' => 'Do you provide post-launch support?',
                'a' =>
                    'Yes — we offer maintenance & hosting packages (security updates, backups, small enhancements). Custom SLAs available on request.',
                'icon' => 'bi-gear',
                'tags' => ['support', 'hosting'],
            ],
            [
                'q' => 'What information do you need to start?',
                'a' =>
                    '<ol><li>Project goals & audience</li><li>Feature list / pages</li><li>Brand assets (logo, colors)</li><li>Preferred launch date & budget</li></ol>',
                'icon' => 'bi-file-earmark-text',
                'tags' => ['onboarding', 'requirements'],
            ],
            [
                'q' => 'Can I get a sample audit report?',
                'a' => 'Yes — download a sample audit report below to see the format and recommendations we provide.',
                'icon' => 'bi-download',
                'tags' => ['audit', 'samples'],
            ],
            [
                'q' => 'What does the free audit check?',
                'a' =>
                    'The free audit scans technical SEO, page title/meta, H1/H2 usage, images missing alt text, basic SSL checks, robots/sitemap, security headers, and provides actionable recommendations. For deeper performance metrics we can run PageSpeed/Lighthouse on request.',
                'icon' => 'bi-search',
                'tags' => ['audit', 'seo'],
            ],
            [
                'q' => 'Will you sign an NDA?',
                'a' =>
                    'Yes — for commercial projects we can sign a mutual NDA before work begins. Mention it when requesting a quote and we will prepare the document.',
                'icon' => 'bi-file-lock',
                'tags' => ['legal', 'nda'],
            ],
            [
                'q' => 'Do you host websites?',
                'a' =>
                    'We provide hosting & maintenance packages (servers, backups, SSL renewal). We can also deploy to your cloud provider (AWS/GCP/DigitalOcean).',
                'icon' => 'bi-cloud',
                'tags' => ['hosting', 'deployment'],
            ],
            [
                'q' => 'How are project milestones and payments structured?',
                'a' =>
                    'Projects typically use milestone payments: 30% advance, 40% on mid-deliverables, 30% on final delivery. Exact split will be shown in the quotation.',
                'icon' => 'bi-wallet2',
                'tags' => ['billing', 'payments'],
            ],
            [
                'q' => 'Can you integrate with third-party APIs?',
                'a' =>
                    'Yes — we integrate payment gateways, CRMs, analytics, maps and other APIs. Provide API docs and access during scoping to estimate integration effort.',
                'icon' => 'bi-plug',
                'tags' => ['integration', 'api'],
            ],
            [
                'q' => 'Do you migrate an existing website or data?',
                'a' =>
                    'Yes — we can migrate content, users and media from common CMS platforms. Migration complexity and time depends on source system and data volume.',
                'icon' => 'bi-arrow-repeat',
                'tags' => ['migration', 'data'],
            ],
            [
                'q' => 'What technologies do you use?',
                'a' =>
                    'We primarily use Laravel (PHP) for backend, Vue/React for frontend when needed, and standard mobile stacks (React Native / Flutter) for cross-platform apps. We choose tech per project needs.',
                'icon' => 'bi-code-slash',
                'tags' => ['tech', 'stack'],
            ],
            [
                'q' => 'How do you handle bug fixes after delivery?',
                'a' =>
                    'During the warranty window we fix bugs reported free of charge. After that fixes are handled via a maintenance plan or hourly rates which we outline in the proposal.',
                'icon' => 'bi-bug',
                'tags' => ['support', 'warranty'],
            ],
        ];
    @endphp

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
                                <h2 class="title">FAQ</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">FAQ</span>
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
            <div class="col-lg-8 mb-3">

                <div class="shadow-lg p-4 bg-white rounded">

                    {{-- Header --}}
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center mb-3">
                        <div>
                            <h1 class="h2 fw-bold mb-1">Frequently Asked Questions</h1>
                            <p class="mb-0 text-muted text-center">Answers to common questions — still stuck? <a
                                    href="{{ route('contact.index') }}">Contact us</a>.</p>
                        </div>
                    </div>

                    {{-- Accordion --}}
                    <div class="accordion" id="faqAccordion">
                        @foreach ($faqs as $i => $f)
                            @php
                                $idx = $i + 1;
                                $collapseId = "faqCollapse{$idx}";
                                $headingId = "faqHeading{$idx}";
                            @endphp

                            <div class="accordion-item" data-tags="{{ implode(' ', $f['tags']) }}">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $collapseId }}" aria-expanded="false"
                                        aria-controls="{{ $collapseId }}">
                                        <span class="me-3 text-primary" style="width:28px;display:inline-block">
                                            <i class="{{ $f['icon'] }} fs-5"></i>
                                        </span>
                                        <strong class="me-2">{{ $f['q'] }}</strong>
                                        {{-- <small class="text-muted ms-auto d-none d-md-inline">FAQ
                                            #{{ str_pad($idx, 2, '0', STR_PAD_LEFT) }}</small> --}}
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $headingId }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {!! $f['a'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
                        <p class="small text-muted mb-2 mb-md-0">Last updated:
                            {{ \Carbon\Carbon::now()->format('F j, Y') }}.</p>
                        <div>
                            <a href="{{ route('contact.index') }}" class="btn btn-sm btn-outline-secondary me-2">Contact
                                Support</a>
                            <a href="{{ route('audit.show') }}" class="btn btn-sm btn-primary">Run an Audit</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Quick Check</h4>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" id="faqSearch" placeholder="Search FAQs (e.g., audit, hosting, payments)...">
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Checklist to help you get started.</p>
                        <a href="{{ route('about') }}" class="btn btn-primary">Get Started</a>

                        <hr>

                        <p class="card-text">Get Free Audit Report Now In Just 2 Minutes.</p>
                        <a href="{{ route('audit.show') }}" class="btn btn-primary me-2"><i
                                class="bi bi-rocket me-1"></i>Get Free Audit</a>

                        <hr>

                        <p class="card-text">Download Sample Audit Report Now.</p>
                        <a href="{{ $sampleAuditPath }}" class="btn btn-primary" download><i
                                class="bi bi-download me-1"></i>Download Sample Audit</a>

                        <hr>
                            <p class="card-text">We can provide detailed proposals, PDF spec sheets and demo logins for
                            selected projects — request when you contact us.</p>

                        <a href="{{ route('contact.index') }}" class="btn btn-primary">Contact Sales</a>
                    </div>
                    <div class="card-footer">
                        <p>Filter by:</p>
                        <div id="faqTags" class="d-flex flex-wrap justify-content-md-end gap-2">
                            @php
                                // collect unique tags
                                $allTags = collect($faqs)->pluck('tags')->flatten()->unique()->values();
                            @endphp
                            <button class="btn btn-sm btn-outline-secondary active faq-tag" data-tag="all">All</button>
                            @foreach ($allTags as $tag)
                                <button class="btn btn-sm btn-outline-secondary faq-tag"
                                    data-tag="{{ $tag }}">{{ ucfirst($tag) }}</button>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- JSON-LD generated from $faqs so it stays in sync with visible content --}}
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($faqs as $i => $f)
    {
      "@type": "Question",
      "name": {!! json_encode($f['q']) !!},
      "acceptedAnswer": {
        "@type": "Answer",
        "text": {!! json_encode(strip_tags($f['a'])) !!}
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>

    {{-- Tiny client-side search & tag filter (no external libs) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('faqSearch');
            const items = Array.from(document.querySelectorAll('#faqAccordion .accordion-item'));
            const tagButtons = document.querySelectorAll('#faqTags .faq-tag');

            // Search
            input.addEventListener('input', function() {
                const q = this.value.trim().toLowerCase();
                items.forEach(item => {
                    const text = item.innerText.toLowerCase();
                    item.style.display = q ? (text.includes(q) ? '' : 'none') : '';
                });
            });

            // Tag filter
            tagButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    tagButtons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const selected = btn.dataset.tag;
                    if (selected === 'all') {
                        items.forEach(i => i.style.display = '');
                        return;
                    }
                    items.forEach(i => {
                        const tags = i.getAttribute('data-tags') || '';
                        i.style.display = tags.split(' ').includes(selected) ? '' : 'none';
                    });
                });
            });
        });
    </script>


@endsection
