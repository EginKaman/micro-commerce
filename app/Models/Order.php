<?php

declare(strict_types=1);

namespace App\Models;

use App\Enum\DeliveryMethod;
use App\Enum\OrderStatus;
use App\Enum\PaymentMethod;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'status',
        'name',
        'email',
        'phone',
        'delivery',
        'payment',
        'total_price',
    ];

    protected $attributes = [
        'status' => OrderStatus::New,
    ];

    /**
     * @return BelongsToMany<Product, $this, Pivot>
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'price']);
    }

    protected function casts(): array
    {
        return [
            'total_price' => 'decimal:2',
            'delivery'    => DeliveryMethod::class,
            'payment'     => PaymentMethod::class,
            'status'      => OrderStatus::class,
        ];
    }
}
