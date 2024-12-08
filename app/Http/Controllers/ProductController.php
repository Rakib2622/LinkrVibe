<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a list of all products
    public function index(Request $request)
    {
        // Fetch all categories for filters
        $categories = \App\Models\ProductCategory::all();
    
        // Query for fetching products
        $query = Product::query();
    
        // Apply category filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
    
        // Apply price range filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
    
        // Fetch products for the main grid
        $products = $query->inRandomOrder()->paginate(12);
    
        // Fetch random popular products (static for simplicity)
        $popularProducts = Product::inRandomOrder()->take(4)->get();
    
        return view('frontend.products.index', compact('products', 'categories', 'popularProducts'));
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


