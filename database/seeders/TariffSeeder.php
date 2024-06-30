<?php

namespace Database\Seeders;

use App\Repositories\MatTariffRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
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
            'premiun-basic',
            'premium-pro',
        ];

        foreach ($defaultTariffs as $tariffName) {
            $this->matTariffRepository->firstOrCreate(['name' => $tariffName]);
        }
    }
}
