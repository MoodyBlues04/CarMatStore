<?php

namespace Database\Seeders;

use App\Repositories\BrandRepository;
use App\Repositories\MatPlaceTemplateRepository;
use App\Repositories\MatRepository;
use Illuminate\Database\Seeder;

class DevMatSeeder extends Seeder
{
    public function __construct(
        private readonly MatRepository              $matRepository,
        private readonly BrandRepository            $brandRepository,
        private readonly MatPlaceTemplateRepository $matPlaceTemplateRepository
    ) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!$this->matPlaceTemplateRepository->exists(['name' => 'test_templ'])) {
            $this->matPlaceTemplateRepository->create(['name' => 'test_templ']);
        }
        $template = $this->matPlaceTemplateRepository->firstBy(['name' => 'test_templ']);
        $brands = $this->brandRepository->getAll();

        foreach ($brands as $idx => $brand) {
            $this->matRepository->create([
                'model' => "test_{$idx}",
                'car_image_id' => 1, // random img
                'mat_place_template_id' => $template->id,
                'brand_id' => $brand->id,
            ]);
        }
    }
}
