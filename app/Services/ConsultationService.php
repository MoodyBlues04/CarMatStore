<?php

namespace App\Services;

use App\Http\Requests\Public\ConsultationRequest;
use App\Models\Settings;
use App\Modules\Api\Tg\Api;

class ConsultationService
{
    private string $token;
    private string $chatId;
    private Api $api;

    public function __construct()
    {
        $this->token = Settings::get(Settings::TG_CONSULTATION_CHAT_TOKEN);
        $this->chatId = Settings::get(Settings::TG_CONSULTATION_CHAT_ID);
        if (is_null($this->token) || is_null($this->chatId)) {
            throw new \LogicException('Bot token not found in settings');
        }
        $this->api = new Api($this->token);
    }

    public function run(ConsultationRequest $request): bool
    {
        return $this->api->sendMessage(
            $this->chatId,
            "Заявка на консультацию:\n" .
            "Имя: {$request->name}, телефон: {$request->phone}"
        );
    }
}
