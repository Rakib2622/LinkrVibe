<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all categories along with their products
        $categories = ProductCategory::with('products')->get();

        // Fetch best-selling products
        $bestSellingProducts = Product::inRandomOrder()
            ->take(5) // Fetch 5 random products
            ->get();

        // Pass categories, products, and best-selling products to the view
        return view('frontend.dashboard', compact('categories', 'bestSellingProducts'));
    }
    

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function terms(){
        return view('frontend.terms');
    }

    public function privacy(){
        return view('frontend.privacy');
    }

    public function support(){
        return view('frontend.support');
    }
}
