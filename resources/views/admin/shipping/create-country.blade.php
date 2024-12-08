{{-- resources/views/admin/shipping/create-country.blade.php --}}
@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Add New Country</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.shipping.storeCountry') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Country Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </form>
        </div>
    </div>
</div>

@include('admin.partial.footer')
