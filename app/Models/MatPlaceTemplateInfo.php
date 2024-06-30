<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $placeInfos
 * @property Collection $templates
 */
class MatPlaceTemplateInfo extends Model
{
    protected $table = 'mat_place_template_infos';

    protected $fillable = [
        'name',
    ];

    public function templates(): HasMany
    {
        return $this->hasMany(MatPlaceTemplate::class, 'mat_place_template_info_id');
    }

    public function placeInfos(): HasMany
    {
        return $this->hasMany(MatPlaceInfo::class, 'mat_place_template_info_id');
    }
}
