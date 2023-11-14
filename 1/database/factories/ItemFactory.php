<?php

namespace Database\Factories;

use App\Enums\ItemType;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $orderNum = 1;
        return [
            'article_id' => fn() => Article::factory()->create()->id,
            'item_type'  => ItemType::TEXT,
            'is_draft'   => false,
            'order_num'  => $orderNum++,
            'deleted_at' => null,
        ];
    }

    public function headingItem(): static
    {
        return $this->state(fn(array $attributes) => [
            'item_type' => ItemType::HEADING,
        ]);
    }

    public function imageItem(): static
    {
        return $this->state(fn(array $attributes) => [
            'item_type' => ItemType::IMAGE,
        ]);
    }

    public function textItem(): static
    {
        return $this->state(fn(array $attributes) => [
            'item_type' => ItemType::TEXT,
        ]);
    }
}
