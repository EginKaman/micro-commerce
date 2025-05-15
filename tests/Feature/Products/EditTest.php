<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;
use App\Livewire\Components\Admin\Product\Edit;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;

test('guests are redirected to the login page', function (): void {
    $response = $this->get(route('admin.products.edit', Product::factory()->create()));
    $response->assertRedirect(route('admin.login'));
});

test('authenticated users can visit the products', function (): void {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('admin.products.edit', Product::factory()->create()));

    $response->assertStatus(200);
});

test('product can be updated', function (): void {
    Storage::fake();

    $user = User::factory()->create();

    $product = Product::factory()->create();

    $file = UploadedFile::fake()->image('test.jpg');

    $response = Livewire::actingAs($user)
    ->test(Edit::class, ['product' => $product])
        ->set('productForm.sku', '21345')
        ->set('productForm.name', 'Test Product')
        ->set('productForm.description', 'Test Description')
        ->set('productForm.price', 100)
        ->set('productForm.quantity', 10)
        ->set('productForm.image', $file)
        ->call('save');

    $response->assertHasNoErrors();

    $product->refresh();

    $this->assertDatabaseHas('products', [
        'sku'         => '21345',
        'name'        => 'Test Product',
        'description' => 'Test Description',
        'price'       => 100,
        'quantity'    => 10,
        'image'       => "products/{$file->hashName()}",
    ]);
});
