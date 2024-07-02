<?php

namespace App\Modules\Api\Tg;

use App\Models\Settings;
use GuzzleHttp\Client as HttpClient;

class Client
{
    private const HOST = '';

    private string $botToken;
    private HttpClient $client;

    public function __construct()
    {
        $this->botToken = Settings::get(Settings::TG_CHAT_TOKEN);
        $this->client = new HttpClient();
    }

    public function get(string $url, array $query = [], array $headers = [])
    {
        return $this->client->get($this->getBaseUrl() . $url, [
            'query' => $query,
            'headers' => $headers
        ])->getBody()->getContents();
    }

//    public function post(string $url, array $data = [], array $headers = [])
//    {
//
//    }

    private function getBaseUrl(): string
    {
        return "https://api.telegram.org/bot{$this->botToken}";
    }
}
