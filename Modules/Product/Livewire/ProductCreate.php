<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;

class ProductCreate extends Component
{
    public string $name = '';
    public int $order = 1;
    public bool $active = true;

    public function render()
    {
        return view('product::livewire.product-create')
            ->layout('product::layouts.master');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|max:200',
            'order' => 'required|integer|min:1',
            'active' => 'boolean',
        ]);

        Product::create([
            'name' => $this->name,
            'order' => $this->order,
            'active' => $this->active,
        ]);

        session()->flash('message', 'Produto cadastrado com sucesso!');
        return redirect()->route('products.index');
    }
}
