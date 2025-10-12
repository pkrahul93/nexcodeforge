@extends('layouts.guest')
@section('title', 'Disclaimer | NexCodeForge')
@section('meta_description', 'Read the Disclaimer for NexCodeForge — limitations of liability, accuracy of information, and external links.')

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
                                <h2 class="title">Disclaimer</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span><a title="Homepage" href="{{ route('home') }}">Home</a></span>
                                <span class="action">Disclaimer</span>
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
                        <h1 class="fw-b text-center">Our Disclaimer</h1>
                        <hr>
                        <h2 class="h4">General Disclaimer</h2>
                        <p>
                            The information provided by <strong>{{ config('app.name', 'YourSite') }}</strong> is for general informational purposes only.
                            All content is provided "as is" without warranty of any kind, either expressed or implied.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">External Links</h2>
                        <p>
                            Our website may contain links to third-party websites. We do not endorse or guarantee the content of these external sites.
                        </p>
                    </section>

                    <section class="mb-4">
                        <h2 class="h4">Limitation of Liability</h2>
                        <p>
                            {{ config('app.name', 'YourSite') }} will not be liable for any damages arising from the use or inability to use the website or services.
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
