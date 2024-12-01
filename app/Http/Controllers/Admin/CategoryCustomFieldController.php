<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCustomField;
use App\Models\ProductCategory;

class CategoryCustomFieldController extends Controller
{
    /**
     * Display a listing of the custom fields.
     */
    public function index()
    {
        $customFields = CategoryCustomField::with('category')->get();
        return view('admin.categoryCustomFields.index', compact('customFields'));
    }

    /**
     * Show the form for creating a new custom field.
     */
    public function create()
    {
        $categories = ProductCategory::all(); // Fetch all categories to associate with custom fields
        return view('admin.categoryCustomFields.create', compact('categories'));
    }

    /**
     * Store a newly created custom field in storage.
     */
    public function store(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'category_id' => 'required|exists:product_categories,id',
        'field_name' => 'required|string|max:255',
        'field_type' => 'required|in:text,image,url,boolean',
    ]);

    // Ensure that is_required is either true or false
    $validated['is_required'] = $request->has('is_required') ? true : false;

    // Create the custom field in the database
    CategoryCustomField::create($validated);

  

    // Redirect back to the index page with a success message
    return redirect()->route('admin.categoryCustomFields.index')->with('success', 'Custom Field created successfully.');
}



    /**
     * Display the specified custom field.
     */
    public function show($id)
    {
        $customField = CategoryCustomField::with('category')->findOrFail($id);
        return view('admin.categoryCustomFields.show', compact('customField'));
    }

    /**
     * Show the form for editing the specified custom field.
     */
    public function edit($id)
    {
        $customField = CategoryCustomField::findOrFail($id);
        $categories = ProductCategory::all();
        return view('admin.categoryCustomFields.edit', compact('customField', 'categories'));
    }

    /**
     * Update the specified custom field in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the request
    $validated = $request->validate([
        'category_id' => 'required|exists:product_categories,id',
        'field_name' => 'required|string|max:255',
        'field_type' => 'required|in:text,image,url,boolean',
    ]);

    // Ensure that is_required is either true or false
    $validated['is_required'] = $request->has('is_required') ? true : false;

    // Find the custom field to update
    $customField = CategoryCustomField::findOrFail($id);

    // Update the custom field in the database
    $customField->update($validated);

    // Redirect back to the index page with a success message
    return redirect()->route('admin.categoryCustomFields.index')->with('success', 'Custom Field updated successfully.');
}

    

    /**
     * Remove the specified custom field from storage.
     */
    public function destroy($id)
    {
        $customField = CategoryCustomField::findOrFail($id);
        $customField->delete();

        return redirect()->route('admin.categoryCustomFields.index')->with('success', 'Custom Field deleted successfully.');
    }
}
