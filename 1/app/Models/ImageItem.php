<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 画像アイテム
 */
class ImageItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getUrl(): string
    {
        return 'https://example.com/'.$this->filename;
    }
}
