<?php

namespace Tests\Unit\Models;

use App\Models\ImageItem;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_relationships()
    {
        $imageItem = ImageItem::factory()
            ->for(Item::factory())
            ->create();

        $actual = ImageItem::find($imageItem->id);
        $this->assertInstanceOf(Item::class, $actual->item);
    }

    public function test_getUrl()
    {
        $imageItem = ImageItem::factory()->create(['filename' => 'west_coast_ipa.jpg']);

        $actual = ImageItem::find($imageItem->id);
        $this->assertSame('https://example.com/west_coast_ipa.jpg', $actual->getUrl());
    }
}
