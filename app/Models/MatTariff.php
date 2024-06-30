<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $colors
 * @property Collection $materials
 * @property Collection $matPlaces
 */
class MatTariff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'tariffs_colors', 'mat_tariff_id', 'color_id');
    }

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(MatMaterial::class, 'tariffs_materials', 'mat_tariff_id', 'mat_material_id');
    }

    public function matPlaces(): HasMany
    {
        return $this->hasMany(MatPlace::class, 'mat_tariff_id');
    }
}
