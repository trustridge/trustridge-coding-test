<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 記事
 *
 * @property int $id
 * @property string $title
 * @property \App\Enums\ArticleStatus $status
 * @property \Carbon\CarbonImmutable|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Item> $items
 * @property-read int|null $items_count
 * @method static \Database\Factories\ArticleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * 見出しアイテム
 *
 * @property int $id
 * @property int $item_id
 * @property string $heading_text
 * @property \App\Enums\HeadingType $heading_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Item $item
 * @method static \Database\Factories\HeadingItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem whereHeadingText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem whereHeadingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HeadingItem withoutTrashed()
 */
	class HeadingItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 画像アイテム
 *
 * @property int $id
 * @property int $item_id
 * @property string $filename
 * @property string $alt_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Item $item
 * @method static \Database\Factories\ImageItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem whereAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageItem withoutTrashed()
 */
	class ImageItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 記事アイテム
 *
 * @property int $id
 * @property int $article_id
 * @property \App\Enums\ItemType $item_type
 * @property bool $is_draft
 * @property int $order_num
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Article $article
 * @property-read \App\Models\HeadingItem|null $headingItem
 * @property-read \App\Models\ImageItem|null $imageItem
 * @property-read \App\Models\TextItem|null $textItem
 * @method static \Database\Factories\ItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereIsDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereOrderNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace App\Models{
/**
 * テキストアイテム
 *
 * @property int $id
 * @property int $item_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Item $item
 * @method static \Database\Factories\TextItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TextItem withoutTrashed()
 */
	class TextItem extends \Eloquent {}
}

