@extends('layouts.guest')
@section('title', 'Creative Design | NexCodeForge ')
@section('meta_keywords', 'Creative Design, NexCodeForge, Digital Aesthetics, Brand Experience, Web Design, UI/UX Design, Motion Graphics, Brand Identity, Mobile First, Conversion Focus')
@section('content')
<style>
    /* Custom Styles for Creative Design Page */
    :root {
        --primary-color: #0d6efd;
        --secondary-color: #6610f2;
        --accent-color: #0dcaf0;
        --dark-bg: #050505;
        --card-bg: #111;
        --text-glow: 0 0 15px rgba(13, 202, 240, 0.6);
    }

    .creative-page-wrapper {
        background-color: var(--dark-bg);
        color: #fff;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
        position: relative;
    }

    /* Background Mesh/Glow */
    .bg-decoration {
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(13, 110, 253, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(80px);
        z-index: 0;
        animation: float 10s ease-in-out infinite;
    }
    .bg-decoration-1 { top: -10%; left: -10%; animation-delay: 0s; }
    .bg-decoration-2 { bottom: 10%; right: -10%; background: radial-gradient(circle, rgba(102, 16, 242, 0.15) 0%, transparent 70%); animation-delay: -5s; }

    @keyframes float {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(30px, 50px); }
    }

    /* Hero Section */
    .creative-hero {
        position: relative;
        padding: 200px 0 150px;
        background: transparent;
        overflow: hidden;
        z-index: 1;
    }
    
    .hero-title {
        font-size: 5rem;
        font-weight: 900;
        line-height: 1.1;
        background: linear-gradient(to right, #fff, #a2d2ff, #fff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% auto;
        animation: shine 5s linear infinite;
        margin-bottom: 30px;
        text-shadow: 0 0 30px rgba(13, 110, 253, 0.3);
    }

    @keyframes shine {
        to { background-position: 200% center; }
    }

    .hero-subtitle {
        font-size: 1.5rem;
        color: #e0e0e0;
        margin-bottom: 50px;
        font-weight: 400;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Features Section */
    .features-section {
        padding: 100px 0;
        position: relative;
        z-index: 1;
    }

    .feature-card {
        background: linear-gradient(145deg, #1a1a1a, #0a0a0a);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 40px 30px;
        transition: all 0.4s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(13, 110, 253, 0.2);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        transition: all 0.4s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .feature-card:hover .icon-wrapper {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        transform: rotateY(180deg);
    }

    .feature-icon {
        font-size: 2rem;
        color: #fff;
        transition: all 0.4s ease;
    }

    .feature-card:hover .feature-icon {
        transform: rotateY(-180deg); /* Counter-rotate to keep icon upright if desired, or let it spin */
    }

    .feature-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }

    .feature-desc {
        color: #aaa;
        line-height: 1.6;
        font-size: 1rem;
    }

    /* CTA Section */
    .cta-section {
        padding: 120px 0;
        background: linear-gradient(to bottom, transparent, #000);
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .cta-box {
        background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(102, 16, 242, 0.1));
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        padding: 80px 40px;
        position: relative;
        overflow: hidden;
    }

    .cta-btn {
        padding: 20px 60px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 50px;
        background: #fff;
        color: #000;
        border: none;
        transition: all 0.3s ease;
        display: inline-block;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }
    
    .cta-btn:hover {
        transform: scale(1.05);
        background: var(--primary-color);
        color: #fff;
        box-shadow: 0 0 40px var(--primary-color);
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 3rem; }
        .creative-hero { padding: 150px 0 80px; }
    }

</style>

<div class="creative-page-wrapper">
    
    <!-- Background Decorations -->
    <div class="bg-decoration bg-decoration-1"></div>
    <div class="bg-decoration bg-decoration-2"></div>

    <!-- Hero -->
    <section class="creative-hero d-flex align-items-center">
        <div class="container text-center hero-content">
            <h1 class="hero-title">Creative Design</h1>
            <p class="hero-subtitle">We don't just design; we craft digital experiences that captivate, engage, and convert.</p>
            <a href="#features" class="btn btn-outline-light rounded-pill px-5 py-3 mt-4 fw-bold border-2" style="letter-spacing: 1px;">DISCOVER MORE</a>
        </div>
    </section>

    <!-- Features Grid -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="row g-4">
                <!-- Item 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-rocket feature-icon"></i>
                        </div>
                        <h3 class="feature-title">Startup MVP</h3>
                        <p class="feature-desc">Launch fast with a high-impact MVP. We prioritize speed without compromising on the premium look that investors love.</p>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-pen-ruler feature-icon"></i>
                        </div>
                        <h3 class="feature-title">UI/UX Design</h3>
                        <p class="feature-desc">Intuitive interfaces designed for humans. We map user journeys to create seamless, frustration-free experiences.</p>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-fingerprint feature-icon"></i>
                        </div>
                        <h3 class="feature-title">Brand Identity</h3>
                        <p class="feature-desc">More than a logo. We build cohesive visual systems that make your brand instantly recognizable and memorable.</p>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-film feature-icon"></i>
                        </div>
                        <h3 class="feature-title">Motion Graphics</h3>
                        <p class="feature-desc">Add depth and delight with smooth animations. We use motion to guide attention and enhance usability.</p>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-mobile-screen feature-icon"></i>
                        </div>
                        <h3 class="feature-title">Mobile First</h3>
                        <p class="feature-desc">Flawless on every screen. Our responsive designs ensure your product looks stunning on phones, tablets, and desktops.</p>
                    </div>
                </div>
                <!-- Item 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-chart-line feature-icon"></i>
                        </div>
                        <h3 class="feature-title">Conversion Focus</h3>
                        <p class="feature-desc">Design that sells. We use psychological triggers and data-driven layouts to maximize your conversion rates.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box">
                <h2 class="mb-4 fw-bold text-white display-5">Ready to Make an Impact?</h2>
                <p class="mb-5 text-white fs-5 p-2">Your vision deserves a world-class design. Let's build it together.</p>
                <a href="{{ route('contact.index') }}" class="cta-btn text-decoration-none">Start Your Project</a>
            </div>
        </div>
    </section>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            // Hero
            gsap.from(".hero-title", { duration: 1.5, y: 50, opacity: 0, ease: "power4.out" });
            gsap.from(".hero-subtitle", { duration: 1.5, y: 30, opacity: 0, ease: "power4.out", delay: 0.3 });

            // Cards
            gsap.utils.toArray('.feature-card').forEach((card, i) => {
                gsap.from(card, {
                    scrollTrigger: {
                        trigger: card,
                        start: "top 85%",
                    },
                    y: 50,
                    opacity: 0,
                    duration: 0.8,
                    ease: "back.out(1.7)",
                    delay: i * 0.1
                });
            });
        }
    });
</script>
@endsection

