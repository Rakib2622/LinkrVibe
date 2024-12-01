<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Mews\Purifier\Facades\Purifier;

class AproductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'color' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        $validated['long_description'] = Purifier::clean($request->input('long_description'));
        $validated['image1'] = $request->hasFile('image1') ? $request->file('image1')->store('products', 'public') : null;
        $validated['image2'] = $request->hasFile('image2') ? $request->file('image2')->store('products', 'public') : null;

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'color' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $validated['long_description'] = Purifier::clean($request->input('long_description'));

        if ($request->hasFile('image1')) {
            if ($product->image1) Storage::disk('public')->delete($product->image1);
            $validated['image1'] = $request->file('image1')->store('products', 'public');
        }

        if ($request->hasFile('image2')) {
            if ($product->image2) Storage::disk('public')->delete($product->image2);
            $validated['image2'] = $request->file('image2')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image1) Storage::disk('public')->delete($product->image1);
        if ($product->image2) Storage::disk('public')->delete($product->image2);

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
