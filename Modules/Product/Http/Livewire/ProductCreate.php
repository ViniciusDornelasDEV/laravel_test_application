<?php

namespace Modules\Product\Http\Livewire;

use Livewire\Component;

class ProductCreate extends Component
{
    public function render()
    {
        return view('product::livewire.product-create')
            ->layout('layouts.app');
    }
}
