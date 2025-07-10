<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Livewire\ProductCreate;
use Modules\Product\Livewire\ProductList;
use Modules\Product\Livewire\ProductEdit;

use Modules\Product\Livewire\CategoryList;
use Modules\Product\Livewire\CategoryCreate;
use Modules\Product\Livewire\CategoryEdit;

Route::middleware('auth')->group(function () {
    Route::get('/products/create', ProductCreate::class)->name('products.create');
    Route::get('/products', ProductList::class)->name('products.index');
    Route::get('/products/{id}/edit', ProductEdit::class)->name('products.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/categories', CategoryList::class)->name('categories.index');
    Route::get('/categories/create', CategoryCreate::class)->name('categories.create');
    Route::get('/categories/{id}/edit', CategoryEdit::class)->name('categories.edit');
});