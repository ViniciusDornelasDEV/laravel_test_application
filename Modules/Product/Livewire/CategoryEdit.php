<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Category;

class CategoryEdit extends Component
{
    public Category $category;

    protected $rules = [
        'category.name' => 'required|string|max:200',
        'category.order' => 'required|integer|min:1',
        'category.status'   => 'required|string|in:ativo,inativo',
    ];

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);
    }

    public function save()
    {
        $this->validate();
        $this->category->save();

        session()->flash('success', 'Categoria atualizada com sucesso!');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('product::livewire.category-edit')->layout('product::layouts.master');
    }
}
