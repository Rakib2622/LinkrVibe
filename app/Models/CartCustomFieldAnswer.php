<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartCustomFieldAnswer extends Model
{
    use HasFactory;

    // Define the table name if it's not automatically inferred
    protected $table = 'cart_custom_field_answers';

    // Fillable properties for mass assignment
    protected $fillable = ['cart_id', 'field_id', 'answer_text', 'answer_image'];

    // Relationships
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function field()
    {
        return $this->belongsTo(CategoryCustomField::class, 'field_id');
    }
}
