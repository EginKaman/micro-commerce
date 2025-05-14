<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::query()->take(100)->get();

        Order::factory(100)
            ->create()
            ->each(function (Order $order) use ($products): void {
                $orderProducts = $products->random(random_int(1, 5));

                $order->products()
                    ->attach(
                        $orderProducts
                            ->mapWithKeys(fn ($product) => [
                                $product->id => [
                                    'quantity' => random_int(1, 5),
                                    'price'    => $product->price,
                                ],
                            ])
                    );
            });
    }
}
