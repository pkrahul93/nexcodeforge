@extends('layouts.backend.app')
@section('title', 'Pending Tickets')

@section('content')
    @php
        // dd($tickets);
    @endphp

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
                        <li class="breadcrumb-item active">All Pending Tickets</li>
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
                            <h3 class="card-title">All Pending Tickets</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Ticket No</th>
                                        <th>Client</th>
                                        <th>Subject</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Attachment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><b>{{ $ticket->ticket_no ?? '—' }}</b></td>
                                            <td>
                                                {{ $ticket->name }}<br>
                                                <small>{{ $ticket->email }}</small><br>
                                                <small>{{ $ticket->mobile }}</small>
                                            </td>
                                            <td>{{ $ticket->subject ?? '—' }}</td>
                                            <td><span
                                                    class="badge bg-{{ $ticket->priority == 'high' ? 'danger' : ($ticket->priority == 'medium' ? 'warning' : 'success') }}">{{ ucfirst($ticket->priority) }}</span>
                                            </td>
                                            <td>
                                                <select class="form-control status-select" data-id="{{ $ticket->id }}">
                                                    <option value="open"
                                                        {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                                    <option value="in_progress"
                                                        {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In
                                                        Progress</option>
                                                    <option value="resolved"
                                                        {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved
                                                    </option>
                                                </select>
                                            </td>
                                            <td>{{ $ticket->created_at->format('d M Y, h:i A') }}</td>
                                            <td>
                                                @if ($ticket->attachment)
                                                    <a href="{{ asset('storage/' . $ticket->attachment) }}"
                                                        target="_blank">View</a>
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>

                                                <form action="{{ route('tickets.delete', $ticket->id) }}" method="POST">
                                                    <a href="{{ route('tickets.show', $ticket->id) }}"
                                                        class="btn btn-sm btn-primary">View</a>&nbsp;
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete this ticket?')">Delete</button>
                                                </form>
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
            {{ $tickets->links() }}
        </div>
        <!-- /.container-fluid -->
    </section>


    <script>
document.querySelectorAll('.status-select').forEach(select => {
    select.addEventListener('change', function() {
        fetch(`/support-tickets/${this.dataset.id}/status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ status: this.value })
        }).then(res => res.json())
          .then(data => {
              if(data.success) alert('Status updated successfully!');
          });
    });
});
</script>

@endsection
