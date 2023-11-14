<?php

namespace Tests\Unit\UseCases\Article;

use App\Models\Article;
use App\Models\HeadingItem;
use App\Models\ImageItem;
use App\Models\Item;
use App\Models\TextItem;
use App\UseCases\Article\ArticlePreviewDto;
use App\UseCases\Article\ArticlePreviewUseCase;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlePreviewUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoke()
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

        $usecase = $this->app->make(ArticlePreviewUseCase::class);

        $actual = $usecase->invoke(articleId: $article->id, page: 1);
        $this->assertInstanceOf(ArticlePreviewDto::class, $actual);
        $this->assertSame($article->id, $actual->article->id);
        $this->assertSame(3, $actual->items->total());
        $this->assertSame($items->get(0)->id, $actual->items->get(0)->id);
        $this->assertSame($items->get(1)->id, $actual->items->get(1)->id);
        $this->assertSame($items->get(2)->id, $actual->items->get(2)->id);
    }

    public function test_invoke_ModelNotFoundException()
    {
        $usecase = $this->app->make(ArticlePreviewUseCase::class);

        $this->expectException(ModelNotFoundException::class);

        $usecase->invoke(articleId: 1, page: 1);
    }
}
