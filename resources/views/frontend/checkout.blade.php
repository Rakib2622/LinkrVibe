@include('frontend.partial.header')

<div id="page-content">
    <!-- Page Title -->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Checkout</h1>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="container">
        <div class="row">
            <!-- Billing Details -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                <form action="{{ route('checkout.process') }}" method="post" class="checkout style2">
                    @csrf
                    <div class="row">
                        <!-- Full Name -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="customer_name" class="form-label"><strong>Full Name</strong></label>
                            <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="John Doe" required>
                        </div>
                        <!-- Email -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="customer_email" class="form-label"><strong>Email</strong></label>
                            <input type="email" id="customer_email" name="customer_email" class="form-control" placeholder="example@email.com" required>
                        </div>
                        <!-- Phone -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="customer_phone" class="form-label"><strong>Phone</strong></label>
                            <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="+123456789" required>
                        </div>
                        <!-- Country -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="country" class="form-label"><strong>Country</strong></label>
                            <input type="text" id="country" name="country" class="form-control" placeholder="USA" required>
                        </div>
                        <!-- City -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="city" class="form-label"><strong>City</strong></label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="New York" required>
                        </div>
                        <!-- Zip Code -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="zipcode" class="form-label"><strong>Zip Code</strong></label>
                            <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="10001" required>
                        </div>
                        <!-- Address -->
                        <div class="col-12 mb-3">
                            <label for="address" class="form-label"><strong>Address</strong></label>
                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="123 Main St" required></textarea>
                        </div>
                    </div>
            </div>

            <!-- Order Summary -->
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                <div class="solid-border">
                    <!-- Product Table -->
                    <h3>Product Summary</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>${{ number_format($item['price'], 2) }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Subtotal -->
                    <div class="row">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                            <span class="money">${{ number_format($subtotal, 2) }}</span>
                        </span>
                    </div>

                    <div class="cart__shipping">Shipping & taxes calculated at checkout</div>

                    <!-- Checkout Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@include('frontend.partial.footer')
