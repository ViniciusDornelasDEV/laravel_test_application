<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'active',
        'category_id',
        'code',
        'price',
        'sales_locations',
        'description',
        'photo',
    ];

    protected $casts = [
        'active' => 'boolean',
        'price' => 'float',
        'sales_locations' => 'array',
    ];

    protected $attributes = [
        'name' => '',
        'order' => 1,
        'active' => true,
        'category_id' => null,
        'code' => null,
        'price' => 0.00,
        'sales_locations' => '[]',
        'description' => '',
        'photo' => null,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
