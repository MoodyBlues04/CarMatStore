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
                'name' => 'бежевый',
                'hex' => '#b79764',
                'type' => Color::INNER,
            ],
            [
                'name' => 'белый',
                'hex' => '#f1f1f1',
                'type' => Color::INNER,
            ],
            [
                'name' => 'бордовый',
                'hex' => '#643c44',
                'type' => Color::INNER,
            ],
            [
                'name' => 'черный',
                'hex' => '#393939',
                'type' => Color::INNER,
            ],
            [
                'name' => 'фиолетовый',
                'hex' => '#8739b4',
                'type' => Color::INNER,
            ],
            [
                'name' => 'коричневый',
                'hex' => '#7f634c',
                'type' => Color::INNER,
            ],
            [
                'name' => 'красный',
                'hex' => '#dd503a',
                'type' => Color::INNER,
            ],
            [
                'name' => 'оранжевый',
                'hex' => '#de6f30',
                'type' => Color::INNER,
            ],
            [
                'name' => 'розовый',
                'hex' => '#fb79af',
                'type' => Color::INNER,
            ],
            [
                'name' => 'серый',
                'hex' => '#4a4a4a',
                'type' => Color::INNER,
            ],
            [
                'name' => 'серый',
                'hex' => '#4a4a4a',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'желтый',
                'hex' => '#fff455',
                'type' => Color::INNER,
            ],
            [
                'name' => 'желтый',
                'hex' => '#fff455',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'синий',
                'hex' => '#3d5cbc',
                'type' => Color::INNER,
            ],
            [
                'name' => 'синий',
                'hex' => '#3d5cbc',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'темно бежевый',
                'hex' => '#daa65b',
                'type' => Color::INNER,
            ],
            [
                'name' => 'темно зеленый',
                'hex' => '#11463c',
                'type' => Color::INNER,
            ],
            [
                'name' => 'Зеленый',
                'hex' => '#77ae3e',
                'type' => Color::INNER,
            ],
            [
                'name' => 'слоновая кость',
                'hex' => '#efe9dc',
                'type' => Color::INNER,
            ],
            [
                'name' => 'коричневый',
                'hex' => '#635041',
                'type' => Color::INNER,
            ],
            [
                'name' => 'коричневый',
                'hex' => '#635041',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'Теракотовый',
                'hex' => '#c04f3a',
                'type' => Color::INNER,
            ],
            [
                'name' => 'темно синий',
                'hex' => '#363b51',
                'type' => Color::INNER,
            ],
            [
                'name' => 'черный',
                'hex' => '#393939',
                'type' => Color::BORDER,
            ],
            [
                'name' => 'красный',
                'hex' => '#dd503a',
                'type' => Color::BORDER,
            ],
        ];

        $allTariffsIds = $this->matTariffRepository->getAllIds();
        foreach ($defaultColors as $colorData) {
            /** @var Color $color */
            $color = $this->colorRepository->firstOrCreate($colorData);
            if (!$color->wasRecentlyCreated) {
                continue;
            }
            if ($color->type === Color::BORDER) {
                $color->tariffs()->attach($allTariffsIds);
            }
        }

        $tariffToColors = [
            'light' => [
                'черный',
                'серый',
            ],
            'classic' => [
                'бежевый',
                'белый',
                'бордовый',
                'черный',
                'фиолетовый',
                'коричневый',
                'красный',
                'оранжевый',
                'розовый',
                'серый',
                'желтый',
                'синий',
                'темно бежевый',
                'темно зеленый',
                'Зеленый',
                'слоновая кость',
                'коричневый',
                'Теракотовый',
                'темно синий',
            ],
            'premium-basic' => [
                'черный',
                'серый',
            ],
            'premium-pro' => [
                'бордовый',
                'фиолетовый',
                'оранжевый',
                'синий',
                'темно зеленый',
                'слоновая кость',
                'коричневый',
                'темно синий',
            ],
        ];

        foreach ($tariffToColors as $tariffName => $colorsNames) {
            /** @var MatTariff $tariff */
            $tariff = $this->matTariffRepository->firstBy(['name' => $tariffName]);
            $colorIds = $this->colorRepository->query()
                ->where('type', Color::INNER)
                ->whereIn('name', $colorsNames)
                ->get()
                ->map(fn (Color $color) => $color->id)
                ->all();
            $tariff->colors()->attach($colorIds);
        }
    }
}
