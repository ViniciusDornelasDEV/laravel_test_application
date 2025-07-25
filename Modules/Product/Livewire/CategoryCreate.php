<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Category;

class CategoryCreate extends Component
{
    public Category $category;

    protected $rules = [
        'category.name'     => 'required|string|max:200',
        'category.order'    => 'required|integer|min:1',
        'category.status'   => 'required|string|in:ativo,inativo',
    ];

    public function mount()
    {
        $this->category = new Category();
    }

    public function save()
    {
        $this->validate();

        $this->category->save();

        session()->flash('success', 'Categoria cadastrada com sucesso!');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('product::livewire.category-create')->layout('product::layouts.master');
    }
}
