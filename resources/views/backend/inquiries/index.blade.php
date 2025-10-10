@extends('layouts.backend.app')
@section('title', 'Manage Promotional Enquiries')

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
                        <li class="breadcrumb-item active">Promotional Enquiries</li>
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
                            <h3 class="card-title">All Promotional Enquiries</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Received At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiries as $enquiry)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $enquiry->name }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>{{ $enquiry->mobile }}</td>
                                            <td>{{ $enquiry->subject ?? '—' }}</td>
                                            <td>
                                                <form action="{{ route('admin.enquiries.status', $enquiry->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" onchange="this.form.submit()"
                                                        class="form-control form-select-sm">
                                                        <option value="pending"
                                                            {{ $enquiry->status == 'pending' ? 'selected' : '' }}>Pending
                                                        </option>
                                                        <option value="resolved"
                                                            {{ $enquiry->status == 'resolved' ? 'selected' : '' }}>Resolved
                                                        </option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.enquiries.show', $enquiry->id) }}"
                                                    class="btn btn-sm btn-primary">View</a>
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
        <!-- /.container-fluid -->
    </section>
@endsection
