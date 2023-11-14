<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImageItem>
 */
class ImageItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id'    => fn() => Item::factory()->imageItem()->create()->id,
            'filename'   => 'image.jpg',
            'alt_text'   => 'ALTテキスト、、、',
            'deleted_at' => null,
        ];
    }
}
