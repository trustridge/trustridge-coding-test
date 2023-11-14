<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\HeadingItem;
use App\Models\ImageItem;
use App\Models\Item;
use App\Models\TextItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory()
            ->has(
                Item::factory()
                    ->count(2)
                    ->has(HeadingItem::factory())
                    ->headingItem()
            )
            ->has(
                Item::factory()
                    ->count(2)
                    ->has(ImageItem::factory())
                    ->imageItem()
            )
            ->has(
                Item::factory()
                    ->count(2)
                    ->has(TextItem::factory())
                    ->textItem()
            )
            ->create();
    }
}
