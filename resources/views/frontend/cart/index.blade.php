@include('frontend.partial.header')


<div id="page-content">
    <!-- Page Title -->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Your cart</h1>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- End Page Title -->
    <div class="container">
        <div class="row">
            <!-- Cart Table -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                <form action="{{ route('cart.update') }}" method="post" class="cart style2">
                    @csrf
                    <table>
                        <thead class="cart__row cart__header">
                            <tr>
                                <th colspan="2" class="text-center">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Total</th>
                                <th class="action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <!-- Product Image -->
                                    <td class="cart__image-wrapper cart-flex-item">
                                        @if(!empty($item['image']))
                                        <a href="#">
                                            <img class="cart__image" 
                                                 src="{{ asset('storage/' . $item['image']) }}" 
                                                 alt="{{ $item['name'] }}" 
                                                 class="img-fluid mb-3 primary-image">
                                        </a>
                                        @else
                                            <span>No image available</span>
                                        @endif
                                    </td>
                                  
                                    <!-- Product Details -->
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">{{ $item['name'] }}</a>
                                        </div>
                                        <div class="cart__meta-text">
                                            @foreach ($item['custom_fields'] as $field_id => $value)
                                                @php
                                                    $field = \App\Models\CategoryCustomField::find($field_id);
                                                @endphp
                                                <p>
                                                    <strong>{{ $field->field_name }}:</strong> 
                                                    @if ($field->field_type === 'image')
                                                        <img src="{{ asset('storage/' . $value) }}" alt="{{ $field->field_name }}" width="50">
                                                    @elseif ($field->field_type === 'boolean')
                                                        {{ $value ? 'Yes' : 'No' }}
                                                    @else
                                                        {{ $value }}
                                                    @endif
                                                </p>
                                            @endforeach
                                        </div>
                                    </td>
                                    <!-- Product Price -->
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">${{ number_format($item['price'], 2) }}</span>
                                    </td>
                                    <!-- Quantity Update -->
                                    <td class="cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <button type="button" class="qtyBtn minus" onclick="updateQuantity('{{ $item['id'] }}', -1)">-</button>
                                                <input class="cart__qty-input qty" type="number" name="quantities[{{ $item['id'] }}]" value="{{ $item['quantity'] }}" min="1">
                                                <button type="button" class="qtyBtn plus" onclick="updateQuantity('{{ $item['id'] }}', 1)">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Total Price -->
                                    <td class="text-right small--hide cart-price">
                                        <div>
                                            <span class="money">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                        </div>
                                    </td>
                                    <!-- Remove Button -->
                                    <td class="text-center small--hide">
                                        <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn--secondary cart__remove" title="Remove item">
                                            <i class="icon icon anm anm-times-l"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- Footer -->
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-left">
                                    <a href="{{ route('products') }}" class="btn--link cart-continue">
                                        <i class="icon icon-arrow-circle-left"></i> Continue shopping
                                    </a>
                                </td>
                                <td colspan="3" class="text-right">
                                    <button type="submit" class="btn--link cart-update">
                                        <i class="fa fa-refresh"></i> Update Cart
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                <div class="currencymsg">We process all orders in USD. Shipping and taxes calculated at checkout.</div>
                <hr>
            </div>
            <!-- Checkout Section -->
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                <div class="solid-border">
                    <div class="row">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                            <span class="money">${{ number_format($subtotal, 2) }}</span>
                        </span>
                    </div>
                    <div class="cart__shipping">Shipping & taxes calculated at checkout</div>
                    <!-- Checkout Form -->
                    <div class="text-center">
                        <a href="{{ route('checkout.page') }}" class="btn btn-primary">Proceed to Payment</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.partial.footer')


