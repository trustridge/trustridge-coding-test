<?php

namespace Database\Factories;

use App\Enums\HeadingType;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeadingItem>
 */
class HeadingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id'      => fn() => Item::factory()->headingItem()->create()->id,
            'heading_text' => '見出し、、、',
            'heading_type' => HeadingType::MEDIUM,
            'deleted_at'   => null,
        ];
    }
}
