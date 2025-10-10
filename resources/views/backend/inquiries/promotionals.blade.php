@extends('layouts.backend.app')
@section('title', 'Promotional Enquiries')

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
                                        <th>Client Name</th>
                                        <th>Email(s)</th>
                                        <th>Phone No.</th>
                                        <th>Messages</th>
                                        <th>Received At</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquries as $index => $enquiry)
                                        <tr>
                                            <td>{{ $index + 1 }} </td>
                                            <td>{{ $enquiry['name'] }} </td>
                                            <td>{{ $enquiry['email'] }}</td>
                                            <td>{{ $enquiry['mobile'] }}</td>
                                            <td class="message">{{ $enquiry['message'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($enquiry['created_at'])->format('d M Y, h:i A') }}</td>
                                            {{-- <td>
                                                <a href="#" class="btn btn-sm btn-success">Read</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot> --}}
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
@endsection
