<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;
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

    public function submitContact(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save data to database
        Contact::create($request->only('name', 'email', 'phone', 'subject', 'message'));

        // Redirect back with success message
        return back()->with('success', 'Your message has been sent successfully. We will get back to you shortly!');
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
