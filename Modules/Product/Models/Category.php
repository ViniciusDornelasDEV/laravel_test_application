<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'products_categories';
    protected $fillable = ['name', 'order', 'status'];
    protected $attributes = [
        'status' => 'ativo',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
