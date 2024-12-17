@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">View Contact Message</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <h4>{{ $contact->subject }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Phone:</strong> {{ $contact->phone ?? 'N/A' }}</p>
                    <p><strong>Message:</strong></p>
                    <p>{{ $contact->message }}</p>
                </div>
            </div>

            <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="post" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="reply" class="form-label"><strong>Reply:</strong></label>
                    <textarea id="reply" name="reply" class="form-control" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Send Reply</button>
            </form>
        </div>
    </div>
</div>

@include('admin.partial.footer')
