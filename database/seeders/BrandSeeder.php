<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Repositories\BrandRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function __construct(private readonly BrandRepository $brandRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultBrands = [
            [
                'name' => 'aiways',
                'path' => '/img/sprite.svg#1',
            ],
            [
                'name' => 'audi',
                'path' => '/img/sprite.svg#audi',
            ],
            [
                'name' => 'baic',
                'path' => '/img/sprite.svg#baic',
            ],
            [
                'name' => 'bmw',
                'path' => '/img/sprite.svg#bmw',
            ],
            [
                'name' => 'buick',
                'path' => '/img/sprite.svg#buick',
            ],
            [
                'name' => 'byd',
                'path' => '/img/sprite.svg#byd',
            ],
            [
                'name' => 'cadillac',
                'path' => '/img/sprite.svg#cadillac',
            ],
            [
                'name' => 'changan',
                'path' => '/img/sprite.svg#changan',
            ],
            [
                'name' => 'chery',
                'path' => '/img/sprite.svg#chery',
            ],
            [
                'name' => 'chevrolet',
                'path' => '/img/sprite.svg#chevrolet',
            ],
            [
                'name' => 'daewoo',
                'path' => '/img/sprite.svg#daewoo',
            ],
            [
                'name' => 'daihatsu',
                'path' => '/img/sprite.svg#daihatsu',
            ],
            [
                'name' => 'dayun',
                'path' => '/img/sprite.svg#dayun',
            ],
            [
                'name' => 'denza',
                'path' => '/img/sprite.svg#denza',
            ],
            [
                'name' => 'dodge',
                'path' => '/img/sprite.svg#dodge',
            ],
            [
                'name' => 'dongfeng',
                'path' => '/img/sprite.svg#dongfeng',
            ],
            [
                'name' => 'enovate',
                'path' => '/img/sprite.svg#enovate',
            ],
            [
                'name' => 'faw',
                'path' => '/img/sprite.svg#faw',
            ],
            [
                'name' => 'fiat',
                'path' => '/img/sprite.svg#fiat',
            ],
            [
                'name' => 'ford',
                'path' => '/img/sprite.svg#ford',
            ],
            [
                'name' => 'foton',
                'path' => '/img/sprite.svg#foton',
            ],
            [
                'name' => 'gac',
                'path' => '/img/sprite.svg#gac',
            ],
            [
                'name' => 'geely',
                'path' => '/img/sprite.svg#geely',
            ],
            [
                'name' => 'hanteng',
                'path' => '/img/sprite.svg#hanteng',
            ],
            [
                'name' => 'haval',
                'path' => '/img/sprite.svg#haval',
            ],
            [
                'name' => 'honda',
                'path' => '/img/sprite.svg#honda',
            ],
            [
                'name' => 'hozon',
                'path' => '/img/sprite.svg#hozon',
            ],
            [
                'name' => 'huawei',
                'path' => '/img/sprite.svg#huawei',
            ],
            [
                'name' => 'hyundai',
                'path' => '/img/sprite.svg#hyundai',
            ],
            [
                'name' => 'infinity',
                'path' => '/img/sprite.svg#infinity',
            ],
            [
                'name' => 'isuzu',
                'path' => '/img/sprite.svg#isuzu',
            ],
            [
                'name' => 'jac',
                'path' => '/img/sprite.svg#jac',
            ],
            [
                'name' => 'jaguar',
                'path' => '/img/sprite.svg#jaguar',
            ],
            [
                'name' => 'jeep',
                'path' => '/img/sprite.svg#jeep',
            ],
            [
                'name' => 'jetour',
                'path' => '/img/sprite.svg#jetour',
            ],
            [
                'name' => 'jmc',
                'path' => '/img/sprite.svg#jmc',
            ],
            [
                'name' => 'kai',
                'path' => '/img/sprite.svg#kai',
            ],
            [
                'name' => 'karry',
                'path' => '/img/sprite.svg#karry',
            ],
            [
                'name' => 'kia',
                'path' => '/img/sprite.svg#kia',
            ],
            [
                'name' => 'lada',
                'path' => '/img/sprite.svg#lada',
            ],
            [
                'name' => 'leap',
                'path' => '/img/sprite.svg#leap',
            ],
            [
                'name' => 'lexus',
                'path' => '/img/sprite.svg#lexus',
            ],
            [
                'name' => 'mg',
                'path' => '/img/sprite.svg#mg',
            ],
            [
                'name' => 'mazda',
                'path' => '/img/sprite.svg#mazda',
            ],
            [
                'name' => 'mercedes-benz',
                'path' => '/img/sprite.svg#mercedes-benz',
            ],
            [
                'name' => 'mini',
                'path' => '/img/sprite.svg#mini',
            ],
            [
                'name' => 'mitsubishi',
                'path' => '/img/sprite.svg#mitsubishi',
            ],
            [
                'name' => 'neta',
                'path' => '/img/sprite.svg#neta',
            ],
            [
                'name' => 'nio',
                'path' => '/img/sprite.svg#nio',
            ],
            [
                'name' => 'nissan',
                'path' => '/img/sprite.svg#nissan',
            ],
            [
                'name' => 'opel',
                'path' => '/img/sprite.svg#opel',
            ],
            [
                'name' => 'pegeot',
                'path' => '/img/sprite.svg#pegeot',
            ],
            [
                'name' => 'porsche',
                'path' => '/img/sprite.svg#porsche',
            ],
            [
                'name' => 'land rover',
                'path' => '/img/sprite.svg#land_rover',
            ],
            [
                'name' => 'renault',
                'path' => '/img/sprite.svg#renault',
            ],
            [
                'name' => 'shineray',
                'path' => '/img/sprite.svg#shineray',
            ],
            [
                'name' => 'skoda',
                'path' => '/img/sprite.svg#skoda',
            ],
            [
                'name' => 'skywell',
                'path' => '/img/sprite.svg#skywell',
            ],
            [
                'name' => 'Suzuki',
                'path' => '/img/sprite.svg#suzuki',
            ],
            [
                'name' => 'tesla',
                'path' => '/img/sprite.svg#tesla',
            ],
            [
                'name' => 'toyota',
                'path' => '/img/sprite.svg#toyota',
            ],
            [
                'name' => 'uaz',
                'path' => '/img/sprite.svg#uaz',
            ],
            [
                'name' => 'volkswagen',
                'path' => '/img/sprite.svg#volkswagen',
            ],
            [
                'name' => 'volvo',
                'path' => '/img/sprite.svg#volvo',
            ],
            [
                'name' => 'weltmeister',
                'path' => '/img/sprite.svg#weltmeister',
            ],
            [
                'name' => 'xpeng',
                'path' => '/img/sprite.svg#xpeng',
            ],
            [
                'name' => 'zaz',
                'path' => '/img/sprite.svg#zaz',
            ],
        ];

        foreach ($defaultBrands as $brandData) {
            if (!$this->brandRepository->exists(['name' => $brandData['name']])) {
                $image = Image::createFromPath($brandData['path']);
                $this->brandRepository->create(['name' => $brandData['name'], 'image_id' => $image->id]);
            }
        }
    }
}
