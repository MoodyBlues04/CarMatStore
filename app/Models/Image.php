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

    public static function getByPublicUrl(string $url): ?self
    {
        if (env('APP_ENV') == 'local') {
            $search = url() . '/storage';
        } else {
            $search = str_replace('/public', '', url('/')) . '/storage/app/public';
        }
        $replacement = 'public';

        $path = str_replace($search, $replacement, $url);
        /** @var ?self */
        return self::query()->where('path', 'like', "%$path%")->first();
    }

    public function getPublicUrl(): string
    {
        if (env('APP_ENV') == 'local') {
            $search = 'public';
            $replacement = 'storage';
        } else {
            $search = 'public/public';
            $replacement = 'storage/app/public';
        }
        return str_replace($search, $replacement, asset($this->path));
    }
}
