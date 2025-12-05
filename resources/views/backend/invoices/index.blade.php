@extends('layouts.backend.app')
@section('title', 'All Quotations')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Quotations</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Quotations</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- Add New -->
            <div class="mb-3 text-right">
                <a href="{{ url('/add-invoice') }}" class="btn btn-primary">
                    + Create New Quotation
                </a>
            </div>

            <!-- Listing Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quotation List</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-bordered table-striped text-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Quotation No.</th>
                                <th>Customer</th>
                                <th>Issue Date</th>
                                <th>Total ({{ $invoices->first()->currency ?? 'INR' }})</th>
                                <th>Status</th>
                                <th style="width:180px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $key => $invoice)
                                <tr>
                                    <td>{{ $invoices->firstItem() + $key }}</td>
                                    <td><strong>{{ $invoice->number }}</strong></td>
                                    <td>{{ $invoice->customer_name }}</td>
                                    <td>{{ $invoice->issue_date ? $invoice->issue_date->format('d M Y') : '—' }}</td>
                                    <td>{{ number_format($invoice->total, 2) }}</td>
                                    <td>
                                        @if($invoice->status == 'draft')
                                            <span class="badge badge-warning">Draft</span>
                                        @elseif($invoice->status == 'sent')
                                            <span class="badge badge-info">Sent</span>
                                        @elseif($invoice->status == 'paid')
                                            <span class="badge badge-success">Paid</span>
                                        @else
                                            <span class="badge badge-secondary">{{ ucfirst($invoice->status) }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ url('/view-invoice/' . $invoice->id) }}" class="btn btn-sm btn-primary">
                                            View
                                        </a>

                                        <a href="{{ route('invoices.pdf.download', $invoice->id) }}"
                                           class="btn btn-sm btn-secondary" target="_blank">
                                            PDF
                                        </a>

                                        <a href="{{ url('/edit-invoice/' . $invoice->id) }}"
                                           class="btn btn-sm btn-info">
                                            Edit
                                        </a>

                                        <a href="{{ url('/delete-invoice/' . $invoice->id) }}"
                                           onclick="return confirm('Do you really want to delete this quotation?')"
                                           class="btn btn-sm btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center p-4">No quotations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        {{ $invoices->links() }}
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
