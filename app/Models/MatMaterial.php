<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property int $mat_tariff_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $tariffs
 */
class MatMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mat_tariff_id',
    ];

    public function tariffs(): BelongsToMany
    {
        return $this->belongsToMany(MatTariff::class, 'tariffs_materials', 'mat_material_id', 'mat_tariff_id');
    }
}
