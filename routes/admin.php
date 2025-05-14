<?php

declare(strict_types=1);

use App\Livewire\Components\Order\Index as OrderIndex;
use App\Livewire\Components\Order\Show as OrderShow;
use App\Livewire\Components\Product\Create;
use App\Livewire\Components\Product\Edit;
use App\Livewire\Components\Product\Index as ProductIndex;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function (): void {
    Route::group(['prefix' => 'products', 'as' => 'products.'], static function (): void {
        Route::get('/', ProductIndex::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{product}/edit', Edit::class)->name('edit');
    });
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], static function (): void {
        Route::get('/', OrderIndex::class)->name('index');
        Route::get('/{order}', OrderShow::class)->name('show');
    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
