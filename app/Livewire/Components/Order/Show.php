<?php

declare(strict_types=1);

namespace App\Livewire\Components\Order;

use App\Livewire\Forms\ProductForm;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    public Order $order;

    public function mount(Order $order): void
    {
        $this->order = $order;
    }

    public function render(): View
    {
        return view('livewire.orders.show');
    }
}
