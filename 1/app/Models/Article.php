<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 記事
 */
class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'status'       => ArticleStatus::class,
        'published_at' => 'immutable_datetime',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
