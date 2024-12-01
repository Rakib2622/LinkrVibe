<?php

// app/Models/OrderItemCustomFieldAnswer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemCustomFieldAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_item_id', 
        'field_id', 
        'answer_text', 
        'answer_image'
    ];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function customField()
    {
        return $this->belongsTo(CategoryCustomField::class, 'field_id');
    }
}

