@extends('layouts.backend.app')
@section('title', 'Manage Blog')

@php
    $originalTags = json_encode($selectedTags ?? []);
@endphp

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Blog</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Blog Manager</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('blogs.storeOrUpdate', $blog->id ?? null) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-8 mb-3">
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="title">Blog Title</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Write Blog Title Here...."
                                                value="{{ old('title', $blog->title ?? '') }}"
                                                data-original="{{ $blog->title ?? '' }}" required>
                                        </div>

                                        <div class="form-group col-md-12 mb-3">
                                            <label for="meta_title">Meta Title (Optional)</label>
                                            <input type="text" name="meta_title" class="form-control"
                                                placeholder="Write Blog Meta Title Here...."
                                                value="{{ old('meta_title', $blog->meta_title ?? '') }}"
                                                data-original="{{ $blog->meta_title ?? '' }}">
                                        </div>

                                        <div class="form-group col-md-12 mb-3">
                                            <label for="meta_description">Meta Description (Optioanl)</label>
                                            <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="3"
                                                placeholder="Write Blog Meta Description Here...." data-original="{{ $blog->meta_description ?? '' }}">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <label for="category">Category</label>
                                            <select name="category_id" id="category" class="form-control"
                                                data-original="{{ $blog->category_id ?? '' }}">
                                                <option value="">--Select Category--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control"
                                                data-original="{{ $blog->status ?? '' }}">
                                                <option value="">--Select Status--</option>
                                                @foreach (['draft', 'published', 'archived'] as $status)
                                                    <option value="{{ $status }}"
                                                        {{ old('status', $blog->status ?? '') == $status ? 'selected' : '' }}>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12 mb-3">
                                            <label for="tags">Choose Tags</label>
                                            <div class="card p-3">
                                                <div class="row" id="tagsContainer" data-original='{{ $originalTags }}'>
                                                    @foreach ($tags as $tag)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="tag_{{ $tag->id }}" name="tags[]"
                                                                    value="{{ $tag->id }}"
                                                                    {{ in_array($tag->id, old('tags', $selectedTags ?? [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="tag_{{ $tag->id }}">
                                                                    {{ $tag->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="card card-outline card-primary">
                                        <div class="card-body" id="imgPreview">
                                            <img src="{{ isset($blog) ? asset('uploads/blogs/' . $blog->featured_image) : 'backend/assets/img/logoh.png' }}"
                                                alt="" class="img-fluid" id="featuredImagePreview"
                                                data-original="{{ isset($blog) ? asset('uploads/blogs/' . $blog->featured_image) : asset('backend/assets/img/logoh.png') }}">
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group">
                                                <label for="exampleInput">Upload Featured Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInput"
                                                            name="featured_image">
                                                        <label class="custom-file-label" for="exampleInput">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="editor-content">Blog Content</label>
                                    <textarea name="content" id="editor-content" rows="13" class="form-control"
                                        placeholder="Write Blog Content Here....">{{ old('content', $blog->content ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit"
                                    class="btn btn-primary">{{ isset($blog) ? 'Update' : 'Save Changes' }}</button>
                                <button type="reset" class="btn btn-info" id="resetForm">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#resetForm').click(function() {
            // Reset text inputs
            $('input[type="text"][data-original]').each(function() {
                $(this).val($(this).data('original'));
            });

            // Reset selects
            $('select[data-original]').each(function() {
                $(this).val($(this).data('original'));
            });

            // Reset checkboxes (tags)
            $('#tagsContainer input[type="checkbox"]').prop('checked', false);
            let originalTags = JSON.parse($('#tagsContainer').attr('data-original'));
            originalTags.forEach(function(id) {
                $('#tag_' + id).prop('checked', true);
            });

            // Reset featured image
            let originalImg = $('#featuredImagePreview').data('original');
            $('#featuredImagePreview').attr('src', originalImg);

            // Reset file input
            $('#exampleInput').val('');
            $('.custom-file-label').html('Choose file');
        });
    </script>

@endsection
