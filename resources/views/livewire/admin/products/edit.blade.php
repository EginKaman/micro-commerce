<div class="flex-1 self-stretch max-md:pt-2">
    <flux:heading>{{ __('Edit product') }}</flux:heading>

    <div class="mt-5 w-full max-w-lg">
        <form wire:submit="save" class="my-6 w-full space-y-6">
            <flux:field>
                <flux:label>{{ __('SKU') }}</flux:label>
                <flux:input wire:model="productForm.sku"/>
                <flux:error name="productForm.sku"/>
            </flux:field>
            
            <flux:field>
                <flux:label>{{ __('Name') }}</flux:label>
                <flux:input wire:model="productForm.name"/>
                <flux:error name="productForm.name"/>
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Description') }}</flux:label>
                <flux:textarea wire:model="productForm.description"/>
                <flux:error name="productForm.description"/>
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Price') }}</flux:label>
                <flux:input type="number"
                            wire:model="productForm.price"
                            step="0.01"
                            min="0.01"/>
                <flux:error name="productForm.price"/>
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Quantity') }}</flux:label>
                <flux:input type="number"
                            wire:model="productForm.quantity"
                            step="1"
                            min="0"/>
                <flux:error name="productForm.quantity"/>
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Image') }}</flux:label>
                <flux:input type="file" wire:model="productForm.image" accept="image/*"/>
                <flux:error name="productForm.image"/>
            </flux:field>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </div>
</div>
