<?php

declare(strict_types=1);

namespace App\Livewire\Components\Web;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Catalog extends Component
{
    #[Validate(['bail', 'nullable', 'string', 'min:3', 'max:255'])]
    public string $search = '';

    /**
     * @return LengthAwarePaginator<int, Product>
     */
    #[Computed]
    public function products(): LengthAwarePaginator
    {
        return ProductRepository::paginateWithSearch($this->search);
    }

    public function render(): View
    {
        return view('livewire.web.catalog')
            ->layout('components.layouts.web');
    }
}
