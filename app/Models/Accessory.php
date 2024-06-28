<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $max_count
 * @property string $created_at
 * @property string $updated_at
 */
class Accessory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'max_count',
    ];
}
