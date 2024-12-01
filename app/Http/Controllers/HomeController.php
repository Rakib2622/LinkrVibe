<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    // Fetch all categories along with their products
    $categories = ProductCategory::with('products')->get();

    // Pass categories and products to the view
    return view('frontend.dashboard', compact('categories'));
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
