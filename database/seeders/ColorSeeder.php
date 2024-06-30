<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\MatTariff;
use App\Repositories\ColorRepository;
use App\Repositories\MatTariffRepository;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function __construct(
        private readonly ColorRepository $colorRepository,
        private readonly MatTariffRepository $matTariffRepository
    ) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultColors = [
            [
                'name' => 'ochre',
                'hex' => '#b79764',
                'type' => Color::INNER,
            ],
            [
                'name' => 'white',
                'hex' => '#f1f1f1',
                'type' => Color::INNER,
            ],
            [
                'name' => 'malin',
                'hex' => '#643c44',
                'type' => Color::INNER,
            ],
            [
                'name' => 'grey',
                'hex' => '#393939',
                'type' => Color::INNER,
            ],
            [
                'name' => 'purple',
                'hex' => '#8739b4',
                'type' => Color::INNER,
            ],
            [
                'name' => 'light-brown',
                'hex' => '#7f634c',
                'type' => Color::INNER,
            ],
            [
                'name' => 'red',
                'hex' => '#dd503a',
                'type' => Color::INNER,
            ],
            [
                'name' => 'orange',
                'hex' => '#de6f30',
                'type' => Color::INNER,
            ],
            [
                'name' => 'pink',
                'hex' => '#fb79af',
                'type' => Color::INNER,
            ],
            [
                'name' => 'light-grey',
                'hex' => '#4a4a4a',
                'type' => Color::INNER,
            ],
            [
                'name' => 'yellow',
                'hex' => '#fff455',
                'type' => Color::INNER,
            ],
            [
                'name' => 'blue',
                'hex' => '#3d5cbc',
                'type' => Color::INNER,
            ],
            [
                'name' => 'light-orange',
                'hex' => '#daa65b',
                'type' => Color::INNER,
            ],
            [
                'name' => 'dark-green',
                'hex' => '#11463c',
                'type' => Color::INNER,
            ],
            [
                'name' => 'light-green',
                'hex' => '#77ae3e',
                'type' => Color::INNER,
            ],
            [
                'name' => 'white-1',
                'hex' => '#efe9dc',
                'type' => Color::INNER,
            ],
            [
                'name' => 'brown',
                'hex' => '#635041',
                'type' => Color::INNER,
            ],
            [
                'name' => 'red-2',
                'hex' => '#c04f3a',
                'type' => Color::INNER,
            ],
            [
                'name' => 'dark-grey',
                'hex' => '#363b51',
                'type' => Color::INNER,
            ],
            [
                'name' => 'ochre',
                'hex' => '#b79764',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'white',
                'hex' => '#f1f1f1',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'malin',
                'hex' => '#643c44',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'grey',
                'hex' => '#393939',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'purple',
                'hex' => '#8739b4',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'light-brown',
                'hex' => '#7f634c',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'black',
                'hex' => '#000000',
                'type' => Color::INNER,
            ],
        ];

        $tariffs = $this->matTariffRepository->query()
            ->get()->map(fn (MatTariff $tariff) => $tariff->id)->all();
        $premiumTariffs = $this->matTariffRepository->query()
            ->whereIn('name', ['classic', 'premium-basic', 'premium-pro'])
            ->get()->map(fn (MatTariff $tariff) => $tariff->id)->all();


        foreach ($defaultColors as $colorData) {
            /** @var Color $color */
            $color = $this->colorRepository->firstOrCreate($colorData);
            if (!$color->wasRecentlyCreated) {
                continue;
            }

            if ($color->type === Color::BORDER) {
                $color->tariffs()->attach($tariffs);
            } else if ($color->type === Color::INNER) {
                if (in_array($color->name, ['black', 'grey'])) {
                    $color->tariffs()->attach($tariffs);
                } else {
                    $color->tariffs()->attach($premiumTariffs);
                }
            }
        }
    }
}
