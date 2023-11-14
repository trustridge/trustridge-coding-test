<?php

namespace Tests\Unit\Models;

use App\Models\Item;
use App\Models\TextItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TextItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_relationships()
    {
        $textItem = TextItem::factory()
            ->for(Item::factory())
            ->create();

        $actual = TextItem::find($textItem->id);
        $this->assertInstanceOf(Item::class, $actual->item);
    }
}
