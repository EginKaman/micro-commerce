<?php

declare(strict_types=1);

namespace App\Livewire\Components\Web;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
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
        return Product::query()
            ->when($this->search, function ($query, $search): void {
                $search = Str::of($search)->wrap('%')->toString();

                $query->where('name', 'like', $search)
                    ->orWhere('sku', 'like', $search);
            })
            ->latest('id')
            ->paginate(15);
    }

    public function render(): View
    {
        return view('livewire.web.catalog')
            ->layout('components.layouts.web');
    }
}
