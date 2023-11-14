<?php
declare(strict_types=1);

namespace App\UseCases\Article;

use App\Repositories\ArticleRepository;
use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * 記事プレビュー
 */
readonly class ArticlePreviewUseCase
{
    private const ITEMS_PER_PAGE = 10;

    public function __construct(
        private ArticleRepository $articleRepository,
        private ItemRepository $itemRepository,
    )
    {
    }

    public function invoke(int $articleId, int $page): ArticlePreviewDto
    {
        $article = $this->articleRepository->findById($articleId);
        if ($article === null) {
            throw new ModelNotFoundException();
        }

        $items = $this->itemRepository->fetchPaginator($articleId, perPage: self::ITEMS_PER_PAGE, page: $page);

        return new ArticlePreviewDto(
            article: $article,
            items: $items,
        );
    }
}
