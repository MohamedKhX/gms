<?php

namespace App\Enums;

use Bjerke\Enum\HasTranslations;
use Bjerke\Enum\UsesTranslations;

enum Gender: string implements HasTranslations
{
    use Enum, UsesTranslations;

    case Male   = "Male";
    case Female = "Female";

    public static function getColor($color): string
    {
        return match ($color) {
            self::Male   => 'warning',
            self::Female => 'danger'
        };
    }
}
