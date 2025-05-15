<?php

declare(strict_types=1);

namespace App\Livewire\Components\Web;

use App\Facades\Cart;
use App\Livewire\Forms\OrderForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Checkout extends Component
{
    public OrderForm $orderForm;

    /**
     * @return Collection<int, mixed>
     */
    #[Computed]
    public function items(): Collection
    {
        return Cart::getCartItems();
    }

    #[Computed]
    public function total(): ?float
    {
        return Cart::totalPrice();
    }

    public function complete(): void
    {
        $this->orderForm->save();

        Cart::clear();
    }

    public function render(): View
    {
        return view('livewire.web.checkout')
            ->layout('components.layouts.web');
    }
}
