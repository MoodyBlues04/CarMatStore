<?php

namespace Database\Seeders;

use App\Models\MatMaterial;
use App\Models\MatTariff;
use App\Repositories\MatMaterialRepository;
use Illuminate\Database\Seeder;

class MatMaterialSeeder extends Seeder
{
    public function __construct(private readonly MatMaterialRepository $matMaterialRepository) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultMaterials = [
            [
                'name' => 'ромб',
                'tariffs' => ['light', 'classic', 'premium-basic', 'premium-pro'],
            ],
            [
                'name' => 'соты',
                'tariffs' => ['premium-basic', 'premium-pro'],
            ],
        ];

        foreach ($defaultMaterials as $materialData) {
            if (!$this->matMaterialRepository->exists(['name' => $materialData['name']])) {
                $tariffs = MatTariff::query()
                    ->whereIn('name', $materialData['tariffs'])
                    ->get()
                    ->map(fn (MatTariff $tariff) => $tariff->id)
                    ->all();
                /** @var MatMaterial $material */
                $material = $this->matMaterialRepository->create(['name' => $materialData['name']]);
                $material->tariffs()->attach($tariffs);
            }
        }
    }
}
