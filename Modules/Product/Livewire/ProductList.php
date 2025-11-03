<?php 

namespace Modules\Product\Livewire;

use Livewire\Component;
use Modules\Product\Models\Product;
use Modules\Product\Models\Category;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    public $categories = [];
    public $selectedCategoryId = null;
    
    public function mount()
    {
        $this->categories = Category::where('status', 'ativo')->orderBy('order')->get();
        $this->selectedCategoryId = request('category_id') ?? $this->categories->first()->id ?? null;
    }

    public function render()
    {
        $query = Product::orderBy('order');
        if ($this->selectedCategoryId) {
            $query->where('category_id', $this->selectedCategoryId);
        }
        $products = $query->paginate(10);
        return view('product::livewire.product-list', [
            'products' => $products,
            'categories' => $this->categories,
            'selectedCategoryId' => $this->selectedCategoryId,
        ])->layout('product::layouts.master');
    }


    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'Produto excluído com sucesso!');
        $this->render();
    }
}
