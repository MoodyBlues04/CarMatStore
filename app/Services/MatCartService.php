<?php

namespace App\Services;

use App\Http\Requests\Public\CalcMatPriceRequest;
use App\Models\Accessory;
use App\Models\Mat;
use App\Models\MatPlace;
use App\Models\MatPlaceInfo;
use App\Repositories\AccessoryRepository;
use App\Repositories\MatPlaceInfoRepository;

class MatCartService
{
    public function __construct(
        private readonly AccessoryRepository $accessoryRepository,
        private readonly MatPlaceInfoRepository $matPlaceInfoRepository
    ) {
    }

    public function makeBill(Mat $mat, CalcMatPriceRequest $request): array
    {
//        TODO refactor this shit

        $bill = [
            ['name' => "Тариф: $request->tariff"],
            ['name' => "Материал: $request->material"],
        ];
        $this->addIfExist($bill, $request, 'emblem', 'Эмблема');
        $this->addIfExist($bill, $request, 'color', 'Цвет');
        $this->addIfExist($bill, $request, 'border_color', 'Цвет окантовки');

        foreach ($request->accessory as $accessoryName => $accessoryCount) {
            /** @var ?Accessory $accessory */
            $accessory = $this->accessoryRepository->firstBy(['name' => $accessoryName]);
            if ($accessoryCount <= 0 || is_null($accessory)) {
                continue;
            }
            $bill []= [
                'name' => $accessoryName,
                'price' => $accessory->price * $accessoryCount,
                'count' => $accessoryCount,
            ];
        }

        $places = $mat->template->places;

        if (sizeof($request->places) === $places->count()) {
            $templateTariff = $mat->template->tariffs()
                ->where('name', $request->tariff)->first();
            $bill []= [
                'name' => 'Комплект',
                'price' => $templateTariff->pivot->price,
                'count' => 1,
            ];
        } else {
            $placeInfosIds = $this->matPlaceInfoRepository->query()
                ->whereIn('name', $request->places)
                ->get()->map(fn (MatPlaceInfo $info) => $info->id)->all();

            /** @var MatPlace[] $places */
            $places = $mat->template->places()
                ->whereIn('mat_place_info_id', $placeInfosIds)
                ->get()->all();

            foreach ($places as $place) {
                $placeTariff = $place->tariffs()
                    ->where('name', $request->tariff)->first();
                $bill []= [
                    'name' => $place->matPlaceInfo->name,
                    'price' => $placeTariff->pivot->price,
                    'count' => 1,
                ];
            }
        }

        return $bill;
    }

    private function addIfExist(array &$bill, CalcMatPriceRequest $request, string $key, string $name): void
    {
        if ($request->query($key)) {
            $bill []= ['name' => "$name: {$request->query($key)}"];
        }
    }
}
