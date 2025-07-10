<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'order', 'active', 'category_id'];
    protected $casts = ['active' => 'boolean'];
    protected $attributes = [
        'name' => '',
        'order' => 1,
        'active' => true,
        'category_id' => null,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
