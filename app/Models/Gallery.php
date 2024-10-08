<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $image_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Image $image
 */
class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::deleting(function(Gallery $gallery) {
            $gallery->image->delete();
        });
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
