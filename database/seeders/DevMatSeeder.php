<?php

namespace Database\Seeders;

use App\Models\MatPlace;
use App\Models\MatPlaceTemplate;
use App\Models\MatPlaceTemplateInfo;
use App\Models\MatTariff;
use App\Repositories\BrandRepository;
use App\Repositories\MatPlaceRepository;
use App\Repositories\MatPlaceTemplateInfoRepository;
use App\Repositories\MatPlaceTemplateRepository;
use App\Repositories\MatRepository;
use App\Repositories\MatTariffRepository;
use Illuminate\Database\Seeder;

class DevMatSeeder extends Seeder
{
    public function __construct(
        private readonly MatRepository              $matRepository,
        private readonly BrandRepository            $brandRepository,
        private readonly MatPlaceTemplateRepository $matPlaceTemplateRepository,
        private readonly MatPlaceTemplateInfoRepository $matPlaceTemplateInfoRepository,
        private readonly MatPlaceRepository $matPlaceRepository,
        private readonly MatTariffRepository $matTariffRepository
    ) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var MatPlaceTemplateInfo[] $templateInfos */
        $templateInfos = $this->matPlaceTemplateInfoRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $tariffIds = $this->matTariffRepository->getAllIds();

        foreach ($brands as $idx => $brand) {
            $templateIdx = random_int(0, sizeof($templateInfos) - 1);
            $templateInfo = $templateInfos[$templateIdx];
            /** @var MatPlaceTemplate $template */
            $template = $this->matPlaceTemplateRepository->createFromTemplateInfo($templateInfo);
            foreach ($tariffIds as $tariffId) {
                $template->tariffs()->attach($tariffId, ['price' => random_int(1, 1000)]);
            }
            foreach ($templateInfo->placeInfos as $placeInfo) {
                /** @var MatPlace $place */
                $place = $this->matPlaceRepository->createFromPlaceInfo($placeInfo, $template);
                foreach ($tariffIds as $tariffId) {
                    $place->tariffs()->attach($tariffId, ['price' => random_int(1, 1000)]);
                }
            }
            $this->matRepository->create([
                'model' => "test_{$idx}",
                'car_image_id' => 1, // random img
                'mat_place_template_id' => $template->id,
                'brand_id' => $brand->id,
            ]);
        }
    }
}
