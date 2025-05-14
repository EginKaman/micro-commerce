<div class="flex-1 self-stretch max-md:pt-2">
    <flux:heading>{{ __('Order details') }}</flux:heading>

    <div class="mt-5 w-full max-w-lg">
        <flux:heading>{{ __('Status') }}</flux:heading>
        <flux:text class="mt-2">{{ $order->status }}</flux:text>

        <flux:heading>{{ __('Name') }}</flux:heading>
        <flux:text class="mt-2">{{ $order->name }}</flux:text>

        <flux:heading>{{ __('Email') }}</flux:heading>
        <flux:text class="mt-2">{{ $order->email }}</flux:text>

        <flux:heading>{{ __('Phone') }}</flux:heading>
        <flux:text class="mt-2">{{ $order->phone }}</flux:text>

        <flux:heading>{{ __('Delivery method') }}</flux:heading>
        <flux:text class="mt-2">{{ Str::title($order->delivery->value) }}</flux:text>

        <flux:heading>{{ __('Payment method') }}</flux:heading>
        <flux:text class="mt-2">{{ Str::title($order->payment->value) }}</flux:text>

        <flux:heading>{{ __('Total price') }}</flux:heading>
        <flux:text class="mt-2">{{ Number::currency($order->total_price) }}</flux:text>
    </div>
</div>
