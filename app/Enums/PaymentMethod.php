<?php

namespace App\Enums;

use Bjerke\Enum\HasTranslations;
use Bjerke\Enum\UsesTranslations;

enum PaymentMethod: string implements HasTranslations
{
    use UsesTranslations, Enum;

    case CASH = 'cash';
    case CARD = 'card';
}
