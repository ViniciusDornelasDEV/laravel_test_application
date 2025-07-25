<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Models\Product;
use Modules\Product\Models\Category;

class ProductCreate extends Component
{
    use WithFileUploads;

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
        'product.sales_locations'   => 'array', 
        'product.sales_locations.*' => 'in:Caixa,Site,App,Ifood',
        'product.description'       => 'nullable|string',
        'photo'                     => 'nullable|image|max:2048',
        'product.status'            => 'required|string|in:ativo,inativo',
    ];

    public function mount()
    {
        $this->sales_locations = $this->product->sales_locations ?? [];
        $this->categories = Category::where('active', 1)->orderBy('order')->get();
        $this->product = new Product();
        $this->product->category_id = request('category_id');
        $this->product->order = Product::where('category_id', $this->product->category_id)->max('order') + 1;
    }

    public function render()
    {
        return view('product::livewire.product-create')
            ->layout('product::layouts.master');
    }

    public function save()
    {
        $this->validate();
        $this->product->sales_locations = $this->sales_locations;
        if ($this->photo) {
            $this->product->photo = $this->photo->store('products', 'public');
        }
        $this->product->save();
        
        session()->flash('message', 'Produto cadastrado com sucesso!');
        return redirect()->route('products.index', ['category_id' => $this->product->category_id]);
    }
}
