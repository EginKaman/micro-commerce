<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enum\DeliveryMethod;
use App\Enum\OrderStatus;
use App\Enum\PaymentMethod;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'status'      => fake()->randomElement(OrderStatus::cases()),
            'name'        => fake()->name(),
            'email'       => fake()->safeEmail(),
            'phone'       => fake()->phoneNumber(),
            'delivery'    => fake()->randomElement(DeliveryMethod::cases()),
            'payment'     => fake()->randomElement(PaymentMethod::cases()),
            'total_price' => fake()->randomFloat(2, 100, 500),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
    }
}
