<?php

namespace App\Modules\Api\GoogleSheets;

use Google\Exception;

class Client
{
    /**
     * @throws Exception
     */
    public static function makeService()
    {
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $path = app_path() .  '/../credentials.json';
        $client->setAuthConfig($path);
        return new \Google_Service_Sheets($client);
    }
}
