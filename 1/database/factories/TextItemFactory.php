<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TextItem>
 */
class TextItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id'    => fn() => Item::factory()->textItem()->create()->id,
            'text'       => 'テキスト、、、',
            'deleted_at' => null,
        ];
    }
}
