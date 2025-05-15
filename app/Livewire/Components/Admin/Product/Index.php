<?php

declare(strict_types=1);

namespace App\Livewire\Components\Admin\Product;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * @return LengthAwarePaginator<int, Product>
     */
    #[Computed]
    public function products(): LengthAwarePaginator
    {
        return ProductRepository::paginate();
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }

    public function render(): View
    {
        return view('livewire.admin.products.index');
    }
}
