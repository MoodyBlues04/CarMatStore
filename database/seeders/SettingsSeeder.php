<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Repositories\SettingsRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'key' => Settings::GSHEETS_URL_KEY,
                'title' => 'URL гугл таблиц',
            ],
            [
                'key' => Settings::TG_CHANNEL_KEY,
                'title' => 'ТГ канал для отправки данных',
            ]
        ];

        foreach ($defaultSettingsList as $settingData) {
            if (!$this->settingsRepository->exists(['key' => $settingData['key']])) {
                $this->settingsRepository->create($settingData);
            }
        }
    }
}
