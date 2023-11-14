<?php

namespace Tests\Unit\Models;

use App\Models\HeadingItem;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeadingItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_relationships()
    {
        $headingItem = HeadingItem::factory()
            ->for(Item::factory())
            ->create();

        $actual = HeadingItem::find($headingItem->id);
        $this->assertInstanceOf(Item::class, $actual->item);
    }
}
