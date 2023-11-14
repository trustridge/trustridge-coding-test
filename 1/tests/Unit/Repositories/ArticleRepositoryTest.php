<?php

namespace Tests\Unit\Repositories;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_findById()
    {
        $article = Article::factory()->create();

        $repository = new ArticleRepository();

        $actual1 = $repository->findById($article->id);
        $this->assertInstanceOf(Article::class, $actual1);
        $this->assertSame($article->id, $actual1->id);

        $actual2 = $repository->findById($article->id + 1);
        $this->assertNull($actual2);
    }
}
