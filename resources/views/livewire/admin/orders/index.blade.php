<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">{{ __('Orders') }}</h1>
    </div>
    <table class="table-none md:table-auto">
        <thead>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Delivery') }}</th>
            <th>{{ __('Payment') }}</th>
            <th>{{ __('Total price') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($this->orders as $order)
            <tr>
                <td>
                    {{ $order->id }}
                </td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ Str::title($order->delivery->value) }}</td>
                <td>{{ Str::title($order->payment->value) }}</td>
                <td>{{ Number::currency($order->total_price) }}</td>
                <td>
                    <flux:button.group>
                        <flux:button icon="eye" :href="route('admin.orders.show', $order)"></flux:button>
                        <flux:button icon="trash"
                                     wire:click="delete({{ $order->id }})"
                                     wire:confirm="{{ __('Are you sure you want to delete this product?') }}"
                        ></flux:button>
                    </flux:button.group>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $this->orders->links() }}
</div>
