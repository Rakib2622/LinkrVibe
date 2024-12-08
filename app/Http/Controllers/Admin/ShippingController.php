<?php

// app/Http/Controllers/Admin/ShippingController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    // Show all countries with cities and shipping charges
    public function index()
    {
        // Fetch countries with their related cities and shipping charges
        $countries = Country::with('cities', 'shippingCharges')->get();
        return view('admin.shipping.index', compact('countries'));
    }

    // Show form to create a new country
    public function createCountry()
    {
        return view('admin.shipping.create-country');
    }

    // Store a new country
    public function storeCountry(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the new country
        Country::create($request->all());

        return redirect()->route('admin.shipping.index')->with('success', 'Country added successfully');
    }

    // Edit a country
    public function editCountry(Country $country)
    {
        return view('admin.shipping.edit-country', compact('country'));
    }

    // Update a country
    public function updateCountry(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the country
        $country->update($request->all());

        return redirect()->route('admin.shipping.index')->with('success', 'Country updated successfully');
    }

    // Delete a country
    public function destroyCountry(Country $country)
    {
        // Delete the country
        $country->delete();

        return redirect()->route('admin.shipping.index')->with('success', 'Country deleted successfully');
    }

    // Show form to add a city to a specific country
    public function showAddCityForm(Country $country)
    {
        return view('admin.shipping.add-city', compact('country'));
    }

    // Store a new city for a specific country
    public function addCity(Request $request, Country $country)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $city = new City([
        'name' => $request->name,
        'country_id' => $country->id,
    ]);

    $city->save();

    return redirect()->back()->with('success', 'City added successfully!');
}



    // Show form to add a shipping charge for a specific country
    public function showAddShippingChargeForm(Country $country)
    {
        return view('admin.shipping.add-shipping-charge', compact('country'));
    }

    // Store or update shipping charge for a specific country
    public function addShippingCharge(Request $request, Country $country)
    {
        $request->validate([
            'charge' => 'required|numeric',
        ]);

        // Add or update the shipping charge for the country
        $country->shippingCharges()->updateOrCreate([], $request->only('charge'));

        return redirect()->route('admin.shipping.index')->with('success', 'Shipping charge updated successfully');
    }
}
