<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $image_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Image $image
 * @property Collection $mats
 */
class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'name',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function mats(): HasMany
    {
        return $this->hasMany(Mat::class, 'brand_id');
    }
}
