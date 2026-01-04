@extends('layouts.guest')
@section('title', 'Website Re-Designing | NexCodeForge')

@section('content')
<style>
    :root {
        /* Refined Color Palette */
        --primary-color: #6366f1; /* Indigo 500 */
        --primary-hover: #4f46e5; /* Indigo 600 */
        --secondary-color: #ec4899; /* Pink 500 */
        --dark-bg: #0f172a; /* Slate 900 */
        --card-bg: #1e293b; /* Slate 800 */
        --text-main: #f8fafc; /* Slate 50 */
        --text-muted: #94a3b8; /* Slate 400 */
        --accent-glow: rgba(99, 102, 241, 0.5);
    }

    .redesign-page-wrapper {
        background-color: var(--dark-bg);
        color: var(--text-main);
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
    }

    /* Hero Section */
    .redesign-hero {
        padding: 180px 0 120px;
        position: relative;
        background: radial-gradient(circle at top center, #1e1b4b 0%, var(--dark-bg) 70%);
        overflow: hidden;
    }

    .redesign-hero::before {
        content: '';
        position: absolute;
        top: -20%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
        filter: blur(80px);
        animation: pulse 8s infinite ease-in-out;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }

    .hero-title {
        font-size: 4.5rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 25px;
        background: linear-gradient(135deg, #fff 0%, #a5b4fc 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: var(--text-muted);
        margin-bottom: 40px;
        font-weight: 300;
        max-width: 600px;
    }

    /* Comparison Section */
    .comparison-section {
        padding: 100px 0;
        background: #020617; /* Slate 950 */
        position: relative;
    }

    .comparison-card {
        background: var(--card-bg);
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(255,255,255,0.05);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .comparison-card img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s ease;
    }

    .comparison-card.old {
        filter: grayscale(100%) contrast(0.8);
        opacity: 0.8;
        transform: scale(0.95);
    }
    
    .comparison-card.old:hover {
        filter: grayscale(0%) contrast(1);
        opacity: 1;
        transform: scale(0.98);
    }

    .comparison-card.new {
        border: 2px solid var(--primary-color);
        box-shadow: 0 0 50px rgba(99, 102, 241, 0.3);
        transform: scale(1.02);
        z-index: 10;
    }

    .comparison-card.new:hover img {
        transform: scale(1.05);
    }

    .card-label {
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        z-index: 2;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
    }

    .label-old { background: #334155; color: #94a3b8; }
    .label-new { background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); color: #fff; }

    /* Benefits Section */
    .benefits-section {
        padding: 120px 0;
        background: var(--dark-bg);
    }

    .benefit-item {
        text-align: center;
        padding: 40px 30px;
        background: rgba(255,255,255,0.02);
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.05);
        transition: all 0.3s ease;
        height: 100%;
    }

    .benefit-item:hover {
        transform: translateY(-10px);
        background: rgba(255,255,255,0.05);
        border-color: rgba(99, 102, 241, 0.3);
    }

    .benefit-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 25px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        border-radius: 20px;
        background: rgba(99, 102, 241, 0.1);
        transition: all 0.3s ease;
    }

    .benefit-item:hover .benefit-icon {
        background: var(--primary-color);
        color: #fff;
        transform: rotate(5deg);
    }

    .benefit-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }

    /* Process Section */
    .process-section {
        padding: 100px 0;
        background: #020617;
    }

    .process-step {
        position: relative;
        padding-left: 60px;
        margin-bottom: 60px;
    }

    .step-number {
        position: absolute;
        left: -20px;
        top: -10px;
        font-size: 4rem;
        font-weight: 900;
        background: linear-gradient(180deg, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1;
    }

    .step-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    /* CTA */
    .redesign-cta {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 80px 0;
        text-align: center;
        border-radius: 30px;
        margin-bottom: 100px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 60px -10px rgba(99, 102, 241, 0.5);
    }

    .redesign-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .cta-btn {
        background: #fff;
        color: var(--primary-color);
        font-weight: 800;
        padding: 18px 50px;
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .cta-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        color: var(--secondary-color);
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2.5rem; }
        .redesign-hero { padding: 120px 0 60px; }
        .comparison-card.new { transform: scale(1); margin-top: 30px; }
        
        /* Benefits Section Mobile */
        .benefits-section { padding: 60px 0; }
        .benefit-item { margin-bottom: 20px; padding: 30px 20px; }
        
        /* Process Section Mobile */
        .process-section { padding: 60px 0; }
        .process-step { padding-left: 0; text-align: center; margin-bottom: 40px; }
        .step-number { position: relative; top: 0; left: 0; font-size: 3rem; margin-bottom: 10px; display: block; }
        
        /* CTA Section Mobile */
        .redesign-cta { padding: 40px 20px; margin-bottom: 60px; }
        .redesign-cta h2 { font-size: 2rem; }
    }
