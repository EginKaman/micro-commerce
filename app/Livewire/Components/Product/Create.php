<?php

declare(strict_types=1);

namespace App\Livewire\Components\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public ProductForm $productForm;

    public function mount(): void
    {
        $this->productForm->setProduct(new Product());
    }

    public function save(): void
    {
        $this->productForm->save();

        $this->redirectRoute('admin.products.index', ['message' => __('Product created successfully.')]);
    }

    public function render(): View
    {
        return view('livewire.products.edit');
    }
}
