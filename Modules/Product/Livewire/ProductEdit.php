<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;
use Modules\Product\Models\Category;

class ProductEdit extends Component
{
    public Product $product;
    public $categories = [];
    public $sales_locations = [];
    public $photo;

    protected $rules = [
        'product.category_id'       => 'nullable|exists:products_categories,id',
        'product.name'              => 'required|string|max:200',
        'product.order'             => 'required|integer|min:1',
        'product.code'              => 'required|integer',
        'product.price'             => 'required|numeric|min:0',
        'sales_locations'           => 'array', 
        'sales_locations.*'         => 'in:Caixa,Site,App,Ifood',
        'product.description'       => 'nullable|string',
        'photo'                     => 'nullable|image|max:2048',
        'product.status'            => 'required|string|in:ativo,inativo',
    ];


    public function mount(int $id)
    {
        $this->categories = Category::where('active', 1)->orderBy('order')->get();
        $this->product = Product::findOrFail($id);
        $this->sales_locations = $this->product->sales_locations ?? [];
    }

    public function render()
    {
        return view('product::livewire.product-edit')->layout('product::layouts.master');
    }

    public function save()
    {
        $this->validate();
        $this->product->sales_locations = $this->sales_locations;
        if ($this->photo) {
            $this->product->photo = $this->photo->store('products', 'public');
        }
        $this->product->update();
        session()->flash('success', 'Produto atualizado com sucesso!');
        return redirect()->route('products.index', ['category_id' => $this->product->category_id]);
    }


}
