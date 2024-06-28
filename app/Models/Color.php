<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $image_id
 * @property int $mat_tariff_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Image $image
 * @property MatTariff $tariff
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
        'image_id',
        'mat_tariff_id',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function tariff(): BelongsTo
    {
        return $this->belongsTo(MatTariff::class, 'mat_tariff_id');
    }
}
