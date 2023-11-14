<?php
declare(strict_types=1);

namespace App\Enums;

enum HeadingType: string
{
    case LARGE = 'LARGE';
    case MEDIUM = 'MEDIUM';
    case SMALL = 'SMALL';

    public function label(): string
    {
        return match ($this) {
            self::LARGE  => '大見出し',
            self::MEDIUM => '中見出し',
            self::SMALL  => '小見出し',
        };
    }
}
