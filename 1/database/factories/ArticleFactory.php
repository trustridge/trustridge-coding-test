<?php

namespace Database\Factories;

use App\Enums\ArticleStatus;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'        => '記事タイトル、、、',
            'status'       => ArticleStatus::PUBLISHED,
            'published_at' => CarbonImmutable::now(),
        ];
    }
}
