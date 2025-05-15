<?php

declare(strict_types=1);

use App\Livewire\Components\Web\Catalog;
use App\Livewire\Components\Web\Checkout;
use Illuminate\Support\Facades\Route;

Route::get('/', Catalog::class)->name('home');
Route::get('/checkout', Checkout::class)->name('checkout');
