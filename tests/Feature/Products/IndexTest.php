<?php

declare(strict_types=1);

use App\Livewire\Components\Admin\Product\Index;
use App\Models\Product;
use App\Models\User;

test('guests are redirected to the login page', function (): void {
    $response = $this->get(route('admin.products.index'));
    $response->assertRedirect(route('admin.login'));
});

test('authenticated users can visit the products', function (): void {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('admin.products.index'));

    $response->assertStatus(200);
});

test('products pagination successfully render', function (): void {
    $user = User::factory()->create();

    Product::factory()->count(100)->create();

    Livewire::actingAs($user)
        ->test(Index::class)
        ->assertStatus(200)
        ->assertSee('paginator-page');
});
