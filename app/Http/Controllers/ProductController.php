<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a list of all products
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('frontend.products.index', compact('products')); // Pass data to the products.index view
    }

    // Display a single product based on ID
    public function show($id)
    {
        // Fetch the product along with its category and custom fields
        $product = Product::with('category.customFields')->findOrFail($id);

        // Fetch similar products from the same category (excluding the current product)
        $similarProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(4) // Limit the number of similar products to display
            ->get();

        return view('frontend.products.show', compact('product', 'similarProducts'));
    }
}


