<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Enum\DeliveryMethod;
use App\Enum\PaymentMethod;
use App\Facades\Cart;
use App\Models\Order;
use Illuminate\Validation\Rule;
use Livewire\Form;

class OrderForm extends Form
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public DeliveryMethod $delivery;

    public PaymentMethod $payment;

    public function save(): void
    {
        $validated = $this->validate();

        $order = new Order($validated);

        $order->total_price = Cart::totalPrice();

        $order->save();

        $order->products()->attach(Cart::getCartItemsToAttach());
    }

    protected function rules(): array
    {
        return [
            'name'     => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'email'    => ['bail', 'required', 'email:rfc', 'max:254'],
            'phone'    => ['bail', 'required', 'string', 'phone:mobile'],
            'delivery' => ['bail', 'required', Rule::enum(DeliveryMethod::class)],
            'payment'  => ['bail', 'required', Rule::enum(PaymentMethod::class)],
        ];
    }
}
