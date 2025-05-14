<?php

declare(strict_types=1);

namespace App\Enum;

enum PaymentMethod: string
{
    case CashOnDelivery = 'cash-on-delivery';
    case Online = 'online';
}
