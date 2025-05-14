<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'sku'         => fake()->ean8(),
            'name'        => fake()->words(3, true),
            'price'       => fake()->randomFloat(2, 100, 500),
            'description' => fake()->realText(),
            'quantity'    => fake()->randomNumber(),
            'image'       => fake()->imageUrl(),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
    }
}
