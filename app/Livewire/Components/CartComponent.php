<?php

declare(strict_types=1);

namespace App\Livewire\Components;

use App\Facades\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class CartComponent extends Component
{
    /**
     * @var Collection<int, Collection<int, mixed>>
     */
    public Collection $items;
    protected ?float $total;

    /**
     * @var string[]
     */
    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    /**
     * Mounts the component on the template.
     */
    public function mount(): void
    {
        $this->updateCart();
    }

    /**
     * Renders the component on the browser.
     */
    public function render(): View
    {
        return view('livewire.cart-component', [
            'total'   => $this->total,
            'content' => $this->items,
        ]);
    }

    /**
     * Removes a cart item by id.
     */
    public function removeFromCart(int $id): void
    {
        Cart::remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     */
    public function clearCart(): void
    {
        Cart::clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     */
    public function updateCartItem(int $id, string $action): void
    {
        Cart::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     */
    public function updateCart(): void
    {
        $this->total = Cart::totalPrice();
        $this->items = Cart::getCartItems();
    }
}
