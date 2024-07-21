<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Repositories\SettingsRepository;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function __construct(private readonly SettingsRepository $settingsRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSettingsList = [
            [
                'key' => Settings::GSHEETS_ID,
                'title' => 'URL гугл таблиц',
                'value' => env('DEFAULT_SHEET_ID'),
            ],
            [
                'key' => Settings::TG_CHAT_ID,
                'title' => 'ID ТГ канала для отправки данных',
                'value' => env('DEFAULT_TG_CHAT_ID')
            ],
            [
                'key' => Settings::TG_CHAT_TOKEN,
                'title' => 'Токен для ТГ канала отправки данных',
                'value' => env('DEFAULT_TG_CHAT_TOKEN'),
            ],
            [
                'key' => Settings::TG_CONSULTATION_CHAT_TOKEN,
                'title' => 'Токен для ТГ канала кончультаций',
                'value' => env('DEFAULT_TG_CONSULTATION_CHAT_TOKEN'),
            ],
            [
                'key' => Settings::TG_CONSULTATION_CHAT_ID,
                'title' => 'ID ТГ канала консультаций',
                'value' => env('DEFAULT_TG_CONSULTATION_CHAT_ID'),
            ],
//            frontend stuff
            [
                'key' => Settings::HEADER_TITLE,
                'title' => 'Главный заголовок страницы',
                'value' => 'АВТОМОБИЛЬНЫЕ EVA-КОВРИКИ',
            ],
            [
                'key' => Settings::HEADER_TEXT,
                'title' => 'Текст заголовка страницы',
                'value' => 'БОЛЬШОЙ ВЫБОР ЦВЕТА И ОКАНТОВКИ',
            ],
            [
                'key' => Settings::CONTACT_PHONE,
                'title' => 'Контактный телефон',
                'value' => '99890126-22-66',
            ],
            [
                'key' => Settings::INST_LINK,
                'title' => 'Instagram',
                'value' => '#',
            ],
            [
                'key' => Settings::TG_LINK,
                'title' => 'Telegram',
                'value' => '#',
            ],
            [
                'key' => Settings::FACEBOOK_LINK,
                'title' => 'Facebook',
                'value' => '#',
            ],
        ];

        foreach ($defaultSettingsList as $settingData) {
            if (!$this->settingsRepository->exists(['key' => $settingData['key']])) {
                $this->settingsRepository->create($settingData);
            }
        }
    }
}
