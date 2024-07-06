<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

    protected static function boot(): void
    {
        parent::boot();
        static::deleting(function(Image $image) {
            Storage::delete($image->path);
      });
    }

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

        return self::createFromPath("$storagePath/$originalName");
    }

    public static function createFromPath(string $path): Image
    {
        /** @var Image */
        return self::query()->create(['path' => $path]);
    }

    public function getPublicUrl(): string
    {
        $replacement = env('APP_ENV') == 'local' ? 'storage' : 'storage/app/public';
        return str_replace('public', $replacement, asset($this->path));
    }
}
