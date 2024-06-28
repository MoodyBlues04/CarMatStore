<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @property int $id
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
    ];

    /**
     * @param UploadedFile $file
     * @param string $storagePath path from /storage/app/ folder
     * @return Image
     * @throws \Exception
     */
    public static function storeUploadedFile(UploadedFile $file, string $storagePath): self
    {
        $originalName = $file->getClientOriginalName();

        if (!$file->storeAs($storagePath, $originalName)) {
            throw new \Exception("File saving failed");
        }

        return self::createFromPath("app/$storagePath/$originalName");
    }

    public static function createFromPath(string $path): Image
    {
        /** @var Image */
        return self::query()->create(['path' => $path]);
    }

    public function getPublicUrl(): string
    {
        return str_replace('app/public', 'storage', asset($this->path));
    }
}
