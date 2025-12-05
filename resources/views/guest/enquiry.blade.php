@extends('layouts.guest')
@section('title', 'Contact & Enquiry | NexCodeForge')
@section('meta_description',
    'Have questions or need a custom solution? Send your enquiry to NexCodeForge and our
    experts will guide you with the right solution.')

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
                                <h2 class="title">Enquiry Now</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="action">Enquiry</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-page-title-overlay"></div> -->
        </div>
    </div>
    <!-- page-title end -->

    <div class="container py-5">

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-3">
            <img src="{{ asset('guest/assets/images/enquiry.png') }}" class="img-fluid" width="350" alt="Enquiry">
        </div>
        <form action="{{ route('enquiry.store') }}" method="POST" enctype="multipart/form-data"
            class="query_form wrap-form clearfix mt-25 position-relative shadow-lg p-4 bg-white rounded">
            @csrf
            <h1 class="title text-center">Enquiry Now</h1>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Mobile <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" required>
                    @error('mobile')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Website (optional)</label>
                    <input type="url" name="website" value="{{ old('website') }}" class="form-control"
                        placeholder="https://example.com">
                    @error('website')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label>Subject (optional)</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" class="form-control">
                    @error('subject')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Select service <span class="text-danger">*</span></label>
                    <select name="enq_for" class="form-select" required>
                        <option value="">Select</option>

                        <option value="Website Development"
                            {{ old('enq_for') == 'Website Development' ? 'selected' : '' }}>
                            Website Development</option>
                        <option value="Mobile App" {{ old('enq_for') == 'Mobile App' ? 'selected' : '' }}>Mobile App
                        </option>
                        <option value="Custom Software" {{ old('enq_for') == 'Custom Software' ? 'selected' : '' }}>
                            Custom Software</option>
                        <option value="UI/UX Design" {{ old('enq_for') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design
                        </option>
                        <option value="Hosting & Maintenance"
                            {{ old('enq_for') == 'Hosting & Maintenance' ? 'selected' : '' }}>
                            Hosting & Maintenance</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Upload Document (optional)</label>
                    <input type="file" name="document" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                    @error('document')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label>Message <span class="text-danger">*</span></label>
                    <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-lg btn-primary px-5">Send Enquiry</button>
                </div>
            </div>
        </form>
    </div>
@endsection
