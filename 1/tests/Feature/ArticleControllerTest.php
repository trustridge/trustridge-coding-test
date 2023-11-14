<?php

namespace Tests\Feature;

use App\Enums\ItemType;
use App\Models\Article;
use App\Models\HeadingItem;
use App\Models\ImageItem;
use App\Models\Item;
use App\Models\TextItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_preview(): void
    {
        $article = Article::factory()
            ->has(Item::factory()
                ->has(HeadingItem::factory())
                ->headingItem()
                ->state(['order_num' => 1]))
            ->has(Item::factory()
                ->has(ImageItem::factory()->state(['filename' => 'test.jpg']))
                ->imageItem()
                ->state(['order_num' => 2]))
            ->has(Item::factory()
                ->has(TextItem::factory())
                ->textItem()
                ->state(['order_num' => 3]))
            ->create();
        $items = $article->items;

        $response = $this->get('/api/articles/'.$article->id.'/preview');
        $response->assertStatus(200);
        $response->assertjson([
            'article'    => [
                'id'    => $article->id,
                'title' => $article->title,
            ],
            'items'      => [
                [
                    'id'          => $items->get(0)->id,
                    'itemType'    => ItemType::HEADING->value,
                    'headingText' => $items->get(0)->headingItem->heading_text,
                    'headingType' => $items->get(0)->headingItem->heading_type->value,
                ],
                [
                    'id'       => $items->get(1)->id,
                    'itemType' => ItemType::IMAGE->value,
                    'imageUrl' => 'https://example.com/test.jpg',
                    'altText'  => $items->get(1)->imageItem->alt_text,
                ],
                [
                    'id'       => $items->get(2)->id,
                    'itemType' => ItemType::TEXT->value,
                    'text'     => $items->get(2)->textItem->text,
                ],
            ],
            'pagination' => [
                'currentPage' => 1,
                'lastPage'    => 1,
                'perPage'     => 10,
                'total'       => 3,
            ],
        ]);
    }
}
