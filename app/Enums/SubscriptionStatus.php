<?php

namespace App\Enums;

use Bjerke\Enum\HasTranslations;
use Bjerke\Enum\UsesTranslations;

enum SubscriptionStatus: string implements HasTranslations
{
    use Enum, UsesTranslations;

    case Active = 'active';
    case Expired = 'expired';

    public static function getColor($status): string
    {
        return match ($status) {
            self::Active->translate()  => 'success',
            self::Expired->translate() => 'danger',
        };
    }
}
