@include('admin.partial.header')
@include('admin.partial.sideber')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Newsletter Subscribers</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <a href="{{ route('admin.newsletters.sendForm') }}" class="btn btn-primary">Send Newsletter</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newsletters as $subscriber)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>{{ $subscriber->created_at->format('Y-m-d') }}</td>
                                <td>{{ $subscriber->created_at->format('H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.footer')
