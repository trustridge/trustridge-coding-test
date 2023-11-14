<?php
declare(strict_types=1);

namespace App\UseCases\Article;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class ArticlePreviewDto
{
    public function __construct(
        public Article $article,
        public LengthAwarePaginator $items,
    )
    {
    }
}
