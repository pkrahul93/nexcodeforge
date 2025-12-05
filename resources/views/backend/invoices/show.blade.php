@extends('layouts.backend.app')
@section('title', 'Show Invoice')

@php
    // dd($invoice);
@endphp
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Invoice #{{ $invoice->number ?? '—' }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">All Quotations</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

            {{-- Top actions + basic info --}}
            <div class="row mb-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5>Invoice details</h5>
                            <p class="mb-1"><strong>Number:</strong> {{ $invoice->number }}</p>
                            <p class="mb-1"><strong>Issue Date:</strong> {{ optional($invoice->issue_date)->format('d M Y') }}</p>
                            <p class="mb-1"><strong>Due Date:</strong> {{ optional($invoice->due_date)->format('d M Y') ?? '—' }}</p>

                            <hr>

                            <h6>Bill To</h6>
                            <p class="mb-1"><strong>{{ $invoice->customer_name }}</strong></p>
                            @if($invoice->customer_email)<p class="mb-1">Email: {{ $invoice->customer_email }}</p>@endif
                            @if($invoice->customer_phone)<p class="mb-1">Phone: {{ $invoice->customer_phone }}</p>@endif
                            @if($invoice->customer_address)<p class="mb-1">{!! nl2br(e($invoice->customer_address)) !!}</p>@endif
                        </div>
                        <div class="card-footer">
                            <div class="btn-group" role="group" aria-label="Invoice actions">
                                <a href="{{ url('/invoice/'.$invoice->id.'/pdf/view') }}" class="btn btn-secondary" target="_blank" onclick="window.open('{{ route('invoices.pdf.view', $invoice->id) }}', '_blank')">
                                    View PDF
                                </a>&nbsp;&nbsp;

                                <a href="{{ route('invoices.pdf.download', $invoice->id) }}" class="btn btn-primary">
                                    Download PDF
                                </a>&nbsp;&nbsp;

                                <a href="{{ url('/add-invoice/'.$invoice->id) }}" class="btn btn-info">
                                    Edit
                                </a>&nbsp;&nbsp;

                                <form action="{{ url('/delete-invoice/'.$invoice->id) }}" method="GET" style="display:inline-block;"
                                      onsubmit="return confirm('Are you sure you want to delete this invoice?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                                <form action="{{ url('/invoice/'.$invoice->id.'/send-email') }}" method="POST" style="display:inline-block; margin-left:6px;">
                                    @csrf
                                    <button type="submit" class="btn btn-success"
                                            onclick="return confirm('Send invoice to {{ $invoice->customer_email ?: 'customer' }}?')">
                                        Send Email
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Totals card --}}
                <div class="col-md-4">
                    <div class="card card-outline card-secondary">
                        <div class="card-body">
                            <h6>Amounts</h6>
                            <p class="mb-1"><strong>Subtotal:</strong> {{ number_format($invoice->subtotal, 2) }} {{ $invoice->currency ?? '' }}</p>
                            <p class="mb-1"><strong>Tax:</strong> {{ number_format($invoice->tax, 2) }}</p>
                            @if($invoice->discount > 0)
                                <p class="mb-1"><strong>Discount:</strong> -{{ number_format($invoice->discount, 2) }}</p>
                            @endif
                            <hr>
                            <p class="mb-0"><strong>Total: </strong> <span class="h5">{{ number_format($invoice->total, 2) }}</span></p>
                            <p class="mt-2"><strong>Status: </strong>
                                @if($invoice->status == 'draft')
                                    <span class="badge badge-warning">Draft</span>
                                @elseif($invoice->status == 'sent')
                                    <span class="badge badge-info">Sent</span>
                                @elseif($invoice->status == 'paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($invoice->status) }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Items Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Items</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:5%;">#</th>
                                        <th>Description</th>
                                        <th style="width:10%;">Qty</th>
                                        <th style="width:15%;">Unit Price</th>
                                        <th style="width:15%;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoice->items as $i => $item)
                                        <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->unit_price,2) }}</td>
                                            <td>{{ number_format($item->amount,2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            {{-- PDF Viewer --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Invoice PDF</h3>
                        </div>
                        <div class="card-body p-0">
                            @php
                                $pdfUrl = null;
                                if (!empty($invoice->pdf_path) && Storage::disk('public')->exists($invoice->pdf_path)) {
                                    $pdfUrl = Storage::disk('public')->url($invoice->pdf_path);
                                } else {
                                    $pdfUrl = route('invoices.pdf.view', ['id' => $invoice->id]);
                                }
                                // dd($pdfUrl);
                            @endphp

                            <div style="height:700px;">
                                <object data="{{ $pdfUrl }}" type="application/pdf" width="100%" height="100%">
                                    <iframe src="{{ $pdfUrl }}" width="100%" height="100%" style="border:none;">
                                        This browser does not support PDFs. Please <a href="{{ route('invoices.pdf.download', $invoice->id) }}">download the PDF</a> to view it.
                                    </iframe>
                                </object>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">If the PDF doesn't display, try downloading it: <a href="{{ route('invoices.pdf.download', $invoice->id) }}">Download PDF</a></small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
