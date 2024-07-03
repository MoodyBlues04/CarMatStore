<?php

namespace App\Modules\Api\GoogleSheets;

use Google\Exception;

class Api
{
    private readonly \Google_Service_Sheets $sheetsService;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->sheetsService = Client::makeService();
    }

    /**
     * @return array<int, string[]>
     * @throws \Google\Service\Exception
     */
    public function getSheetData(string $sheetId, string $worksheet): array
    {
        $response = $this->sheetsService->spreadsheets_values->get($sheetId, $worksheet);
        return $response->getValues();
    }
}
