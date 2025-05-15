<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

class CartService
{
    public const MINIMUM_QUANTITY = 1;
    public const SHOPPING_CART = 'shopping-cart';

    protected SessionManager $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function add(Product $product, int $quantity): void
    {
        $cartItem = $this->createCartItem($product, $quantity);

        $items = $this->getCartItems();

        if ($items->has($product->id)) {
            $cartItem->put('quantity', $items->get($product->id)->get('quantity') + $quantity);
        }

        $items->put($product->id, $cartItem);

        $this->session->put(self::SHOPPING_CART, $items);
    }

    public function update(int $id, string $action): void
    {
        $items = $this->getCartItems();

        if ($items->has($id)) {
            $cartItem = $items->get($id);

            switch ($action) {
                case 'plus':
                    $cartItem->put('quantity', $items->get($id)->get('quantity') + 1);
                    break;
                case 'minus':
                    $updatedQuantity = $items->get($id)->get('quantity') - 1;

                    if ($updatedQuantity < self::MINIMUM_QUANTITY) {
                        $updatedQuantity = self::MINIMUM_QUANTITY;
                    }

                    $cartItem->put('quantity', $updatedQuantity);
                    break;
            }

            $items->put($id, $cartItem);

            $this->session->put(self::SHOPPING_CART, $items);
        }
    }

    public function remove(int $id): void
    {
        $items = $this->getCartItems();

        if ($items->has($id)) {
            $this->session->put(self::SHOPPING_CART, $items->except($id));
        }
    }

    public function clear(): void
    {
        $this->session->forget(self::SHOPPING_CART);
    }

    public function totalPrice(): ?float
    {
        return $this->getCartItems()->reduce(fn ($total, $item): float|int => $item->get('price') * $item->get('quantity'));
    }

    /**
     * @return Collection<int, Collection<int, mixed>>
     */
    public function getCartItems(): Collection
    {
        return $this->session->has(self::SHOPPING_CART) ? $this->session->get(self::SHOPPING_CART) : new Collection();
    }

    /**
     * @return Collection<int, Collection<int, mixed>>
     */
    public function getCartItemsToAttach(): Collection
    {
        $this->getCartItems()
            ->mapWithKeys(fn ($item, $key) => [$key => ['quantity' => $item['quantity'], 'price' => $item['price']]]);
    }

    /**
     * @return Collection<string, mixed>
     */
    protected function createCartItem(Product $product, int $quantity): Collection
    {
        if ($quantity < self::MINIMUM_QUANTITY) {
            $quantity = self::MINIMUM_QUANTITY;
        }

        return new Collection([
            'name'        => $product->name,
            'price'       => $product->price,
            'quantity'    => $quantity,
        ]);
    }
}
