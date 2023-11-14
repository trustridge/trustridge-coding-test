<?php

namespace Tests\Unit\Models;

use App\Models\Article;
use App\Models\HeadingItem;
use App\Models\ImageItem;
use App\Models\Item;
use App\Models\TextItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_relationships()
    {
        $item = Item::factory()
            ->for(Article::factory())
            ->has(HeadingItem::factory())
            ->has(ImageItem::factory())
            ->has(TextItem::factory())
            ->create();

        $actual = Item::find($item->id);
        $this->assertInstanceOf(Article::class, $actual->article);
        $this->assertInstanceOf(HeadingItem::class, $actual->headingItem);
        $this->assertInstanceOf(ImageItem::class, $actual->imageItem);
        $this->assertInstanceOf(TextItem::class, $actual->textItem);
    }
}
