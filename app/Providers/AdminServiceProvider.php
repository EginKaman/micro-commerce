<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Route::group([
            'prefix'     => 'admin',
            'as'         => 'admin.',
            'middleware' => 'web',
        ], function (): void {
            $this->loadRoutesFrom(base_path('routes/admin.php'));
        });
    }
}
