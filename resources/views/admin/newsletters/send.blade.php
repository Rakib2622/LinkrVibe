@include('admin.partial.header')
@include('admin.partial.sideber')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Send Newsletter</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.newsletters.send') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Send to All</button>
            </form>
        </div>
    </div>
</div>

@include('admin.partial.footer')
