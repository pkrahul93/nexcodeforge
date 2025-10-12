@extends('layouts.guest')
@section('title', 'Careers | NexCodeForge')
@section('meta_description', 'Join the team at NexCodeForge — explore career opportunities, open positions, and our company culture.')

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
                                <h2 class="title">Careers</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Careers</span>
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

                    <section class="mb-4">
                        <h1 class="fw-b text-center">Work With Us</h1>
                        <hr>
                        <h2 class="h4">Join Our Team</h2>
                        <p>
                            At <strong>{{ config('app.name', 'YourSite') }}</strong>, we are always looking for talented, passionate, and motivated individuals to join our growing team. Our company culture emphasizes innovation, collaboration, and continuous learning.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">Why Work With Us?</h2>
                        <ul>
                            <li>Work on innovative projects with cutting-edge technologies.</li>
                            <li>Collaborative and supportive work environment.</li>
                            <li>Opportunities for growth and professional development.</li>
                            <li>Flexible work arrangements and remote options.</li>
                        </ul>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">Current Openings</h2>
                        <p>
                            We are actively hiring for the following roles:
                        </p>
                        <ul>
                            <li>Full Stack Developer</li>
                            <li>Frontend Developer (React/Vue)</li>
                            <li>Backend Developer (Laravel/PHP)</li>
                            <li>UI/UX Designer</li>
                            <li>Digital Marketing Specialist</li>
                        </ul>
                        <p>
                            For a detailed job description and requirements, please contact us at <a href="mailto:careers@nexcodeforge.com">careers@nexcodeforge.com</a>.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">How to Apply</h2>
                        <p>
                            To apply, please send your resume, portfolio (if applicable), and a brief introduction to <a href="mailto:careers@nexcodeforge.com">careers@nexcodeforge.com</a>. Shortlisted candidates will be contacted for an interview.
                        </p>
                    </section>

                    <hr>
                    <p class="small text-muted text-center mb-0">
                        Last updated: {{ \Carbon\Carbon::now()->format('F j, Y') }}.
                    </p>

                </div>

            </div>
        </div>
    </div>
@endsection
