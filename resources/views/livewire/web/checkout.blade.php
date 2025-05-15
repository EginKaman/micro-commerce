<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="p-5 mx-2 my-2 max-w-md rounded border-2">
        @if ($this->items->count() > 0)
            @foreach ($this->items as $id => $item)
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
            <p class="text-xl text-right mb-2">{{ __('Total') }}: {{ Number::currency($this->total) }}</p>

            <flux:field>
                <flux:label>{{ __('Name') }}</flux:label>
                <flux:input wire:model="orderForm.name"/>
                <flux:error name="orderForm.name"/>
            </flux:field>
            <flux:field>
                <flux:label>{{ __('Email') }}</flux:label>
                <flux:input wire:model="orderForm.email"/>
                <flux:error name="orderForm.email"/>
            </flux:field>
            <flux:field>
                <flux:label>{{ __('Phone') }}</flux:label>
                <flux:input wire:model="orderForm.phone"/>
                <flux:error name="orderForm.phone"/>
            </flux:field>
            <flux:field>
                <flux:label>{{ __('Delivery') }}</flux:label>
                <flux:select wire:model="orderForm.delivery" placeholder="Choose delivery...">
                    @foreach(\App\Enum\DeliveryMethod::cases() as $delivery)
                        <flux:select.option
                            value="{{ $delivery->value }}">
                            {{ Str::title($delivery->value)  }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:error name="orderForm.delivery"/>
            </flux:field>
            <flux:field>
                <flux:label>{{ __('Payment') }}</flux:label>
                <flux:select wire:model="orderForm.payment" placeholder="Choose payment...">
                    @foreach(\App\Enum\PaymentMethod::cases() as $payment)
                        <flux:select.option
                            value="{{ $payment->value }}">
                            {{ Str::title($payment->value)  }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:error name="orderForm.payment"/>
            </flux:field>

            <flux:button wire:click="complete">{{ __('Complete order') }}</flux:button>
        @else
            <p class="text-3xl text-center mb-2">Cart is empty!</p>
        @endif
    </div>
</div>