</style>

<div class="redesign-page-wrapper">

    <!-- Hero -->
    <section class="redesign-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-title">Revitalize Your Digital Presence</h1>
                    <p class="hero-subtitle">Don't let an outdated website hold you back. Transform your online identity with a modern, high-performance redesign that drives results.</p>
                    <a href="#comparison" class="btn btn-primary rounded-pill px-5 py-3 fw-bold" style="background: var(--primary-color); border: none;">See the Transformation</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Section -->
    <section id="comparison" class="comparison-section">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-12">
                    <h2 class="display-5 fw-bold mb-3 text-white">Out with the Old, In with the New</h2>
                    <p class="text-muted fs-5">Experience the difference a professional redesign makes.</p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <!-- Old Site -->
                <div class="col-lg-5">
                    <div class="comparison-card old">
                        <div class="card-label label-old">BEFORE</div>
                        <img src="{{ asset('guest/assets/images/design/website_before.png') }}" alt="Outdated Website Design">
                    </div>
                </div>
                
                <!-- Arrow (Desktop only) -->
                <div class="col-lg-2 d-none d-lg-block text-center">
                    <i class="fa-solid fa-arrow-right-long display-3 text-white" style="opacity: 0.3;"></i>
                </div>

                <!-- New Site -->
                <div class="col-lg-5">
                    <div class="comparison-card new">
                        <div class="card-label label-new">AFTER</div>
                        <img src="{{ asset('guest/assets/images/design/website_after.png') }}" alt="Modern Website Redesign">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Redesign -->
    <section class="benefits-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-white">Why Redesign Now?</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                        <h3 class="benefit-title">Mobile First</h3>
                        <p class="text-white">Over 60% of traffic is mobile. We ensure your site looks perfect on every device.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-solid fa-bolt"></i></div>
                        <h3 class="benefit-title">Blazing Speed</h3>
                        <p class="text-white">Slow sites lose customers. We optimize code and assets for instant load times.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-solid fa-eye"></i></div>
                        <h3 class="benefit-title">Modern Aesthetics</h3>
                        <p class="text-white">Build trust with a polished, professional look that reflects your brand's quality.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
                        <h3 class="benefit-title">Higher Conversion</h3>
                        <p class="text-white">Strategic layouts and clear CTAs designed to turn visitors into paying customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="process-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-5 text-white text-center text-lg-start">Our Redesign Process</h2>
                    <div class="process-step">
                        <div class="step-number">01</div>
                        <h3 class="step-title">Audit & Analysis</h3>
                        <p class="text-white">We identify what's working, what's not, and where the opportunities lie.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">02</div>
                        <h3 class="step-title">Strategy & UX</h3>
                        <p class="text-white">We map out user journeys and wireframes to ensure a seamless experience.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">03</div>
                        <h3 class="step-title">Design & Dev</h3>
                        <p class="text-white">We bring the vision to life with pixel-perfect design and clean code.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">04</div>
                        <h3 class="step-title">Launch & Growth</h3>
                        <p class="text-white">We handle the migration and ensure a smooth transition to your new site.</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
                    <!-- Abstract Shape -->
                    <div style="width: 100%; max-width: 450px; height: 400px; background: radial-gradient(circle, rgba(99, 102, 241, 0.1), transparent); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-layer-group" style="font-size: 12rem; color: rgb(148 157 215);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <div class="container p-3 p-md-5">
        <div class="redesign-cta">
            <h2 class="text-white fw-bold mb-2">Ready for a Fresh Start?</h2>
            <p class="text-white-90 fs-5 mb-4">Get a free audit of your current website and see what's possible.</p>
            <a href="{{ route('contact.index') }}" class="cta-btn text-decoration-none">Get Your Free Audit</a>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            gsap.from(".hero-title", { duration: 1, y: 50, opacity: 0, ease: "power3.out" });
            gsap.from(".comparison-card.old", { 
                scrollTrigger: ".comparison-section",
                x: -50, opacity: 0, duration: 1, ease: "power3.out" 
            });
            gsap.from(".comparison-card.new", { 
                scrollTrigger: ".comparison-section",
                x: 50, opacity: 0, duration: 1, ease: "power3.out", delay: 0.2 
            });
        }
    });
</script>
@endsection


