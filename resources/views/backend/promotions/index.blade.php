@extends('layouts.backend.app')
@section('title', 'Manage Promotions')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Promotions Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Promotions</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">All Promotions</h3>
            <a href="{{ route('promotions.manage') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New Promotion
            </a>
        </div>

        <div class="card-body">

            <!-- 🔍 Filter Section -->
            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search title or content...">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-info"><i class="fas fa-filter"></i> Filter</button>
                        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>

            <!-- 🧾 Table -->
            <table id="example1" class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Title</th>
                        <th width="15%">Image</th>
                        <th width="25%">Content</th>
                        <th width="10%">Show Interval</th>
                        <th width="10%">Timer</th>
                        <th width="10%">Status</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($promotions as $index => $promotion)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $promotion->title }}</td>
                            <td>
                                @if($promotion->image)
                                    <img src="{{ asset('uploads/promotions/' . $promotion->image) }}" width="100" height="80" class="rounded shadow-sm">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{!! Str::limit(strip_tags($promotion->content), 80, '...') !!}</td>
                            <td>{{ $promotion->show_interval ?? '—' }} hrs</td>
                            <td>{{ $promotion->timer ?? 0 }} sec</td>
                            <td>
                                <select class="form-control status-change" data-id="{{ $promotion->id }}">
                                    <option value="1" {{ $promotion->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $promotion->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </td>
                            <td>
                                <a href="{{ route('promotions.manage', $promotion->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $promotion->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No promotions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $promotions->links() }}
            </div>
        </div>
    </div>
</div>
</section>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {

    // 🔄 Status Change
    $('.status-change').change(function() {
        const promoId = $(this).data('id');
        const status = $(this).val();

        $.ajax({
            url: "{{ url('admin/promotions') }}/" + promoId + "/status",
            type: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}',
                status: status
            },
            success: function(res) {
                toastr.success(res.message || 'Status updated successfully');
            },
            error: function(xhr) {
                toastr.error('Failed to update status');
                console.error(xhr.responseText);
            }
        });
    });

    // 🗑 Delete
    $('.delete-btn').click(function() {
        const promoId = $(this).data('id');
        if (confirm('Are you sure you want to delete this promotion?')) {
            $.ajax({
                url: "{{ url('admin/promotions') }}/" + promoId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    toastr.success(res.message || 'Promotion deleted successfully');
                    location.reload();
                },
                error: function(xhr) {
                    toastr.error('Failed to delete promotion');
                    console.error(xhr.responseText);
                }
            });
        }
    });

});
</script>

@endsection
