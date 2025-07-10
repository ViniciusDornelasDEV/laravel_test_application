<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;
use Modules\Product\Models\Category;

class ProductEdit extends Component
{
    public Product $product;
    public $categories = [];
    protected $rules = [
        'product.category_id' => 'nullable|exists:products_categories,id',
        'product.name' => 'required|string|max:200',
        'product.order' => 'required|integer|min:1',
        'product.active' => 'boolean',
    ];

    public function mount(int $id)
    {
        $this->categories = Category::where('active', 1)->orderBy('order')->get();
        $this->product = Product::findOrFail($id);
    }

    public function save()
    {
        $this->validate();
        $this->product->update();
        session()->flash('success', 'Produto atualizado com sucesso!');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('product::livewire.product-edit')->layout('product::layouts.master');
    }
}
