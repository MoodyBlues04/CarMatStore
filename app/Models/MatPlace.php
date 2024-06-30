<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $mat_place_info_id
 * @property int $mat_place_template_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MatPlaceInfo $matPlaceInfo
 * @property MatPlaceTemplate $template
 * @property Collection $tariffs
 */
class MatPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'mat_place_info_id',
        'mat_place_template_id',
    ];

    public function matPlaceInfo(): BelongsTo
    {
        return $this->belongsTo(MatPlaceInfo::class, 'mat_place_info_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(MatPlaceTemplate::class, 'mat_place_template_id');
    }

    public function tariffs(): BelongsToMany
    {
        return $this->belongsToMany(MatTariff::class, 'place_prices', 'mat_place_id', 'mat_tariff_id')
            ->withPivot('price');
    }
}
