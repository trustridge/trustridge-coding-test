<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\ItemType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 記事アイテム
 */
class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $casts = [
        'item_type' => ItemType::class,
        'is_draft'  => 'boolean',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function headingItem()
    {
        return $this->hasOne(HeadingItem::class);
    }

    public function imageItem()
    {
        return $this->hasOne(ImageItem::class);
    }

    public function textItem()
    {
        return $this->hasOne(TextItem::class);
    }
}
