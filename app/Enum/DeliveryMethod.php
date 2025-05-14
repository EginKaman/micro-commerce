<?php

declare(strict_types=1);

namespace App\Enum;

enum DeliveryMethod: string
{
    case PickUp = 'pick-up';
    case Delivery = 'delivery';
}
