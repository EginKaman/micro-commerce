<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex">
        <div class="my-5 flex justify-center w-3/4"><h1 class="underline text-5xl">{{ __('Products') }}</h1></div>
        <div class="my-5 flex justify-center w-1/4"><h1 class="underline text-5xl">{{ __('Cart') }}</h1></div>
    </div>
    <div class="flex">
        <div class="flex flex-wrap justify-between w-3/4 grid grid-cols-2 gap-4">
            @foreach ($this->products as $product)
                @livewire(\App\Livewire\Components\ProductComponent::class, ['product' => $product], key($product->id))
            @endforeach
        </div>
    </div>

    {{ $this->products->links() }}
</div>
