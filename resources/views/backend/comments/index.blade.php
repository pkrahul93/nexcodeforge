@extends('layouts.backend.app')
@section('title', 'Manage Comments')

@php
    // dd($comments);
@endphp
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
                        <li class="breadcrumb-item active">Manage Comments</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Table -->
                <div class="col-md-12 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Comments</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Blog Title</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Comments</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $index => $comment)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <a href="{{ url('/add-blog/' . $comment->post->id) }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $comment->post->title }}</a>
                                            </td>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ $comment->website }}</td>
                                            <td class="message">{{ $comment->content }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="pl-2 status-label {{ $comment->status == 'approved' ? 'text-success' : 'text-secondary' }}">
                                                        {{ ucfirst($comment->status) }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-sm status-btn mb-2
                                                    @if ($comment->status == 'approved') btn-success
                                                    @elseif($comment->status == 'pending') btn-secondary
                                                    @elseif($comment->status == 'rejected') btn-dark @endif"
                                                    data-id="{{ $comment->id }}">
                                                    {{ ucfirst($comment->status) }}
                                                </button>

                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
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
        $('.status-btn').click(function() {
            const btn = $(this);
            const id = btn.data('id');
            let currentStatus = btn.text().toLowerCase();

            // Toggle status between 'pending' and 'approved'
            const newStatus = currentStatus === 'pending' ? 'approved' : 'pending';

            // Update UI immediately
            btn.text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
            btn.removeClass('btn-success btn-secondary');
            btn.addClass(newStatus === 'approved' ? 'btn-success' : 'btn-secondary');

            // Send AJAX request
            $.ajax({
                url: `/comments/${id}/status`,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: newStatus
                },
                success: function(res) {
                    toastr.success(res.message);
                    console.log(res.message);
                },
                error: function() {
                    toastr.error('Failed to update status.');
                    // Revert UI if error
                    btn.text(currentStatus.charAt(0).toUpperCase() + currentStatus.slice(1));
                    btn.removeClass('btn-success btn-secondary');
                    btn.addClass(currentStatus === 'approved' ? 'btn-success' : 'btn-secondary');
                }
            });
        });
    </script>
@endsection
