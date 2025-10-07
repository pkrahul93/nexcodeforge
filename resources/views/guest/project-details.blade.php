@extends('layouts.guest')
@section('title', 'Project Details | NexcodeForge')

@section('content')

<!-- Page Title -->
<div class="prt-page-title-row style1">
    <div class="prt-page-title-row-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="prt-page-title-row-heading text-center">
                        <h2 class="title text-white">Smart CRM Dashboard</h2>
                        <div class="breadcrumb-wrapper text-white">
                            <span><a href="{{ route('home') }}" class="text-white">Home</a></span>
                            <span class="action">Project Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-page-title-overlay"></div>
    </div>
</div>
<!-- End Page Title -->

<!-- Site Main -->
<div class="site-main">

    <!-- Project Details Section -->
    <section class="prt-row product-details py-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Project Header Image -->
                    <div class="prt_pf_image-wrapper mb-5 text-center">
                        <img class="img-fluid rounded-4 shadow" 
                             src="https://images.unsplash.com/photo-1590608897129-79da98d159e4?auto=format&fit=crop&w=1400&q=80" 
                             alt="CRM Dashboard Preview">
                    </div>

                    <!-- Project Info -->
                    <div class="bg-light p-5 rounded-4 shadow-sm mb-5">
                        <div class="row">
                            <div class="col-md-2 col-6">
                                <h5 class="fw-bold text-dark mb-1">Category</h5>
                                <p class="text-muted">AI SaaS, Automation</p>
                            </div>
                            <div class="col-md-2 col-6">
                                <h5 class="fw-bold text-dark mb-1">Services</h5>
                                <p class="text-muted">Web App Development</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <h5 class="fw-bold text-dark mb-1">Client</h5>
                                <p class="text-muted">CredFund India Pvt. Ltd.</p>
                            </div>
                            <div class="col-md-2 col-6">
                                <h5 class="fw-bold text-dark mb-1">Date</h5>
                                <p class="text-muted">September 2024</p>
                            </div>
                            <div class="col-md-3 col-12">
                                <h5 class="fw-bold text-dark mb-1">Share</h5>
                                <div class="d-flex gap-3 fs-4">
                                    <a href="#"><i class="ti-facebook text-primary"></i></a>
                                    <a href="#"><i class="ti-twitter-alt text-info"></i></a>
                                    <a href="#"><i class="ti-linkedin text-primary"></i></a>
                                    <a href="#"><i class="ti-instagram text-danger"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-6">
                            <img class="img-fluid rounded-4 shadow" 
                                 src="https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=1000&q=80" 
                                 alt="Dashboard Analytics">
                        </div>
                        <div class="col-lg-6 mt-4 mt-lg-0">
                            <h3 class="fw-bold text-dark mb-3">Project Overview</h3>
                            <p class="text-muted" style="font-size: 17px;">
                                NexcodeForge developed a cloud-based CRM solution designed to streamline lead management,
                                automate daily tasks, and enhance data-driven decision-making for financial service providers.
                                The dashboard integrates AI modules for customer profiling, sales forecasting, and performance analytics.
                            </p>
                            <ul class="list-unstyled text-muted" style="font-size: 16px;">
                                <li>✔ AI-powered lead scoring and activity tracking</li>
                                <li>✔ Seamless API integration with WhatsApp and Meta CRM</li>
                                <li>✔ Role-based dashboards for agents, admins, and managers</li>
                                <li>✔ 40% improvement in operational efficiency</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Key Metrics -->
                    <div class="row text-center py-4 bg-dark rounded-4 text-white mb-5">
                        <div class="col-md-4">
                            <h2 class="fw-bold mb-1">10+</h2>
                            <p>Active Clients Using Platform</p>
                        </div>
                        <div class="col-md-4">
                            <h2 class="fw-bold mb-1">2M+</h2>
                            <p>Leads Processed Securely</p>
                        </div>
                        <div class="col-md-4">
                            <h2 class="fw-bold mb-1">99.9%</h2>
                            <p>Uptime with AWS Auto Scaling</p>
                        </div>
                    </div>

                    <!-- Additional Images -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <img class="img-fluid rounded-4 shadow-sm"
                                 src="https://images.unsplash.com/photo-1581090700227-1e37b190418e?auto=format&fit=crop&w=900&q=80"
                                 alt="Team Collaboration">
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid rounded-4 shadow-sm"
                                 src="https://images.unsplash.com/photo-1581091870622-6c82f4fbd7bf?auto=format&fit=crop&w=900&q=80"
                                 alt="UI/UX Mockup">
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="d-flex justify-content-between mt-5">
                        <a href="#" class="prt-btn prt-btn-size-md prt-btn-style-border prt-btn-color-dark rounded-pill">
                            <i class="ti-angle-left me-2"></i> Previous
                        </a>
                        <a href="#" class="prt-btn prt-btn-size-md prt-btn-style-fill prt-btn-color-gradiant rounded-pill">
                            Next <i class="ti-angle-right ms-2"></i>
                        </a>
                    </div>

                    <!-- Related Projects -->
                    <div class="mt-80">
                        <h3 class="fw-bold text-dark mb-4">Related Projects</h3>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="position-relative overflow-hidden rounded-4 shadow">
                                    <img class="img-fluid w-100" 
                                         src="https://images.unsplash.com/photo-1552581234-26160f608093?auto=format&fit=crop&w=900&q=80" 
                                         alt="Secure File Sharing">
                                    <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75 text-white">
                                        <h5 class="mb-1">Secure File Sharing</h5>
                                        <p class="small mb-0">Cloud, Security</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="position-relative overflow-hidden rounded-4 shadow">
                                    <img class="img-fluid w-100" 
                                         src="https://images.unsplash.com/photo-1581093588401-22e8f85b4892?auto=format&fit=crop&w=900&q=80" 
                                         alt="IoT Analytics Platform">
                                    <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75 text-white">
                                        <h5 class="mb-1">IoT Energy Dashboard</h5>
                                        <p class="small mb-0">IoT, Automation</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="position-relative overflow-hidden rounded-4 shadow">
                                    <img class="img-fluid w-100" 
                                         src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?auto=format&fit=crop&w=900&q=80" 
                                         alt="E-commerce Portal">
                                    <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75 text-white">
                                        <h5 class="mb-1">Insiya Outfits</h5>
                                        <p class="small mb-0">E-Commerce, Retail</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related Projects End -->

                </div>
            </div>
        </div>
    </section>
    <!-- Project Details End -->
</div>
@endsection
