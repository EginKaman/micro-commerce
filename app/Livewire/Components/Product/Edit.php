<?php

declare(strict_types=1);

namespace App\Livewire\Components\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ProductForm $productForm;

    public function mount(Product $product): void
    {
        $this->productForm->setProduct($product);
    }

    public function save(): void
    {
        $this->productForm->save();

        $this->redirectRoute('admin.products.index', ['message' => __('Product edited successfully.')]);
    }

    public function render(): View
    {
        return view('livewire.products.edit');
    }
}
