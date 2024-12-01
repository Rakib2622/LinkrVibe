<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add product to the cart
    public function addToCart(Request $request, Product $product)
    {
        // Retrieve the cart from the session, or initialize an empty array
        $cart = Session::get('cart', []);
    
        $customFields = $request->input('custom_fields', []);
    
        // Handle file uploads in custom fields
        foreach ($request->file('custom_fields', []) as $field_id => $file) {
            if ($file->isValid()) {
                // Store the file and save its path
                $customFields[$field_id] = $file->store('custom_fields', 'public');
            }
        }
    
        // Use image1 as the default image or image2 as a fallback
        $productImage = $product->image1;
    
        // Build the cart item with product details and custom fields
        $cartItem = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->input('quantity', 1),
            'custom_fields' => $customFields, // Custom field answers (text/image paths)
            'image' => $productImage, // Ensure the image key exists
        ];
    
        // Add the item to the cart (using product ID as the key)
        $cart[$product->id] = $cartItem;
    
        // Save the updated cart back to the session
        Session::put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

//     public function addToCart(Request $request, Product $product)
// {
//     dd($request->all());  
//     dd(session()->get('cart'));
// }
    



    // Show the cart
    public function show()
    {
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);
    
        // Calculate the subtotal (sum of price * quantity for all items in the cart)
        $subtotal = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    
        // Pass the cart and subtotal to the view
        return view('frontend.cart.index', compact('cart', 'subtotal'));
    }
    

    public function updateCart(Request $request)
{
    $cart = Session::get('cart', []);

    foreach ($request->input('quantities', []) as $id => $quantity) {
        if (isset($cart[$id]) && $quantity > 0) {
            $cart[$id]['quantity'] = $quantity;
        }
    }

    Session::put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
}
public function removeFromCart($id)
{
    $cart = Session::get('cart', []);
    unset($cart[$id]);
    Session::put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Item removed successfully!');
}

}
