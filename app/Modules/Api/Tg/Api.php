<?php

namespace App\Modules\Api\Tg;

class Api
{
    private readonly Client $client;

    public function __construct(string $botToken)
    {
        $this->client = new Client($botToken);
    }

    public function sendMessage(string $channelId, string $message): bool
    {
        $response = $this->client->get('/sendMessage', [
            'chat_id' => $channelId,
            'text' => $message,
            'parse_mode' => 'MarkdownV2'
        ]);
        return isset($response['ok']) && $response['ok'];
    }
}
