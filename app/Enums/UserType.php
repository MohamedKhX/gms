<?php

namespace App\Enums;

use Bjerke\Enum\HasTranslations;
use Bjerke\Enum\UsesTranslations;

enum UserType: string implements HasTranslations
{
    use Enum, UsesTranslations;

    case Admin   = 'Admin';
    case Trainee = 'Trainee';
    case Coach   = 'Coach';
}
