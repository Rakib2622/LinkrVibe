<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCustomField extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'field_name', 'field_type', 'is_required'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}

