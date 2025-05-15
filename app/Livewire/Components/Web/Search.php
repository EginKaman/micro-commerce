<?php

declare(strict_types=1);

namespace App\Livewire\Components\Web;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Search extends Component
{
    /**
     * @return LengthAwarePaginator<int, Product>
     */
    #[Computed]
    public function products(): LengthAwarePaginator
    {
        return Product::query()
            ->latest('id')
            ->paginate(15);
    }

    public function render(): View
    {
        return view('livewire.web.search')
            ->layout('components.layouts.web');
    }
}
