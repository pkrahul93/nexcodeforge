<style>
    /* CTA Button */
    .btn-brand {
        /* background: var(--brand-color); */
        background: linear-gradient(135deg, #05c8f9, #007bff);
        color: #fff;
        padding: 14px 30px;
        border-radius: 40px;
        font-weight: 600;
        transition: all 0.4s ease;
    }

    .btn-brand:hover {
        background: var(--brand-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.4);
    }

    /* Mobile Optimization */
    @media (max-width: 768px) {
        .section-title h2 {
            font-size: 28px;
        }

        .btn-brand {
            width: 100%;
            text-align: center;
        }
    }
</style>

<!-- ================= CTA ================= -->
<section class="prt-row bg-base-dark clearfix text-center">
    <div class="container">
        <h2 class="text-white">Ready to Start Your Project?</h2>
        <p class="text-light">
            Get expert guidance and a clear roadmap for your website or app.
        </p>

        <a href="{{ url('/enquiry') }}" class="hero-btn btn-brand">
            Book Free Consultation
        </a>
    </div>
</section>
<!-- ================= CTA ================= -->
