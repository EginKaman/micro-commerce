<?php

declare(strict_types=1);

namespace App\Livewire\Components;

use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProductComponent extends Component
{
    public Product $product;

    public int $quantity = 1;

    public function render(): View
    {
        return view('livewire.product-component');
    }

    public function addToCart(): void
    {
        Cart::add($this->product, $this->quantity);

        $this->dispatch('productAddedToCart');
    }
}
