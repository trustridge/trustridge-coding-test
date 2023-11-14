<?php
declare(strict_types=1);

namespace App\Enums;

enum ArticleStatus: string
{
    case DRAFT = 'DRAFT';
    case REVIEW = 'REVIEW';
    case PUBLISHED = 'PUBLISHED';
    case PRIVATE = 'PRIVATE';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT     => '下書き',
            self::REVIEW    => 'レビュー',
            self::PUBLISHED => '公開中',
            self::PRIVATE   => '非公開',
        };
    }
}
