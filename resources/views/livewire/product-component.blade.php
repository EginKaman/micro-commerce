<div class="p-5 mx-2 my-2 max-w-md rounded border-2">
    <h1 class="text-3xl mb-2">{{ $product->name }} - {{ Number::currency($product->price) }}</h1>
    <p class="text-lg mb-2">{{ $product->description }}</p>
    <flux:input wire:model="quantity"/>
    <flux:button variant="primary"
            wire:click="addToCart">
        {{ __('Add To Cart') }}
    </flux:button>
</div>
