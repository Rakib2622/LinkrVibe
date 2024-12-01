<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // Display a list of all services
    public function index()
    {
        // $services = Service::all(); // Fetch all services from the database
        return view('services.index', compact('services')); // Pass data to the services.index view
    }

    // Display a single service based on ID
    public function show($id)
    {
        // $service = Service::findOrFail($id); // Fetch the service by ID or throw a 404 error
        return view('services.show', compact('service')); // Pass data to the services.show view
    }
}
