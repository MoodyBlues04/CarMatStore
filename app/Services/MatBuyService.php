<?php

namespace App\Services;

use App\Http\Requests\Public\BuyMatRequest;
use App\Models\Mat;
use App\Models\Settings;
use App\Modules\Api\Tg\Api;

class MatBuyService
{
    private string $token;
    private string $chatId;
    private Api $api;

    public function __construct()
    {
        $this->token = Settings::get(Settings::TG_CHAT_TOKEN);
        $this->chatId = Settings::get(Settings::TG_CHAT_ID);
        if (is_null($this->token) || is_null($this->chatId)) {
            throw new \LogicException('Bot token not found in settings');
        }
        $this->api = new Api($this->token);
    }

    public function buy(Mat $mat, BuyMatRequest $request): bool
    {
        return $this->api->sendMessage($this->chatId, $this->makeMessage($request));
    }

    private function makeMessage(BuyMatRequest $request): string
    {
        return "Заказ коврика:\n```\n" . json_encode($request->validated(), JSON_UNESCAPED_UNICODE) . "\n```";
    }
}
