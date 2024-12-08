{{-- resources/views/admin/shipping/add-shipping-charge.blade.php --}}
@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Set Shipping Charge for {{ $country->name }}</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.shipping.addShippingCharge', $country->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="charge">Shipping Charge</label>
                    <input type="number" class="form-control" id="charge" name="charge" value="{{ $country->shippingCharges->charge ?? '' }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Save Shipping Charge</button>
            </form>
        </div>
    </div>
</div>

@include('admin.partial.footer')
