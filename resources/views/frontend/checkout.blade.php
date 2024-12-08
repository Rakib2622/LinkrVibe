@include('frontend.partial.header')

<div id="page-content">
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Checkout</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mb-4">
                <form action="{{ route('checkout.process') }}" method="post" class="checkout style2">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="customer_name" class="form-label"><strong>Full Name</strong></label>
                            <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="John Doe" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="customer_email" class="form-label"><strong>Email</strong></label>
                            <input type="email" id="customer_email" name="customer_email" class="form-control" placeholder="example@email.com" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="customer_phone" class="form-label"><strong>Phone</strong></label>
                            <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="+353" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="country" class="form-label"><strong>Country</strong></label>
                            <select id="country" name="country" class="form-control" required>
                                <option value="" disabled selected>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" data-shipping="{{ $country->shippingCharges->charge ?? 0 }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="city" class="form-label"><strong>City</strong></label>
                            <select id="city" name="city" class="form-control" required>
                                <option value="" disabled selected>Select City</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="zipcode" class="form-label"><strong>Eir Code</strong></label>
                            <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="10001" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="address" class="form-label"><strong>Address</strong></label>
                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="123 Main St" required></textarea>
                        </div>
                    </div>
            </div>

            <div class="col-12 col-md-4 cart__footer">
                <div class="solid-border">
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

                    <div class="row">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Shipping Charge</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right shipping-charge">
                            <span class="money">$0.00</span>
                        </span>
                    </div>

                    <div class="row">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Total</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right cart__total">
                            <span class="money">${{ number_format($subtotal, 2) }}</span>
                        </span>
                    </div>

                    <div class="cart__shipping">Shipping & taxes calculated at checkout</div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Pay with Stripe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
    document.getElementById('country').addEventListener('change', function () {
        let countryId = this.value;
        let shippingCharge = this.options[this.selectedIndex].getAttribute('data-shipping') || 0;

        // Fetch cities based on selected country
        if (countryId) {
            fetch(`/cities/${countryId}`)
                .then(response => response.json())
                .then(data => {
                    let citySelect = document.getElementById('city');
                    citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';
                    data.forEach(city => {
                        let option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching cities:', error));
        }

        // Update shipping charge and total
        document.querySelector('.shipping-charge .money').textContent = `$${parseFloat(shippingCharge).toFixed(2)}`;
        let subtotal = parseFloat(document.querySelector('.cart__total .money').textContent.replace('$', ''));
        document.querySelector('.cart__total .money').textContent = `$${(subtotal + parseFloat(shippingCharge)).toFixed(2)}`;
    });
</script>

@include('frontend.partial.footer')
