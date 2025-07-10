<?php

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Category;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = Category::orderBy('order')->paginate(10);

        return view('product::livewire.category-list', [
            'categories' => $categories,
        ])->layout('product::layouts.master');
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('success', 'Categoria excluída com sucesso!');
    }
}
