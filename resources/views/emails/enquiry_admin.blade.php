<!DOCTYPE html>
<html>

<body>
    <h2>New Enquiry Received</h2>
    <p><strong>Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Email:</strong> {{ $enquiry->email }}</p>
    <p><strong>Mobile:</strong> {{ $enquiry->mobile }}</p>
    <p><strong>Subject:</strong> {{ $enquiry->subject ?? '—' }}</p>
    <p><strong>Website:</strong> {{ $enquiry->website ?? '—' }}</p>
    @if ($enquiry->document)
        <p><strong>Document:</strong> <a href="{{ asset('uploads/enquiries/' . $enquiry->document) }}"
                target="_blank">View File</a></p>
    @endif
    <p><strong>Message:</strong></p>
    <p>{{ $enquiry->message ?? 'No message provided.' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($enquiry->status) }}</p>
    <p><strong>Enquiry On</strong> {{ now() }}</p>
</body>

</html>
