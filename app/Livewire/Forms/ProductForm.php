<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product;

    #[Validate(['bail', 'required',  'string', 'min:3', 'max:255', 'unique:products,sku'])]
    public string $sku = '';

    #[Validate(['bail', 'required', 'string', 'min:3', 'max:255'])]
    public string $name = '';

    #[Validate(['bail', 'required', 'numeric', 'min:0.01', 'max:999999.99'])]
    public float $price = 0;

    #[Validate(['bail', 'nullable', 'max:65535'])]
    public ?string $description = null;

    #[Validate(['bail', 'required', 'integer', 'min:0', 'max:2147483647'])]
    public float $quantity = 0;

    #[Validate(['bail', 'required', 'image', 'max:1024'])]
    public TemporaryUploadedFile $image;

    public function save(): void
    {
        $this->validate();

        $this->product->fill($this->except(['product', 'image']));

        $this->product->image = $this->image->storePublicly('products');

        $this->product->save();
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;

        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = (float) $product->price;
        $this->quantity = $product->quantity;
    }

    protected function rules(): array
    {
        return [
            'sku' => ['bail', 'required',  'string', 'min:3', 'max:255',
                Rule::unique('products', 'sku')->ignore($this->product)],
            'name'        => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'price'       => ['bail', 'required', 'numeric', 'min:0.01', 'max:999999.99'],
            'description' => ['bail', 'nullable', 'max:65535'],
            'quantity'    => ['bail', 'required', 'integer', 'min:0', 'max:2147483647'],
            'image'       => ['bail', 'required', 'image', 'max:1024'],
        ];
    }
}
