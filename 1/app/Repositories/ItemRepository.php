<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemRepository
{
    public function fetchPaginator(int $articleId, int $perPage, int $page): LengthAwarePaginator
    {
        return Item::query()
            ->with([
                'headingItem',
                'imageItem',
                'textItem',
            ])
            ->where('article_id', $articleId)
            ->orderBy('order_num')
            ->paginate(perPage: $perPage, page: $page);
    }
}
