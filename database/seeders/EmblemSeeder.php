<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Repositories\EmblemRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmblemSeeder extends Seeder
{
    public function __construct(private readonly EmblemRepository $emblemRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultEmblems = [
            [
                'name' => 'audi',
                'path' => '/img/emblems.svg#audi',
            ],
            [
                'name' => 'bmw2',
                'path' => '/img/emblems.svg#bmw2',
            ],
            [
                'name' => 'chevrolet',
                'path' => '/img/emblems.svg#chevrolet',
            ],
            [
                'name' => 'haval',
                'path' => '/img/emblems.svg#haval',
            ],
            [
                'name' => 'honda',
                'path' => '/img/emblems.svg#honda',
            ],
            [
                'name' => 'Hyundai',
                'path' => '/img/emblems.svg#Hyundai',
            ],
            [
                'name' => 'kia',
                'path' => '/img/emblems.svg#kia',
            ],
            [
                'name' => 'lada',
                'path' => '/img/emblems.svg#lada',
            ],
            [
                'name' => 'mazda',
                'path' => '/img/emblems.svg#mazda',
            ],
            [
                'name' => 'lexus',
                'path' => '/img/emblems.svg#lexus',
            ],
            [
                'name' => 'mercedes',
                'path' => '/img/emblems.svg#mercedes',
            ],
            [
                'name' => 'mitsubishi',
                'path' => '/img/emblems.svg#mitsubishi',
            ],
            [
                'name' => 'nissan',
                'path' => '/img/emblems.svg#nissan',
            ],
            [
                'name' => 'landRover',
                'path' => '/img/emblems.svg#landRover',
            ],
            [
                'name' => 'skoda',
                'path' => '/img/emblems.svg#skoda',
            ],
            [
                'name' => 'tesla',
                'path' => '/img/emblems.svg#tesla',
            ],
            [
                'name' => 'Toyota',
                'path' => '/img/emblems.svg#Toyota',
            ],
            [
                'name' => 'volkswagen',
                'path' => '/img/emblems.svg#volkswagen',
            ],
        ];

        foreach ($defaultEmblems as $emblemData) {
            if (!$this->emblemRepository->exists(['name' => $emblemData['name']])) {
                $image = Image::createFromPath($emblemData['path']);
                $this->emblemRepository->create(['name' => $emblemData['name'], 'image_id' => $image->id]);
            }
        }
    }
}
