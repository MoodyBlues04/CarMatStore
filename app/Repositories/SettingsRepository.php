<?php

namespace App\Repositories;

use App\Models\Settings;

class SettingsRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Settings::class);
    }

    public function getNotHidden(): array
    {
        return $this->allBy(['hidden' => false]);
    }
}
