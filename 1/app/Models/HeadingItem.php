<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\HeadingType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 見出しアイテム
 */
class HeadingItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $casts = [
        'heading_type' => HeadingType::class,
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
