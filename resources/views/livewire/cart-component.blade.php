<div class="w-1/4">
    <div class="p-5 mx-2 my-2 max-w-md rounded border-2">
        @if ($items->count() > 0)
            @foreach ($items as $id => $item)
                <p class="text-2xl text-right mb-2">
                    <button
                        class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                        wire:click="updateCartItem({{ $id }}, 'minus')"> -
                    </button>
                    {{ $item->get('name') }} x {{ $item->get('quantity') }}
                    <button
                        class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                        wire:click="updateCartItem({{ $id }}, 'plus')"> +
                    </button>
                    <button
                        class="text-sm p-2 border-2 rounded border-red-500 hover:border-red-600 bg-red-500 hover:bg-red-600"
                        wire:click="removeFromCart({{ $id }})">{{ __('Remove') }}
                    </button>
                </p>
            @endforeach

            <hr class="my-2">
            <p class="text-xl text-right mb-2">{{ __('Total') }}: {{ Number::currency($total) }}</p>

            <flux:button wire:click="clearCart">{{ __('Clear Cart') }}</flux:button>
            <flux:button wire:navigate href="{{ route('checkout') }}">{{ __('Checkout') }}</flux:button>
        @else
            <p class="text-3xl text-center mb-2">Cart is empty!</p>
        @endif
    </div>
</div>
