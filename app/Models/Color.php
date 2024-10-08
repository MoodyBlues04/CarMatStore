<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $hex
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $tariffs
 */
class Color extends Model
{
    use HasFactory;

    public const INNER = 'inner';
    public const BORDER = 'border';
    public const TYPES = [self::INNER, self::BORDER];

    protected $fillable = [
        'name',
        'type',
        'hex',
    ];

    public function tariffs(): BelongsToMany
    {
        return $this->belongsToMany(MatTariff::class, 'tariffs_colors', 'color_id', 'mat_tariff_id');
    }
}
