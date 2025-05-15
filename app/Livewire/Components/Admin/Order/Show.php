<?php

declare(strict_types=1);

namespace App\Livewire\Components\Admin\Order;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Show extends Component
{
    public Order $order;

    public function mount(Order $order): void
    {
        $this->order = $order->load('products');
    }

    public function render(): View
    {
        return view('livewire.admin.orders.show');
    }
}
