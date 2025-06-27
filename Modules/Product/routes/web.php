<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Livewire\ProductCreate;
use Modules\Product\Livewire\ProductList;
use Modules\Product\Livewire\ProductEdit;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('product', ProductController::class)->names('product');
});

Route::get('/products/create', ProductCreate::class)->name('products.create');
Route::get('/products', ProductList::class)->name('products.index');
Route::get('/products/{id}/edit', ProductEdit::class)->name('products.edit');