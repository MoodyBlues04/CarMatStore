<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $colors
 * @property Collection $materials
 */
class MatTariff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function colors(): HasMany
    {
        return $this->hasMany(Color::class, 'mat_tariff_id');
    }

    public function materials(): HasMany
    {
        return $this->hasMany(MatMaterial::class, 'mat_tariff_id');
    }
}
