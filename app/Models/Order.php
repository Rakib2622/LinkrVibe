<?php

// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'customer_email', 'customer_phone', 'country', 'city', 'zipcode', 
        'address', 'order_number', 'total_price', 'status', 'payment_details'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
