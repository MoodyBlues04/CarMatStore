<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Image;
use App\Models\MatPlace;
use App\Models\MatPlaceInfo;
use App\Models\MatPlaceTemplate;
use App\Models\MatPlaceTemplateInfo;
use App\Modules\Api\GoogleSheets\Api;
use App\Repositories\BrandRepository;
use App\Repositories\MatPlaceRepository;
use App\Repositories\MatPlaceTemplateInfoRepository;
use App\Repositories\MatPlaceTemplateRepository;
use App\Repositories\MatRepository;
use App\Repositories\MatTariffRepository;
use Google\Service\Exception;

class GoogleSheetsService
{
    private const TEMPLATE_PRICE_START_CELL = 5;
    private const LINTEL_PRICE_START_CELL = 17;
    private const ROW_TO_PRICE_START_CELL = [
        1 => 9,
        2 => 13,
        3 => 21,
    ];

    public function __construct(
        private readonly Api $api,
        private readonly MatTariffRepository $matTariffRepository,
        private readonly BrandRepository $brandRepository,
        private readonly MatPlaceTemplateInfoRepository $matPlaceTemplateInfoRepository,
        private readonly MatPlaceTemplateRepository $matPlaceTemplateRepository,
        private readonly MatPlaceRepository $matPlaceRepository,
        private readonly MatRepository $matRepository
    ) {
    }

    /**
     * Table structure hard-coded - parsing depends on column number, not on header
     * @throws Exception
     */
    public function loadMatsFromSheet(string $sheetId): void
    {
        $rows = $this->api->getSheetData($sheetId, 'Упрощенная');

        dd($rows);
        
        $tariffIds = $this->matTariffRepository->getAllIds();
        foreach ($rows as $row) {
            if ($this->isBadRow($row)) {
                continue;
            }
            try {
                $templateInfo = $this->getSaloonTemplateInfo($row); // todo bag template info && load bag costs
                $template = $this->makeTemplate($row, $templateInfo, $tariffIds);
                $this->makePlaces($row, $template, $tariffIds);

                $bagTemplateInfo = $this->getBagTemplateInfo($row);

                $modelName = $this->parseValue($row, 2);
                $brand = $this->getBrand($row);
                $modelImage = $this->imageByUrl($row, 3);
                $this->matRepository->create([
                    'model' => $modelName,
                    'car_image_id' => $modelImage->id,
                    'mat_place_template_id' => $template->id,
                    'brand_id' => $brand->id,
                ]);
            } catch (\Exception $e) {
                dd($e->getMessage(), $row);
            }
        }
    }

    private function isBadRow(array $row): bool
    {
        return empty($row) || sizeof($row) < 22 || empty($row[4]) ||  $this->parseValue($row, 0) === 'бренд';
    }

    private function getBrand(array $row): Brand
    {
        $brandName = $this->strToLower($row, 0);
        /** @var Brand $brand */
        $brand = $this->brandRepository->firstBy(['name' => $brandName]);
        if (is_null($brand)) {
            $image = $this->imageByUrl($row, 1);
            $brand = $this->brandRepository->create(['name' => $brandName, 'image_id' => $image->id]);
        }
        return $brand;
    }

    private function getSaloonTemplateInfo(array $row): MatPlaceTemplateInfo
    {
        $templateName = $this->strToLower($row, 4);
        return $this->getTemplateInfo($templateName);
    }

    private function getBagTemplateInfo(array $row): MatPlaceTemplateInfo
    {
        $templateName = $this->strToUpper($row, 25);
        return $this->getTemplateInfo($templateName);
    }

    private function getTemplateInfo(string $templateName): MatPlaceTemplateInfo
    {
        /** @var ?MatPlaceTemplateInfo $templateInfo */
        $templateInfo = $this->matPlaceTemplateInfoRepository->firstBy(['name' => $templateName]);
        if (is_null($templateInfo)) {
            throw new \InvalidArgumentException("Invalid template name: $templateName");
        }
        return $templateInfo;
    }

    private function makeTemplate(array $row, MatPlaceTemplateInfo $templateInfo, array $tariffIds): MatPlaceTemplate
    {
        $template = $this->matPlaceTemplateRepository->createFromTemplateInfo($templateInfo);
        foreach ($tariffIds as $idx => $tariffId) {
            $price = $this->parsePrice($row, self::TEMPLATE_PRICE_START_CELL + $idx);
            $template->tariffs()->attach($tariffId, ['price' => $price]);
        }
        return $template;
    }

    private function makePlaces(array $row, MatPlaceTemplate $template, array $tariffIds): void
    {
        for ($rowIdx = 1; $rowIdx <= MatPlaceInfo::MAX_ROW; $rowIdx++) {
            /** @var MatPlaceInfo[] $placeInfos */
            $placeInfos = $template->templateInfo->placeInfos()
                ->where('row', $rowIdx)
                ->get()->all();
            if (empty($placeInfos)) {
                continue;
            }
            foreach ($placeInfos as $placeInfo) {
                /** @var MatPlace $place */
                $place = $this->matPlaceRepository->createFromPlaceInfo($placeInfo, $template);
                foreach ($tariffIds as $tariffIdx => $tariffId) {
                    if ($place->matPlaceInfo->name === MatPlaceInfo::LINTEL_MAT_PLACE_NAME) {
                        $priceIdx = self::LINTEL_PRICE_START_CELL + $tariffIdx;
                    } elseif ($rowIdx === MatPlaceInfo::MAX_ROW) {
                        $priceIdx = array_search('1', $row) + 1 + $tariffIdx;
                    } else {
                        $priceIdx = self::ROW_TO_PRICE_START_CELL[$rowIdx] + $tariffIdx;
                    }
                    $price = $this->parsePrice($row, $priceIdx);

                    $place->tariffs()->attach($tariffId, ['price' => $price]);
                }
            }
        }
    }

    private function imageByUrl(array $row, int $idx): Image
    {
        $url = $this->parseValue($row, $idx);
        $image = Image::getByPublicUrl($url);
        if (is_null($image)) {
            throw new \InvalidArgumentException("Expected image url from site, got: '{$url}'");
        }
        return $image;
    }

    private function parsePrice(array $row, int $idx): int
    {
        return (int)str_replace(' ', '', $this->parseValue($row, $idx));
    }

    private function strToLower(array $row, int $idx): string
    {
        return strtolower($this->parseValue($row, $idx));
    }

    private function strToUpper(array $row, int $idx): string
    {
        return strtoupper($this->parseValue($row, $idx));
    }

    private function parseValue(array $row, int $idx): string
    {
        return trim($row[$idx]);
    }
}
