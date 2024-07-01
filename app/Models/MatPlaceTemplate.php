<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $mat_place_template_info_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MatPlaceTemplateInfo $templateInfo
 * @property Mat $mat
 * @property Collection $tariffs
 * @property Collection $places
 */
class MatPlaceTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'mat_place_template_info_id',
    ];

    public function templateInfo(): BelongsTo
    {
        return $this->belongsTo(MatPlaceTemplateInfo::class, 'mat_place_template_info_id');
    }

    public function mats(): HasOne
    {
        return $this->hasOne(Mat::class, 'mat_place_template_id');
    }

    public function tariffs(): BelongsToMany
    {
        return $this->belongsToMany(MatTariff::class, 'template_prices', 'mat_place_template_id', 'mat_tariff_id')
            ->withPivot('price');
    }

    public function places(): HasMany
    {
        return $this->hasMany(MatPlace::class, 'mat_place_template_id');
    }
}
