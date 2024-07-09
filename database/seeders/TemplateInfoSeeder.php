<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\MatPlaceInfo;
use App\Models\MatPlaceTemplateInfo;
use App\Repositories\MatPlaceInfoRepository;
use App\Repositories\TemplateInfoRepository;
use Illuminate\Database\Seeder;

class TemplateInfoSeeder extends Seeder
{
    public function __construct(
        private readonly TemplateInfoRepository $templateInfoRepository,
        private readonly MatPlaceInfoRepository $matPlaceInfoRepository
    ) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultTemplates = [
            [
                'name' => '4 местный обычный',
                'type' => MatPlaceTemplateInfo::TYPE_SALON,
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '/img/mat_place.svg#left_1',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '/img/mat_place.svg#right_1',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '/img/mat_place.svg#left_2',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '/img/mat_place.svg#right_2',
                        'row' => 2,
                        'order' => 2,
                    ],
                ],
            ],
            [
                'name' => '4 местный с перемычкой',
                'type' => MatPlaceTemplateInfo::TYPE_SALON,
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '/img/mat_place.svg#left_1',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '/img/mat_place.svg#right_1',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '/img/mat_place.svg#left_2',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => MatPlaceInfo::LINTEL_MAT_PLACE_NAME,
                        'image' => '/img/mat_place.svg#small_2',
                        'row' => 2,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '/img/mat_place.svg#right_2',
                        'row' => 2,
                        'order' => 3,
                    ],
                ],
            ],
            [
                'name' => '4 местный сплошной',
                'type' => MatPlaceTemplateInfo::TYPE_SALON,
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '/img/mat_place.svg#left_1',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '/img/mat_place.svg#right_1',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний сплошной',
                        'image' => '/img/mat_place.svg#full_2',
                        'row' => 2,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '6 местный обычный',
                'type' => MatPlaceTemplateInfo::TYPE_SALON,
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '/img/mat_place.svg#left_1',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '/img/mat_place.svg#right_1',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '/img/mat_place.svg#left_2',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '/img/mat_place.svg#right_2',
                        'row' => 2,
                        'order' => 2,
                    ],
                    [
                        'name' => '3 ряд',
                        'image' => '/img/mat_place.svg#full_3',
                        'row' => 3,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '6 местный с перемычкой',
                'type' => MatPlaceTemplateInfo::TYPE_SALON,
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '/img/mat_place.svg#left_1',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '/img/mat_place.svg#right_1',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '/img/mat_place.svg#left_2',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => MatPlaceInfo::LINTEL_MAT_PLACE_NAME,
                        'image' => '/img/mat_place.svg#small_2',
                        'row' => 2,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '/img/mat_place.svg#right_2',
                        'row' => 2,
                        'order' => 3,
                    ],
                    [
                        'name' => '3 ряд',
                        'image' => '/img/mat_place.svg#full_3',
                        'row' => 3,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '6 местный сплошной',
                'type' => MatPlaceTemplateInfo::TYPE_SALON,
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '/img/mat_place.svg#left_1',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '/img/mat_place.svg#left_1',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний сплошной',
                        'image' => '/img/mat_place.svg#full_2',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => '3 ряд',
                        'image' => '/img/mat_place.svg#full_3',
                        'row' => 3,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '2 местный',
                'type' => MatPlaceTemplateInfo::TYPE_SALON,
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '/img/mat_place.svg#left_big_1',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '/img/mat_place.svg#right_big_1',
                        'row' => 1,
                        'order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'BAG 1',
                'type' => MatPlaceTemplateInfo::TYPE_BAG,
                'places' => [
                    [
                        'name' => 'Багажник',
                        'image' => '/img/mat_place.svg#bag',
                        'row' => 1,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => 'BAG 2',
                'type' => MatPlaceTemplateInfo::TYPE_BAG,
                'places' => [
                    [
                        'name' => 'Большой Багажник',
                        'image' => '/img/mat_place.svg#bag',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Маленький Багажник',
                        'image' => '/img/mat_place.svg#bag',
                        'row' => 2,
                        'order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'BAG 3',
                'type' => MatPlaceTemplateInfo::TYPE_BAG,
                'places' => [
                    [
                        'name' => 'Багажник 2 ярус',
                        'image' => '/img/mat_place.svg#bag_2',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Багажник 1 ярус',
                        'image' => '/img/mat_place.svg#bag_1',
                        'row' => 2,
                        'order' => 2,
                    ],
                ],
            ],
        ];

//                  TODO real image set
        foreach ($defaultTemplates as $templateData) {
            $templateInfo = $this->templateInfoRepository->firstOrCreate([
                'name' => $templateData['name'],
                'type' => $templateData['type'],
            ]);
            if (!$templateInfo->wasRecentlyCreated) {
                continue;
            }
            foreach ($templateData['places'] as $placeData) {
                $image = Image::createFromPath($placeData['image']);
                $this->matPlaceInfoRepository->create([
                    'name' => $placeData['name'],
                    'mat_place_template_info_id' => $templateInfo->id,
                    'row' => $placeData['row'],
                    'order' => $placeData['order'],
                    'image_id' => $image->id,
                ]);
            }
        }
    }
}
