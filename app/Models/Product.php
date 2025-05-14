<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'price',
        'description',
        'quantity',
        'image',
    ];

    protected $attributes = [
        'sku'         => '',
        'name'        => '',
        'description' => null,
        'price'       => 0.01,
        'quantity'    => 0,
    ];

    protected function casts(): array
    {
        return [
            'price'    => 'decimal:2',
            'quantity' => 'integer',
        ];
    }
}
