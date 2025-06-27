<?php 

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::orderBy('order')->paginate(10);

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
