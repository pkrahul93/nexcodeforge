@extends('layouts.backend.app')
@section('title', 'Manage Blog')

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
                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-8 mb-3">
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="title">Blog Title</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Write Blog Title Here...." value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="category">Category</label>
                                            <select name="category_id" id="category" class="form-control">
                                                <option value="">--Select Category--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="" selected>--Select Status--</option>
                                                <option value="draft">Draft</option>
                                                <option value="published">Published</option>
                                                <option value="archived">Archived</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="tags">Choose Tags</label>
                                            <div class="row card p-3">
                                                @foreach ($tags as $tag)
                                                    <div class="form-check col-md-3 mb-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="tag_{{ $tag->id }}" name="tags[]"
                                                            value="{{ $tag->id }}"
                                                            {{ in_array($tag->id, $selectedTags ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="tag_{{ $tag->id }}">
                                                            {{ $tag->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="editor-content">Blog Content</label>
                                            <textarea name="content" id="editor-content" rows="13" class="form-control"
                                                placeholder="Write Blog Content Here....">{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card card-outline card-primary">
                                        {{-- <div class="card-header">
                                            <h3 class="card-title">Featured Blog Image</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-lte-toggle="card-maximize">
                                                    <i data-lte-icon="maximize" class="bi bi-fullscreen"></i>
                                                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <img src="backend/assets/img/logoh.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group">
                                                <label for="exampleInput">Upload Featured Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInput"
                                                            name="featured_image">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> --}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@endsection
