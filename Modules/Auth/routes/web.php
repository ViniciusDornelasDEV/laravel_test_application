<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Controllers\AuthController;
use Modules\Auth\Livewire\Login;
use Modules\Auth\Livewire\ResetPassword;
use Modules\Auth\Livewire\Profile;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('auth', AuthController::class)->names('auth');
});

Route::get('/login', Login::class)->name('login');
Route::get('/reset-password', ResetPassword::class)->name('password.request');
Route::get('/profile', Profile::class)->name('profile');
Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');

