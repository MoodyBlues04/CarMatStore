<?php

namespace Database\Seeders;

use App\Repositories\MatTariffRepository;
use Illuminate\Database\Seeder;

class MatTariffSeeder extends Seeder
{
    public function __construct(private readonly MatTariffRepository $matTariffRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultTariffs = [
            'light',
            'classic',
            'premium-basic',
            'premium-pro',
        ];

        foreach ($defaultTariffs as $idx => $tariffName) {
            $this->matTariffRepository->firstOrCreate(['name' => $tariffName, 'quality' => $idx]);
        }
    }
}
