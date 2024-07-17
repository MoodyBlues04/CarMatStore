<?php

namespace App\Services;

use App\Http\Requests\Public\CalcMatPriceRequest;
use App\Models\Accessory;
use App\Models\Mat;
use App\Models\MatPlace;
use App\Models\MatPlaceInfo;
use App\Models\MatPlaceTemplate;
use App\Repositories\AccessoryRepository;
use App\Repositories\MatPlaceInfoRepository;

class MatCartService
{
    private array $bill = [];
    private readonly AccessoryRepository $accessoryRepository;
    private readonly MatPlaceInfoRepository $matPlaceInfoRepository;

    public function __construct(
        private readonly Mat                 $mat,
        private readonly CalcMatPriceRequest $request
    ) {
        $this->accessoryRepository = new AccessoryRepository();
        $this->matPlaceInfoRepository = new MatPlaceInfoRepository();
    }

    public function makeBill(): array
    {
        $this->bill = [
            ['name' => "Тариф: {$this->request->query('tariff')}"],
            ['name' => "Материал: {$this->request->query('material')}"],
        ];
        $this->addIfExist('emblem', 'Эмблема');
        $this->addIfExist('color', 'Цвет');
        $this->addIfExist('border_color', 'Цвет окантовки');

        $this->addAccessory();

        if ($this->isComplectPlaces()) {
            $this->addComplectPrice();
        } else {
            $this->addSalonPlacesPrices();
        }
        $this->addBagPrice();

        return $this->bill;
    }

    private function addAccessory(): void
    {
        foreach ($this->request->query('accessory') as $accessoryName => $accessoryCount) {
            /** @var ?Accessory $accessory */
            $accessory = $this->accessoryRepository->firstBy(['name' => $accessoryName]);
            if ($accessoryCount <= 0 || is_null($accessory)) {
                continue;
            }
            $this->bill [] = [
                'name' => $accessoryName,
                'price' => $accessory->price * $accessoryCount,
                'count' => $accessoryCount,
            ];
        }
    }

    private function isComplectPlaces(): bool
    {
        return sizeof($this->getSalonMatPlaces()) === $this->mat->template->places->count();
    }

    private function addComplectPrice(): void
    {
        $templateTariff = $this->mat->template->tariffs()
            ->where('name', $this->request->query('tariff'))
            ->first();

        $this->bill [] = [
            'name' => 'Комплект',
            'price' => $templateTariff->pivot->price,
            'count' => 1,
        ];
    }

    private function addSalonPlacesPrices(): void
    {
        $places = $this->getSalonMatPlaces();
        $this->addPlacesPrices($places);
    }

    private function addBagPrice(): void
    {
        $bagTemplateTariff = $this->mat->bagTemplate->tariffs()
            ->where('name', $this->request->query('tariff'))
            ->first();

        $this->bill [] = [
            'name' => 'Багажник',
            'price' => $bagTemplateTariff->pivot->price,
            'count' => 1,
        ];
    }

    /**
     * @return MatPlace[]
     */
    private function getSalonMatPlaces(): array
    {
        return $this->getTemplatePlaces($this->mat->template);
    }

    /**
     * @return MatPlace[]
     */
    private function getTemplatePlaces(MatPlaceTemplate $template): array
    {
        $placeInfosIds = $this->getPlaceInfosIds();
        return $template->places()
            ->whereIn('mat_place_info_id', $placeInfosIds)
            ->get()->all();
    }

    private function getPlaceInfosIds(): array
    {
        return $this->matPlaceInfoRepository->query()
            ->whereIn('name', $this->request->query('places'))
            ->get()->map(fn(MatPlaceInfo $info) => $info->id)->all();
    }

    /**
     * @param MatPlace[] $places
     */
    private function addPlacesPrices(array $places): void
    {
        foreach ($places as $place) {
            $placeTariff = $place->tariffs()
                ->where('name', $this->request->query('tariff'))
                ->first();

            $this->bill [] = [
                'name' => $place->matPlaceInfo->name,
                'price' => $placeTariff->pivot->price,
                'count' => 1,
            ];
        }
    }

    private function addIfExist(string $key, string $name): void
    {
        if ($this->request->query($key)) {
            $this->bill [] = ['name' => "$name: {$this->request->query($key)}"];
        }
    }
}
