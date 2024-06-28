<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $model
 * @property int $mat_place_template_id
 * @property int $brand_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MatPlaceTemplate $template
 * @property Brand $brand
 * @property Collection $matPlaces
 */
class Mat extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'mat_place_template_id',
        'brand_id',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(MatPlaceTemplate::class, 'mat_place_template_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function matPlaces(): HasMany
    {
        return $this->hasMany(MatPlace::class, 'mat_id');
    }
}
