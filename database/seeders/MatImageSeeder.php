<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Repositories\MatImageRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatImageSeeder extends Seeder
{
    public function __construct(private readonly MatImageRepository $matImageRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        todo run & add to DatabaseSeeder
        $defaultMatImages = [
            [
                'inner_color_id' => 0,
                'border_color_id' => 0,
                'material_id' => 0,
                'image_path' => '',
            ],
        ];

        foreach ($defaultMatImages as $matImageData) {
            $image = Image::createFromPath($matImageData['image_path']);
            unset($matImageData['image_path']);
            $matImageData['image_id'] = $image->id;
            $this->matImageRepository->firstOrCreate($matImageData);
        }
    }
}
