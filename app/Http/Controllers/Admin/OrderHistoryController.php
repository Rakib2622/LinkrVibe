<?php


namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemCustomFieldAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderHistoryController extends Controller
{
    // Display the list of all orders
    public function index()
    {
        // Retrieve all orders with associated order items
        $orders = Order::with('orderItems.product', 'orderItems.customFields')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.order-history.index', compact('orders'));
    }

    // Display the details of a specific order
  // app/Http/Controllers/Admin/OrderHistoryController.php

public function show($orderId)
{
    $order = Order::with([
        'orderItems.product',
        'orderItems.customFields.customField', // Eager load custom fields
    ])->findOrFail($orderId);

    return view('admin.order-history.show', compact('order'));
}

}

