@include('admin.partial.header')
@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1>Order Details - {{ $order->order_number }}</h1>

            <h3>Customer Details</h3>
            <p><strong>Name:</strong> {{ $order->customer_name }}</p>
            <p><strong>Email:</strong> {{ $order->customer_email }}</p>
            <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>Country:</strong> {{ $order->country->name ?? 'N/A' }}</p>
            <p><strong>City:</strong> {{ $order->city->name ?? 'N/A' }}</p>
            <p><strong>Zipcode:</strong> {{ $order->zipcode }}</p>

            <h3>Order Items</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Custom Fields</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>€{{ number_format($item->price, 2) }}</td>
                            <td>€{{ number_format($item->price * $item->quantity, 2) }}</td>
                            <td>
                                @foreach ($item->customFields as $customFieldAnswer)
                                    <p><strong>{{ $customFieldAnswer->customField->field_name }}:</strong>
                                        @if ($customFieldAnswer->answer_text)
                                            {{-- Check if answer_text starts with "custom_fields/" --}}
                                            @if (str_starts_with($customFieldAnswer->answer_text, 'custom_fields/'))
                                                {{-- Display image if it starts with custom_fields/ --}}
                                                <img src="{{ asset('storage/' . $customFieldAnswer->answer_text) }}" alt="Image" width="100">
                                            @else
                                                {{-- Display text if it doesn't start with custom_fields/ --}}
                                                {{ $customFieldAnswer->answer_text }}
                                            @endif
                                        @else
                                            <span>No answer provided</span>
                                        @endif
                                    </p>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Order Summary</h3>
            <p><strong>Total Price:</strong> €{{ number_format($order->total_price, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

            <a href="{{ route('admin.order-history') }}" class="btn btn-primary">Back to Order History</a>
        </div>
    </div>
</div>

@include('admin.partial.footer')
