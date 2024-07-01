<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property int $mat_place_template_info_id
 * @property int $image_id
 * @property int $row
 * @property int $order
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MatPlaceTemplateInfo $templateInfo
 * @property Collection $matPlaces
 */
class MatPlaceInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mat_place_template_info_id',
        'row',
        'order',
        'image_id',
    ];

    public function templateInfo(): BelongsTo
    {
        return $this->belongsTo(MatPlaceTemplateInfo::class, 'mat_place_template_info_id');
    }

    public function matPlaces(): HasMany
    {
        return $this->hasMany(MatPlace::class, 'mat_place_info_id');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
