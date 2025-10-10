@extends('layouts.backend.app')
@section('title', 'All Blogs')

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
                        <li class="breadcrumb-item active">Blogs</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Blogs</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Image(s)</th>
                                        <th class="message">Contents</th>
                                        <th>Published At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $index => $post)
                                        <tr>
                                            <td>{{ $index + 1 }} </td>
                                            <td>{{ $post->category_id }}</td>
                                            <td>{{ $post->title }} </td>
                                            <td>
                                                <div class="card p-2">
                                                    <img src="{{ 'uploads/blogs/' . $post->featured_image }}" width="150px"
                                                        alt="featured-img" class="img-fluid">
                                                </div>
                                            </td>
                                            <td class="message">{!! $post->content !!}</td>
                                            <td>{{ $post->published_at }}</td>
                                            <td>
                                                <select class="form-control status-change" data-id="{{ $post->id }}">
                                                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>
                                                        Draft</option>
                                                    <option value="published"
                                                        {{ $post->status == 'published' ? 'selected' : '' }}>Published
                                                    </option>
                                                    <option value="archived"
                                                        {{ $post->status == 'archived' ? 'selected' : '' }}>Archived
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ url('/add-blog/' . $post->id) }}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{ url('/delete-blog/' . $post->id) }}"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.status-change').change(function() {
            const blogId = $(this).data('id');
            const status = $(this).val();

            $.ajax({
                url: '/blog/' + blogId + '/status',
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(res) {
                    toastr.success(res.message); // Optional if you're using Toastr
                },
                error: function(xhr) {
                    // alert('Failed to update status.');
                    toastr.error('Failed to update status.');
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

@endsection
