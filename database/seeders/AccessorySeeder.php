<?php

namespace Database\Seeders;

use App\Repositories\AccessoryRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    public function __construct(private readonly AccessoryRepository $accessoryRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultAccessory = [
            [
                'name' => 'клипсы',
                'max_count' => 20,
                'price' => 1000,
            ],
            [
                'name' => 'клипсы универсальные',
                'max_count' => 10,
                'price' => 1500,
            ],
            [
                'name' => 'подпятник',
                'max_count' => 1,
                'price' => 3000,
            ],
        ];

        foreach ($defaultAccessory as $accessoryData) {
            $this->accessoryRepository->firstOrCreate($accessoryData);
        }
    }
}
