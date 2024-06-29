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
                'key' => Settings::GSHEETS_URL,
                'title' => 'URL гугл таблиц',
            ],
            [
                'key' => Settings::TG_CHAT_ID,
                'title' => 'ID ТГ канала для отправки данных',
            ],
            [
                'key' => Settings::TG_CHAT_TOKEN,
                'title' => 'Токен для ТГ канала отправки данных',
            ],
            [
                'key' => Settings::TG_CONSULTATION_CHAT_TOKEN,
                'title' => 'Токен для ТГ канала кончультаций',
            ],
            [
                'key' => Settings::TG_CONSULTATION_CHAT_ID,
                'title' => 'ID ТГ канала консультаций',
            ],
        ];

        foreach ($defaultSettingsList as $settingData) {
            if (!$this->settingsRepository->exists(['key' => $settingData['key']])) {
                $this->settingsRepository->create($settingData);
            }
        }
    }
}
