<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Image;
use App\Models\MatMaterial;
use App\Repositories\ColorRepository;
use App\Repositories\MatImageRepository;
use App\Repositories\MatMaterialRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MatImageSeeder extends Seeder
{
    public function __construct(
        private readonly MatImageRepository $matImageRepository,
        private readonly ColorRepository $colorRepository,
        private readonly MatMaterialRepository $matMaterialRepository
    ) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var MatMaterial[] $materials */
        $materials = $this->matMaterialRepository->getAll();
        /** @var Color[] $innerColors */
        $innerColors = $this->colorRepository->allBy(['type' => Color::INNER]);
        /** @var Color[] $borderColors */
        $borderColors = $this->colorRepository->allBy(['type' => Color::BORDER]);
        foreach ($materials as $material) {
            foreach ($innerColors as $innerColor) {
                foreach ($borderColors as $borderColor) {
                    $imagePath = "backup/mat_images/{$material->name}/{$borderColor->name}-{$innerColor->name}.png";
                    if (!Storage::exists($imagePath)) {
                        continue;
                    }
                    $newPath = str_replace('backup', 'public', $imagePath);
                    if (!Storage::exists($newPath)) {
                        Storage::copy($imagePath, $newPath);
                    }
                    
                    $image = Image::createFromPath($newPath);
                    $this->matImageRepository->firstOrCreate([
                        'inner_color_id' => $innerColor->id,
                        'border_color_id' => $borderColor->id,
                        'material_id' => $material->id,
                        'image_id' => $image->id,
                    ]);
                }
            }
        }
    }
}
