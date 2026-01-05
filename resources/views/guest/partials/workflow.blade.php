<style>
    /* ================= WORK PROCESS FLOW ================= */

    .process-flow {
        position: relative;
        align-items: flex-start;
    }

    .process-step {
        padding: 20px;
    }

    .process-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: linear-gradient(135deg, #05c8f9, #007bff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: #fff;
        box-shadow: 0 8px 25px rgba(5, 200, 249, 0.4);
    }

    .process-step h4 {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .process-step p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    /* Connecting line */
    .process-line {
        position: absolute;
        top: 54px;
        width: 76% !important;
        height: 2px;
        background: linear-gradient(to right, #05c8f9, #007bff);
        z-index: -1;
    }

    /* Desktop alignment fix */
    @media (min-width: 992px) {
        .process-line {
            left: 12.5%;
            right: 12.5%;
        }
    }

    /* Mobile adjustments */
    @media (max-width: 991px) {
        .process-line {
            display: none;
        }

        .process-step {
            margin-bottom: 30px;
        }
    }
</style>

<!-- ================= WORK PROCESS (AOS ANIMATED) ================= -->
<section class="prt-row step-section clearfix">
    <div class="container">

        <!-- Section Heading -->
        <div class="row justify-content-center text-center mb-40" data-aos="fade-up" data-aos-duration="900">
            <div class="col-lg-8">
                <h2 class="title">Our Simple & Transparent Work Process</h2>
                <p class="desc-text">
                    From idea to launch — we follow a proven, step-by-step workflow
                    to ensure quality, clarity, and on-time delivery.
                </p>
            </div>
        </div>

        <!-- Process Flow -->
        <div class="row process-flow text-center">

            <!-- Step 1 -->
            <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="0" data-aos-duration="800">
                <div class="process-icon">
                    <span>📌</span>
                </div>
                <h4>Requirement & Strategy</h4>
                <p>
                    We understand your business goals, target audience,
                    and project requirements to define the right strategy.
                </p>
            </div>

            <!-- Connector -->
            <div class="process-line d-none d-lg-block"></div>

            <!-- Step 2 -->
            <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="150" data-aos-duration="800">
                <div class="process-icon">
                    <span>🎨</span>
                </div>
                <h4>Design & Development</h4>
                <p>
                    Our team designs intuitive interfaces and builds
                    secure, scalable solutions using modern technologies.
                </p>
            </div>

            <!-- Connector -->
            <div class="process-line d-none d-lg-block"></div>

            <!-- Step 3 -->
            <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="process-icon">
                    <span>🧪</span>
                </div>
                <h4>Testing & Optimization</h4>
                <p>
                    We rigorously test performance, security, and usability
                    to ensure a smooth and reliable experience.
                </p>
            </div>

            <!-- Connector -->
            <div class="process-line d-none d-lg-block"></div>

            <!-- Step 4 -->
            <div class="col-lg-3 col-md-6 process-step" data-aos="fade-up" data-aos-delay="450" data-aos-duration="800">
                <div class="process-icon">
                    <span>🚀</span>
                </div>
                <h4>Launch & Support</h4>
                <p>
                    We deploy your project and provide continuous support,
                    updates, and improvements as your business grows.
                </p>
            </div>

        </div>

        <!-- CTA -->
        <div class="row mt-40 text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="900">
            <div class="col-lg-12">
                <a href="{{ url('contactus') }}" class="prt-btn prt-btn-color-gradiant">
                    Discuss Your Project
                </a>
            </div>
        </div>

    </div>
</section>
<!-- ================= WORK PROCESS (AOS ANIMATED) ================= -->
