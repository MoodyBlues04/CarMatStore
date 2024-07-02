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
    private array $bill;

    public function __construct(
        private readonly AccessoryRepository $accessoryRepository,
        private readonly MatPlaceInfoRepository $matPlaceInfoRepository
    ) {
    }

    public function makeBill(Mat $mat, CalcMatPriceRequest $request): array
    {
        $this->bill = [
            ['name' => "Тариф: {$request->query('tariff')}"],
            ['name' => "Материал: {$request->query('material')}"],
        ];
        $this->addIfExist($request, 'emblem', 'Эмблема');
        $this->addIfExist($request, 'color', 'Цвет');
        $this->addIfExist($request, 'border_color', 'Цвет окантовки');

        $this->addAccessory($request);

        if ($this->isComplectPLaces($mat, $request)) {
            $this->addComplectPrice($mat, $request);
        } else {
            $this->addPlacesPrices($mat, $request);
        }

        return $this->bill;
    }

    private function addAccessory(CalcMatPriceRequest $request): void
    {
        foreach ($request->query('accessory') as $accessoryName => $accessoryCount) {
            /** @var ?Accessory $accessory */
            $accessory = $this->accessoryRepository->firstBy(['name' => $accessoryName]);
            if ($accessoryCount <= 0 || is_null($accessory)) {
                continue;
            }
            $this->bill []= [
                'name' => $accessoryName,
                'price' => $accessory->price * $accessoryCount,
                'count' => $accessoryCount,
            ];
        }
    }

    private function isComplectPLaces(Mat $mat, CalcMatPriceRequest $request): bool
    {
        return sizeof($request->query('places')) === $mat->template->places->count();
    }

    private function addComplectPrice(Mat $mat, CalcMatPriceRequest $request): void
    {
        $templateTariff = $mat->template->tariffs()
            ->where('name', $request->query('tariff'))
            ->first();

        $this->bill []= [
            'name' => 'Комплект',
            'price' => $templateTariff->pivot->price,
            'count' => 1,
        ];
    }

    private function addPlacesPrices(Mat $mat, CalcMatPriceRequest $request): void
    {
        $placeInfosIds = $this->matPlaceInfoRepository->query()
            ->whereIn('name', $request->query('places'))
            ->get()->map(fn (MatPlaceInfo $info) => $info->id)->all();

        /** @var MatPlace[] $places */
        $places = $mat->template->places()
            ->whereIn('mat_place_info_id', $placeInfosIds)
            ->get()->all();

        foreach ($places as $place) {
            $placeTariff = $place->tariffs()
                ->where('name', $request->query('tariff'))
                ->first();

            $this->bill []= [
                'name' => $place->matPlaceInfo->name,
                'price' => $placeTariff->pivot->price,
                'count' => 1,
            ];
        }
    }

    private function addIfExist(CalcMatPriceRequest $request, string $key, string $name): void
    {
        if ($request->query($key)) {
            $this->bill []= ['name' => "$name: {$request->query($key)}"];
        }
    }
}
