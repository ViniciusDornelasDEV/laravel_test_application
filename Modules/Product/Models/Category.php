<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'products_categories';
    protected $fillable = ['name', 'order', 'active'];
    protected $casts = ['active' => 'boolean'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
