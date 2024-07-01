<?php

namespace Database\Seeders;

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
                'name' => 'Обычный',
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '',
                        'row' => 2,
                        'order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Обычный с перемычкой',
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Перемычка',
                        'image' => '',
                        'row' => 2,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '',
                        'row' => 2,
                        'order' => 3,
                    ],
                ],
            ],
            [
                'name' => 'Обычный сплошной',
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний сплошной',
                        'image' => '',
                        'row' => 2,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '6-местный обычный',
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '',
                        'row' => 2,
                        'order' => 2,
                    ],
                    [
                        'name' => '3 ряд',
                        'image' => '',
                        'row' => 3,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '6-местный с перемычкой',
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний левый',
                        'image' => '',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Перемычка',
                        'image' => '',
                        'row' => 2,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний правый',
                        'image' => '',
                        'row' => 2,
                        'order' => 3,
                    ],
                    [
                        'name' => '3 ряд',
                        'image' => '',
                        'row' => 3,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '6-местный сплошной',
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '',
                        'row' => 1,
                        'order' => 2,
                    ],
                    [
                        'name' => 'Задний сплошной',
                        'image' => '',
                        'row' => 2,
                        'order' => 1,
                    ],
                    [
                        'name' => '3 ряд',
                        'image' => '',
                        'row' => 3,
                        'order' => 1,
                    ],
                ],
            ],
            [
                'name' => '2-местный',
                'places' => [
                    [
                        'name' => 'Водительский',
                        'image' => '',
                        'row' => 1,
                        'order' => 1,
                    ],
                    [
                        'name' => 'Пассажирский',
                        'image' => '',
                        'row' => 1,
                        'order' => 2,
                    ],
                ],
            ],
        ];

//                  TODO real image set
        foreach ($defaultTemplates as $templateData) {
            $templateInfo = $this->templateInfoRepository->firstOrCreate(['name' => $templateData['name']]);
            if ($templateInfo->wasRecentlyCreated) {
                foreach ($templateData['places'] as $placeData) {
                    $this->matPlaceInfoRepository->create([
                        'name' => $placeData['name'],
                        'mat_place_template_info_id' => $templateInfo->id,
                        'row' => $placeData['row'],
                        'order' => $placeData['order'],
                    ]);
                }
            }
        }
    }
}
