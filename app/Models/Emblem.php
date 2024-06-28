<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $image_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Emblem extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'name',
    ];
}
