<?php

namespace App\Enums;

use Bjerke\Enum\HasTranslations;
use Bjerke\Enum\UsesTranslations;

enum SportStatus: string implements HasTranslations
{
    use UsesTranslations, Enum;

    case Available              = 'Available';
    case TemporarilyUnavailable = 'TemporarilyUnavailable';
    case Discontinued           = 'Discontinued';
    case ComingSoon             = 'ComingSoon';
}
