{{-- resources/views/admin/shipping/index.blade.php --}}
@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Shipping Details</h1>
            <a href="{{ route('admin.shipping.createCountry') }}" class="btn btn-primary mb-3">Add Country</a>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Country</th>
                            <th>Cities</th>
                            <th>Shipping Charge</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $country->name }}</td>
                                <td>
                                    <select class="form-select" aria-label="Cities" name="city">
                                        <option value="" disabled selected>Select City</option>
                                        @foreach ($country->cities as $city)
                                            <option >{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    @if ($country->shippingCharges)
                                    €{{ $country->shippingCharges->charge }}
                                    @else
                                        <span class="text-danger">Not set</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.shipping.editCountry', $country->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.shipping.destroyCountry', $country->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    {{-- Add City and Add Shipping Charge buttons inside the loop --}}
                                    <a href="{{ route('admin.shipping.addCity', $country->id) }}" class="btn btn-info btn-sm mb-2">Add City</a>
                                    <a href="{{ route('admin.shipping.addShippingCharge', $country->id) }}" class="btn btn-warning btn-sm mb-2">Add Shipping Charge</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.footer')
