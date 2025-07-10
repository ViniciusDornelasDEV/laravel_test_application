<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Category;

class CategoryCreate extends Component
{
    public $name = '';
    public $order = 1;
    public $active = true;

    protected $rules = [
        'name' => 'required|string|max:200',
        'order' => 'required|integer|min:1',
        'active' => 'boolean',
    ];

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'order' => $this->order,
            'active' => $this->active,
        ]);

        session()->flash('success', 'Categoria cadastrada com sucesso!');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('product::livewire.category-create')->layout('product::layouts.master');
    }
}
