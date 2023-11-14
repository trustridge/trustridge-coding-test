<?php

namespace Tests\Unit\Models;

use App\Models\Article;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_relationships()
    {
        $article = Article::factory()
            ->has(Item::factory())
            ->create();

        $actual = Article::find($article->id);
        $this->assertInstanceOf(Collection::class, $actual->items);
        $this->assertInstanceOf(Item::class, $actual->items->first());
    }
}
