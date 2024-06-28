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
 * @property Collection $placeInfos
 * @property Collection $mats
 */
class MatPlaceTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function placeInfos(): HasMany
    {
        return $this->hasMany(MatPlaceInfo::class, 'mat_place_template_id');
    }

    public function mats(): HasMany
    {
        return $this->hasMany(Mat::class, 'mat_place_template_id');
    }
}
