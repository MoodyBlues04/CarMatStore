<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property ?string $value
 * @property ?string $title
 * @property boolean $hidden
 * @property string $created_at
 * @property string $updated_at
 */
class Settings extends Model
{
    use HasFactory;

    public const GSHEETS_URL = 'gsheets_url';
    public const TG_CHAT_ID = 'tg_chat_id';
    public const TG_CHAT_TOKEN = 'tg_chat_token';
    public const TG_CONSULTATION_CHAT_ID = 'tg_consultation_chat_id';
    public const TG_CONSULTATION_CHAT_TOKEN = 'tg_consultation_chat_token';

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'value',
    ];

    public static function get(string $key, ?string $default = null): ?string
    {
        return self::query()->where('key', $key)->first()->value ?? $default;
    }

    public static function set(string $key, string $value): bool
    {
        /** @var Settings $setting */
        if ($setting = self::get($key)) {
            $setting->value = $value;
            return $setting->save();
        }
        return (bool)self::query()->create(['key' => $key, 'value' => $value]);
    }

    public static function exists(string $key): bool
    {
        return (bool)self::query()->where($key, 'key')->exists();
    }
}
