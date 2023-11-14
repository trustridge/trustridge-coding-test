<?php

namespace Tests\Unit\Repositories;

use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ItemRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetchPaginator()
    {
        $item = Item::factory()->create(['is_draft' => false]);

        $repository = new ItemRepository();

        $actual1 = $repository->fetchPaginator($item->article_id, 10, 1);
        $this->assertInstanceOf(LengthAwarePaginator::class, $actual1);
        $this->assertSame(1, $actual1->total());
        $this->assertSame($item->id, $actual1->first()->id);

        $actual2 = $repository->fetchPaginator($item->article_id + 1, 10, 1);
        $this->assertInstanceOf(LengthAwarePaginator::class, $actual2);
        $this->assertSame(0, $actual2->total());
    }

    public function test_fetchPaginator_EagerLoad()
    {
        $item = Item::factory()->create(['is_draft' => false]);

        $repository = new ItemRepository();

        $actual = $repository->fetchPaginator($item->article_id, 10, 1);
        $this->assertTrue($actual->first()->relationLoaded('headingItem'));
        $this->assertTrue($actual->first()->relationLoaded('imageItem'));
        $this->assertTrue($actual->first()->relationLoaded('textItem'));
    }
}
