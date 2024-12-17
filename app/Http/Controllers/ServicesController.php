<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // Display a list of all services
    public function index()
    {
        
        return view('frontend.services.index');
    }

    public function digitalMenuBoard()
{
    $galleryImages = [
        '/home/assets/images/dmb/digitalboard/1.png',
        '/home/assets/images/dmb/digitalboard/2.png',
        '/home/assets/images/dmb/digitalboard/3.png',
        '/home/assets/images/dmb/digitalboard/4.png',
        '/home/assets/images/dmb/digitalboard/5.png',
        '/home/assets/images/dmb/digitalboard/6.png',
    ];

    $testimonials = [
        ['message' => 'Great service!', 'name' => 'John Doe'],
        ['message' => 'My customers love the new menu board!', 'name' => 'Jane Smith'],
        ['message' => 'Highly recommended!', 'name' => 'Alex Brown']
    ];

    return view('frontend.services.digital-menu-board', compact('galleryImages', 'testimonials'));
}


    public function googleReviewCard()
    {
        return view('frontend.services.google-review-card');
    }

    public function nfcBusinessCard()
    {
        return view('frontend.services.nfc-business-card');
    }

    public function qrMenuRestaurantPos()
    {
        $galleryImages = [
            '/home/assets/images/dmb/digitalboard/1.png',
            '/home/assets/images/dmb/digitalboard/2.png',
            '/home/assets/images/dmb/digitalboard/3.png',
            '/home/assets/images/dmb/digitalboard/4.png',
            '/home/assets/images/dmb/digitalboard/5.png',
            '/home/assets/images/dmb/digitalboard/6.png',
        ];
    
        $testimonials = [
            ['message' => 'Great service!', 'name' => 'John Doe'],
            ['message' => 'My customers love the new menu board!', 'name' => 'Jane Smith'],
            ['message' => 'Highly recommended!', 'name' => 'Alex Brown']
        ];
        return view('frontend.services.qr-menu-restaurant-pos' , compact('galleryImages', 'testimonials'));
    }


}
