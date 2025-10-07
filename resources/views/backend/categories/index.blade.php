@extends('layouts.backend.app')
@section('title', 'Manage Categories')

@section('content')

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Form -->
                <div class="col-md-4 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category Manager</h3>
                        </div>

                        <form action="{{ route('categories.manage') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="category_id" value="">

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Write Category Name..." value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="3" class="form-control" placeholder="Write Description...">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-info" id="resetForm">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table -->
                <div class="col-md-8 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Categories</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $index => $category)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ Str::limit($category->description, 50) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <input type="checkbox" class="status-toggle me-2"
                                                        data-id="{{ $category->id }}"
                                                        {{ $category->status ? 'checked' : '' }}>
                                                    <span
                                                        class="pl-2 status-label {{ $category->status ? 'text-success' : 'text-secondary' }}">
                                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success editBtn"
                                                    data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                                    data-description="{{ $category->description }}">
                                                    Edit
                                                </button>

                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Edit button click
        $('.editBtn').click(function() {
            $('#category_id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#description').val($(this).data('description'));
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        });

        $('#resetForm').click(function() {
            $('#category_id').val('');
            $('#name').val('');
            $('#description').val('');
        });


        // Status toggle
        $('.status-toggle').change(function() {
            const checkbox = $(this);
            const id = checkbox.data('id');
            const status = checkbox.is(':checked') ? 1 : 0;
            const label = checkbox.closest('td').find('.status-label');

            if (status === 1) {
                label.text('Active').removeClass('text-secondary').addClass('text-success');
            } else {
                label.text('Inactive').removeClass('text-success').addClass('text-secondary');
            }

            $.ajax({
                url: `/categories/${id}/status`,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    status
                },
                success: function(res) {
                    console.log(res.message);
                },
                error: function() {
                    alert('Error updating status!');
                }
            });
        });
    </script>
@endsection
