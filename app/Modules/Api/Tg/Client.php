<?php

namespace App\Modules\Api\Tg;

use GuzzleHttp\Client as HttpClient;

class Client
{
    private const HOST = 'https://api.telegram.org/bot';

    private string $botToken;
    private HttpClient $client;

    public function __construct(string $botToken)
    {
        $this->client = new HttpClient();
        $this->botToken = $botToken;
    }

    public function setToken(string $botToken): void
    {
        $this->botToken = $botToken;
    }

    public function get(string $url, array $query = [], array $headers = []): array
    {
        return $this->request('GET', $url, $query, $headers);
    }

    public function post(string $url, array $query = [], array $headers = []): array
    {
        return $this->request('POST', $url, $query, $headers);
    }

    private function request(string $method, string $url, array $query = [], array $headers = []): array
    {
        $response = $this->client->request($method, $this->getBaseUrl() . $url, [
            'query' => $query,
            'headers' => $headers
        ])->getBody()->getContents();

        return json_decode($response, true);
    }

    private function getBaseUrl(): string
    {
        return self::HOST . $this->botToken;
    }
}
