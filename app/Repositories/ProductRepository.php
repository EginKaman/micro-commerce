<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class ProductRepository
{
    /**
     * @return LengthAwarePaginator<int, Product>
     */
    public static function paginate(): LengthAwarePaginator
    {
        return Product::query()
            ->latest('id')
            ->paginate(15);
    }

    /**
     * @return LengthAwarePaginator<int, Product>
     */
    public static function paginateWithSearch(string $search = ''): LengthAwarePaginator
    {
        return Product::query()
            ->when($search, function ($query, $search): void {
                $search = Str::of($search)->wrap('%')->toString();

                $query->where('name', 'like', $search)
                    ->orWhere('sku', 'like', $search);
            })
            ->latest('id')
            ->paginate(15);
    }
}
