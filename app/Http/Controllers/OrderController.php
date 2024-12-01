<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemCustomFieldAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class OrderController extends Controller
{
    // Checkout and redirect to Stripe payment page


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

    // Return the checkout view with cart and subtotal
    return view('frontend.checkout', compact('cart', 'subtotal'));
}

    public function processCheckout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100', 
            'zipcode' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

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
        ]);

        // Redirect to Stripe payment page
        Stripe::setApiKey(env('STRIPE_SECRET'));

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

        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('order.success'),
            'cancel_url' => route('order.failure'),
        ]);

        return redirect($checkoutSession->url);
    }

    // Success page
    public function success()
    {
        $cart = session('cart', []);
        $checkoutDetails = session('checkout_details', []);

        if (empty($cart) || empty($checkoutDetails)) {
            return redirect()->route('cart.index')->with('error', 'Your cart or checkout details are missing.');
        }

        $subtotal = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        // Create the order
        $order = Order::create(array_merge($checkoutDetails, [
            'order_number' => uniqid('ORDER_'),
            'total_price' => $subtotal,
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

    // Failure page
    public function failure()
    {
        return redirect()->route('cart.index')->with('error', 'Payment failed. Please try again.');
    }
}
