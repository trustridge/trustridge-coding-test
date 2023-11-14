<?php
declare(strict_types=1);

namespace App\Http\Responders\Article;

use App\Enums\ItemType;
use App\Models\Item;
use App\UseCases\Article\ArticlePreviewDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class ArticlePreviewResponder
{
    public function invoke(ArticlePreviewDto $dto): JsonResponse
    {
        return Response::json([
            'article' => [
                'id'          => $dto->article->id,
                'title'       => $dto->article->title,
                'publishedAt' => $dto->article->published_at->format('Y/m/d'),
            ],
            'items'   => $dto->items->map(fn(Item $item) => [
                'id'       => $item->id,
                'itemType' => $item->item_type->value,
                ...match ($item->item_type) {
                    ItemType::HEADING => [
                        'headingText' => $item->headingItem->heading_text,
                        'headingType' => $item->headingItem->heading_type->value,
                    ],
                    ItemType::IMAGE   => [
                        'imageUrl' => $item->imageItem->getUrl(),
                        'altText'  => $item->imageItem->alt_text,
                    ],
                    ItemType::TEXT    => [
                        'text' => $item->textItem->text,
                    ],
                },
            ]),
            'pagination' => [
                'currentPage' => $dto->items->currentPage(),
                'lastPage'    => $dto->items->lastPage(),
                'perPage'     => $dto->items->perPage(),
                'total'       => $dto->items->total(),
            ],
        ]);
    }
}
