<?php 

namespace Modules\Product\Http\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;

class ProductList extends Component
{
    public function render()
    {
        $products = Product::orderBy('order')->get();

        return view('product::livewire.product-list', [
            'products' => $products,
        ])->layout('product::layouts.master');
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'Produto excluído com sucesso!');
    }
}
