@extends('layouts.backend.app')
@section('title', 'Manage Tag')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Tag</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Form -->
                <div class="col-md-4 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tag Manager</h3>
                        </div>

                        <form action="{{ route('tags.manage') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="tag_id" value="">

                            <div class="card-body">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="name">Tag Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Write Tag Name Here..." value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-info" id="resetForm">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Table -->
                <div class="col-md-8 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Tags</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Tags</th>
                                        <th>Slug(s)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $index => $tag)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>{{ $tag->slug }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <input type="checkbox" class="status-toggle me-2"
                                                        data-id="{{ $tag->id }}" {{ $tag->status ? 'checked' : '' }}>
                                                    <span
                                                        class="pl-2 status-label {{ $tag->status ? 'text-success' : 'text-secondary' }}">
                                                        {{ $tag->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success editBtn"
                                                    data-id="{{ $tag->id }}" data-name="{{ $tag->name }}">
                                                    Edit
                                                </button>

                                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                                    style="display:inline">
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
        // Handle edit button click
        $('.editBtn').click(function() {
            $('#tag_id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        });

        $('#resetForm').click(function() {
            $('#tag_id').val('');
            $('#name').val('');
        });

        // Handle status toggle
        $('.status-toggle').change(function() {
            const checkbox = $(this);
            const id = checkbox.data('id');
            const status = checkbox.is(':checked') ? 1 : 0;
            const label = checkbox.closest('td').find('.status-label');

            // Update label text and color immediately (frontend)
            if (status === 1) {
                label.text('Active').removeClass('text-secondary').addClass('text-success');
            } else {
                label.text('Inactive').removeClass('text-success').addClass('text-secondary');
            }

            // Send AJAX request to update in DB
            $.ajax({
                url: `/tags/${id}/status`,
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
