<style>
    /* ================= WHY CHOOSE US ================= */

    .why-choose-section {
        background: linear-gradient(to bottom,
                rgba(5, 200, 249, 0.04),
                rgba(0, 123, 255, 0.02));
    }

    .why-box {
        text-align: center;
        padding: 35px 25px;
        border-radius: 16px;
        background: #fff;
        height: 100%;
        transition: all 0.35s ease;
        position: relative;
        overflow: hidden;
    }

    .why-box::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #05c8f9, #007bff);
        opacity: 0;
        transition: opacity 0.35s ease;
        z-index: 0;
    }

    .why-box:hover::before {
        opacity: 0.05;
    }

    .why-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
    }

    .why-box h3,
    .why-box p,
    .why-icon {
        position: relative;
        z-index: 1;
    }

    .why-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: linear-gradient(135deg, #05c8f9, #007bff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #fff;
        box-shadow: 0 10px 25px rgba(5, 200, 249, 0.45);
    }

    .why-box h3 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .why-box p {
        font-size: 14px;
        color: #555;
        line-height: 1.6;
    }

    /* Mobile spacing */
    @media (max-width: 767px) {
        .why-box {
            margin-bottom: 25px;
        }
    }

    .footer-icon-box {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<!-- ================= WHY US ================= -->
<section class="prt-row service-section why-choose-section clearfix">
    <div class="container">

        <!-- Heading -->
        <div class="row text-center mb-40" data-aos="fade-up" data-aos-duration="900">
            <div class="col-lg-12">
                <h2 class="title">Why Businesses Choose NexCodeForge</h2>
                <p class="desc-text">
                    We don’t just develop software — we create digital solutions
                    that deliver real business results.
                </p>
            </div>
        </div>

        <!-- Cards -->
        <div class="row row-equal-height">

            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="0">
                <div class="featured-icon-box style1 why-box">
                    <div class="why-icon">🎯</div>
                    <h3 class="text-center">Conversion-Focused Design</h3>
                    <p class="text-center">
                        Strategically designed websites that guide users
                        and turn visitors into paying customers.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="150">
                <div class="featured-icon-box style1 why-box">
                    <div class="why-icon">⚡</div>
                    <h3 class="text-center">Fast & SEO Ready</h3>
                    <p class="text-center">
                        Optimized performance, clean code, and SEO-ready
                        structure for better visibility and ranking.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="300">
                <div class="featured-icon-box style1 why-box">
                    <div class="why-icon">💰</div>
                    <h3 class="text-center">Affordable & Transparent</h3>
                    <p class="text-center">
                        Cost-effective solutions with clear pricing —
                        no hidden charges, no surprises.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="450">
                <div class="featured-icon-box style1 why-box">
                    <div class="why-icon">🤝</div>
                    <h3 class="text-center">Ongoing Support</h3>
                    <p class="text-center">
                        We stay with you post-launch to provide updates,
                        improvements, and reliable technical support.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- ================= WHY US ================= -->
