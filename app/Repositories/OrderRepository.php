<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderRepository
{
    /**
     * @return LengthAwarePaginator<int, Order>
     */
    public static function paginate(): LengthAwarePaginator
    {
        return Order::query()
            ->latest('id')
            ->paginate(15);
    }
}
