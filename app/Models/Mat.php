<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $model
 * @property int $car_image_id
 * @property int $mat_place_template_id
 * @property int $brand_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MatPlaceTemplate $template
 * @property Brand $brand
 * @property Image $carImage
 * @property Collection $images
 */
class Mat extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'mat_place_template_id',
        'car_image_id',
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

    public function carImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'car_image_id');
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'mat_has_images', 'mat_id', 'image_id');
    }

    public function getPrice(string $tariffName = 'light'): ?int
    {
        $tariff = $this->template->tariffs()->where('name', $tariffName)->first();
        return $tariff->pivot->price ?? null;
    }
}
