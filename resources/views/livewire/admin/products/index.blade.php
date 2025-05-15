<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">{{ __('Products') }}</h1>
        <flux:button :href="route('admin.products.create')">{{ __('Create') }}</flux:button>
    </div>
    <table class="table-none md:table-auto">
        <thead>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Price') }}</th>
            <th>{{ __('Quantity') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($this->products as $product)
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ Number::currency($product->price) }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <flux:button.group>
                        <flux:button icon="pencil" :href="route('admin.products.edit', $product)"></flux:button>
                        <flux:button icon="trash"
                                     wire:click="delete({{ $product->id }})"
                                     wire:confirm="{{ __('Are you sure you want to delete this product?') }}"
                        ></flux:button>
                    </flux:button.group>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $this->products->links() }}
</div>
