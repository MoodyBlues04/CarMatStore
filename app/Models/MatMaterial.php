<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property int $mat_tariff_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MatTariff $tariff
 */
class MatMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mat_tariff_id',
    ];

    public function tariff(): BelongsTo
    {
        return $this->belongsTo(MatTariff::class, 'mat_tariff_id');
    }
}
