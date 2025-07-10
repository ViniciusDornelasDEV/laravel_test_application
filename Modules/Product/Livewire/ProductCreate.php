<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;
use Modules\Product\Models\Category;

class ProductCreate extends Component
{
    public Product $product;
    public $categories = [];
    protected $rules = [
        'product.category_id' => 'nullable|exists:products_categories,id',
        'product.name' => 'required|string|max:200',
        'product.order' => 'required|integer|min:1',
        'product.active' => 'boolean',
    ];

    public function mount()
    {
        $this->categories = Category::where('active', 1)->orderBy('order')->get();
        $this->product = new Product();
    }

    public function render()
    {
        return view('product::livewire.product-create')
            ->layout('product::layouts.master');
    }

    public function save()
    {
        $this->validate();
        $this->product->save();

        session()->flash('message', 'Produto cadastrado com sucesso!');
        return redirect()->route('products.index');
    }
}
