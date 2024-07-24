<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $image_id
 * @property int $inner_color_id
 * @property int $border_color_id
 * @property int $material_id
 *
 * @property-read Image $image
 * @property-read Color $innerColor
 * @property-read Color $borderColor
 * @property-read MatMaterial $material
 */
class MatImage extends Model
{
    use HasFactory;

    public const DEFAULT_MAT_IMG_URL = '/img/gallery.png';

    protected $fillable = [
        'image_id',
        'inner_color_id',
        'border_color_id',
        'material_id',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function innerColor(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'inner_color_id');
    }

    public function borderColor(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'border_color_id');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(MatMaterial::class, 'material_id');
    }
}
