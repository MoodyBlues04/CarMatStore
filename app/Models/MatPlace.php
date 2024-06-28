<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $price
 * @property int $mat_tariff_id
 * @property int $mat_place_info_id
 * @property int $mat_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Mat $mat
 * @property MatPlaceInfo $matPlaceInfo
 * @property MatTariff $tariff
 */
class MatPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'mat_tariff_id',
        'mat_place_info_id',
        'mat_id',
    ];

    public function mat(): BelongsTo
    {
        return $this->belongsTo(Mat::class, 'mat_id');
    }

    public function matPlaceInfo(): BelongsTo
    {
        return $this->belongsTo(MatPlaceInfo::class, 'mat_place_info_id');
    }

    public function tariff(): BelongsTo
    {
        return $this->belongsTo(MatTariff::class, 'mat_tariff_id');
    }
}
