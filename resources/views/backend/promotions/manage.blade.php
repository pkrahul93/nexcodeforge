@extends('layouts.backend.app')
@section('title', isset($promotion) ? 'Edit Promotion' : 'Add Promotion')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($promotion) ? 'Edit' : 'Add' }} Promotion</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Promotions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success col-md-8 mx-auto my-3 ">{{ session('success') }}</div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger col-md-8 mx-auto my-3 ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($promotion) ? 'Update Promotion' : 'Create Promotion' }}</h3>
                </div>

                <form action="{{ route('promotions.storeOrUpdate', $promotion->id ?? null) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">

                        <div class="form-group col-md-6 mb-3">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $promotion->title ?? '') }}" required>
                        </div>

                        <div class="form-group col-md-3 mb-3">
                            <label>Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ old('status', $promotion->status ?? '') == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ old('status', $promotion->status ?? '') == 0 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3 mb-3">
                            <label>Show Interval (hours)</label>
                            <input type="number" name="show_interval" min="0" class="form-control"
                                value="{{ old('show_interval', $promotion->show_interval ?? '') }}">
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label>Start Date</label>
                            <input type="datetime-local" name="start_date" class="form-control"
                                value="{{ old('start_date', isset($promotion->start_date) ? $promotion->start_date->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label>End Date</label>
                            <input type="datetime-local" name="end_date" class="form-control"
                                value="{{ old('end_date', isset($promotion->end_date) ? $promotion->end_date->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label>Timer (seconds)</label>
                            <input type="number" name="timer" min="0" class="form-control"
                                value="{{ old('timer', $promotion->timer ?? '') }}">
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label>Button Text</label>
                            <input type="text" name="button_text" class="form-control"
                                value="{{ old('button_text', $promotion->button_text ?? '') }}">
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label>Button Link</label>
                            <input type="url" name="button_link" class="form-control"
                                value="{{ old('button_link', $promotion->button_link ?? '') }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="form-group col-md-8 mb-3">
                                    <label>Content</label>
                                    <textarea name="content" rows="5" class="form-control">{{ old('content', $promotion->content ?? '') }}</textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    {{-- <div class="row"> --}}
                                    <div class="mx-auto mb-3">
                                        <div class="card">
                                            <div class="card-body text-center" id="imgPreview">
                                                <img src="{{ isset($promotion->image) ? asset('uploads/promotions/' . $promotion->image) : 'backend/assets/img/logoh.png' }}"
                                                    alt="Promotion-Image" class="mt-2 rounded" id="featuredImagePreview"
                                                    width="150"
                                                    data-original="{{ isset($promotion->image) ? asset('uploads/promotions/' . $promotion->image) : asset('backend/assets/img/logoh.png') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="exampleInput">Upload Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInput"
                                                    name="image">
                                                <label class="custom-file-label" for="exampleInput">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary">{{ isset($promotion) ? 'Update Promotion' : 'Create Promotion' }}</button>
                        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
