<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemCustomFieldAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class OrderController extends Controller
{
    // Show the checkout page and pass countries with shipping charges
    public function showCheckoutPage()
    {
        // Get the cart from the session
        $cart = session('cart', []);

        // Check if the cart is empty
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calculate the subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Fetch countries and their associated shipping charges
        $countries = \App\Models\Country::with('shippingCharges')->get();

        // Return the checkout view with cart, subtotal, and countries
        return view('frontend.checkout', compact('cart', 'subtotal', 'countries'));
    }


    public function getCities($countryId)
{
    $cities = City::where('country_id', $countryId)->get();
    return response()->json($cities);
}

    // Process the checkout and redirect to Stripe payment page
    public function processCheckout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'country' => 'required|exists:countries,id', // Ensure it exists in countries table
            'city' => 'required|exists:cities,id', // Ensure it exists in cities table
            'zipcode' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        // Get the cart from the session
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calculate the subtotal
        $subtotal = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        // Retrieve shipping charge based on the selected country
        $country = \App\Models\Country::find($request->country);
        $shippingCharge = $country ? $country->shippingCharges->charge : 0;

        // Calculate the total
        $total = $subtotal + $shippingCharge;

        // Save checkout details temporarily in session
        session([
            'checkout_details' => $request->only(
                'customer_name',
                'customer_email',
                'customer_phone',
                'country',
                'city',
                'zipcode',
                'address'
            ),
            'shipping_charge' => $shippingCharge, // Save shipping charge
            'subtotal' => $subtotal,
            'total' => $total,
        ]);

        // Initialize Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Prepare line items for the Stripe session
        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => $item['price'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // Add shipping charge to Stripe session
        $lineItems[] = [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Shipping Charge',
                ],
                'unit_amount' => $shippingCharge * 100,
            ],
            'quantity' => 1,
        ];

        // Create Stripe checkout session
        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('order.success'),
            'cancel_url' => route('order.failure'),
        ]);

        // Redirect to Stripe payment page
        return redirect($checkoutSession->url);
    }

    public function processCOD(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|email',
        'customer_phone' => 'required|string|max:20',
        'country' => 'required|exists:countries,id',
        'city' => 'required|exists:cities,id',
        'zipcode' => 'required|string|max:20',
        'address' => 'required|string|max:500',
    ]);

    // Get the cart from the session
    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    // Calculate the subtotal
    $subtotal = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

    // Retrieve shipping charge
    $country = \App\Models\Country::find($request->country);
    $shippingCharge = $country ? $country->shippingCharges->charge : 0;

    // Calculate total
    $total = $subtotal + $shippingCharge;

    // Save the order details
    $order = Order::create([
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone' => $request->customer_phone,
        'country_id' => $request->country,
        'city_id' => $request->city,
        'zipcode' => $request->zipcode,
        'address' => $request->address,
        'order_number' => uniqid('ORDER_'),
        'total_price' => $total,
        'status' => 'pending', // COD orders can be marked as pending initially
        'payment_details' => json_encode(['method' => 'Cash on Delivery']),
    ]);

    // Save order items
    foreach ($cart as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'custom_fields' => json_encode($item['custom_fields']),
            'price' => $item['price'],
        ]);
    }

    // Clear the session
    session()->forget('cart');
    session()->forget('checkout_details');

    return redirect()->route('products')->with('success', 'Your order has been placed successfully and will be processed soon.');
}


    // Success page after a successful order
    public function success()
    {
        $cart = session('cart', []);
        $checkoutDetails = session('checkout_details', []);
        $shippingCharge = session('shipping_charge', 0);

        if (empty($cart) || empty($checkoutDetails)) {
            return redirect()->route('cart.index')->with('error', 'Your cart or checkout details are missing.');
        }

        $subtotal = session('subtotal', 0);
        $total = session('total', $subtotal + $shippingCharge);

        // Create the order
        $order = Order::create(array_merge($checkoutDetails, [
            'country_id' => $checkoutDetails['country'], // Use the ID passed in the request
            'city_id' => $checkoutDetails['city'], // Use the ID passed in the request
            'order_number' => uniqid('ORDER_'),
            'total_price' => $total,
            'status' => 'completed',
            'payment_details' => json_encode(['method' => 'Stripe']),
        ]));

        // Save order items and custom field answers
        foreach ($cart as $item) {
            // Create OrderItem
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'custom_fields' => json_encode($item['custom_fields']),
                'price' => $item['price'],
            ]);

            // Save custom field answers for each item
            if (!empty($item['custom_fields'])) {
                foreach ($item['custom_fields'] as $fieldId => $answer) {
                    // Check if the custom field answer is a text or image
                    if (is_string($answer)) {
                        // If the answer is text, store it in 'answer_text'
                        OrderItemCustomFieldAnswer::create([
                            'order_item_id' => $orderItem->id,
                            'field_id' => $fieldId,
                            'answer_text' => $answer, // Store the answer in 'answer_text'
                        ]);
                    } elseif (is_array($answer) && isset($answer['image_path'])) {
                        // If the answer is an image, store it in 'answer_image'
                        OrderItemCustomFieldAnswer::create([
                            'order_item_id' => $orderItem->id,
                            'field_id' => $fieldId,
                            'answer_image' => $answer['image_path'], // Store the image path in 'answer_image'
                        ]);
                    }
                }
            }
        }

        // Clear the session
        session()->forget('cart');
        session()->forget('checkout_details');

        return redirect()->route('products')->with('success', 'Order placed successfully!');
    }

    // Failure page if payment fails
    public function failure()
    {
        return redirect()->route('cart.index')->with('error', 'Payment failed. Please try again.');
    }
}
