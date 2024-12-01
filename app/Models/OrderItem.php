<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'custom_fields', 'price'];

    protected $casts = [
        'custom_fields' => 'array', // Automatically decode JSON
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customFields()
    {
        return $this->hasMany(OrderItemCustomFieldAnswer::class);
    }
}

