<?php

declare(strict_types=1);

namespace App\Enum;

enum OrderStatus: string
{
    case New = 'new';
    case Processing = 'processing';
    case Completed = 'completed';
}
