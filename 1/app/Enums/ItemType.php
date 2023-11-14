<?php
declare(strict_types=1);

namespace App\Enums;

enum ItemType: string
{
    case HEADING = 'HEADING';
    case IMAGE = 'IMAGE';
    case TEXT = 'TEXT';

    public function label(): string
    {
        return match ($this) {
            self::HEADING => '見出し',
            self::IMAGE   => '画像',
            self::TEXT    => 'テキスト',
        };
    }
}
