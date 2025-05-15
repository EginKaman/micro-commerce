<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex">
        <div class="my-5 flex justify-center w-3/4">
            <flux:field>
                <flux:label>{{ __('Search') }}</flux:label>
                <flux:input wire:model.live.throttle.300ms="search"/>
                <flux:error name="search"/>
            </flux:field>
        </div>
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
