<?php

namespace App\Modules\Api\Tg;

class Api
{
    private readonly Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendMessage(string $channelId, string $message)
    {
        return $this->client->get('/sendMessage', [
            'chat_id' => $channelId,
            'text' => $message,
        ]);
    }
}
