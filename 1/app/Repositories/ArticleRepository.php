<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function findById(int $articleId): ?Article
    {
        return Article::find($articleId);
    }
}
