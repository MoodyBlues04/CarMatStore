<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $placeInfos
 * @property Collection $templates
 */
class MatPlaceTemplateInfo extends Model
{
    public const TYPE_SALON = 'salon';
    public const TYPE_BAG = 'bag';
    
    protected $table = 'mat_place_template_infos';

    protected $fillable = [
        'name',
        'type',
    ];

    public function templates(): HasMany
    {
        return $this->hasMany(MatPlaceTemplate::class, 'mat_place_template_info_id');
    }

    public function placeInfos(): HasMany
    {
        return $this->hasMany(MatPlaceInfo::class, 'mat_place_template_info_id');
    }

    /**
     * Sorts mat places firstly by row, secondly by order in row
     * @return MatPlaceInfo[]
     */
    public function getPlaceInfosSorted(): array
    {
        return $this->placeInfos->sortBy(function (MatPlaceInfo $placeInfo) {
            return $placeInfo->row * 100 + $placeInfo->order;
        })->all();
    }

    /**
     * @return array<int, MatPlaceInfo[]>
     */
    public function getPlaceInfosByRow(): array
    {
        return $this->placeInfos->groupBy('row')->all();
    }
}
