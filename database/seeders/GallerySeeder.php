<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Repositories\GalleryRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GallerySeeder extends Seeder
{
    public function __construct(private readonly GalleryRepository $galleryRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultImagePaths = [
            'backup/gallery-image-1-thumb.webp',
            'backup/gallery-image-2-thumb.webp',
            'backup/gallery-image-3-thumb.webp',
            'backup/gallery-image-4-thumb.webp',
            'backup/gallery-image-5-thumb.webp',
            'backup/gallery-image-6-thumb.webp',
        ];

        foreach ($defaultImagePaths as $imagePath) {
            if (Storage::exists($imagePath)) {
                $newPath = str_replace('backup', 'public/gallery', $imagePath);
                Storage::copy($imagePath, $newPath);
                $image = Image::createFromPath($newPath);
                $this->galleryRepository->create(['image_id' => $image->id]);
            }
        }
    }
}
