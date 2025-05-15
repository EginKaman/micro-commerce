<?php

declare(strict_types=1);

namespace App\Livewire\Components\Admin\Order;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * @return LengthAwarePaginator<int, Order>
     */
    #[Computed]
    public function orders(): LengthAwarePaginator
    {
        return Order::query()
            ->latest('id')
            ->paginate(15);
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }

    public function render(): View
    {
        return view('livewire.admin.orders.index');
    }
}
