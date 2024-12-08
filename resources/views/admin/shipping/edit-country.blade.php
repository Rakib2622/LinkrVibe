{{-- resources/views/admin/shipping/edit-country.blade.php --}}
@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Edit Country: {{ $country->name }}</h1>

            <form action="{{ route('admin.shipping.updateCountry', $country->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Country Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $country->name }}" required>
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>

@include('admin.partial.footer')
