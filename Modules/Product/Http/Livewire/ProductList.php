<?php 
namespace Modules\Product\Http\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;

class ProductList extends Component
{
    public function render()
    {
        $products = Product::orderBy('order')->get();

        return view('product::livewire.product-list', compact('products'))->layout('layouts.app');
    }
}
