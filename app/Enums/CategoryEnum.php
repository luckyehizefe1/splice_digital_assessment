<?php

namespace App\Enums;

enum CategoryEnum: string
{

    case Bug   = 'bug';
    case Feature      = 'feature';
    case Improvement = 'improvement';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}