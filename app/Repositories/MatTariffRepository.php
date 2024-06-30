<?php

namespace App\Repositories;

use App\Models\MatTariff;

class MatTariffRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatTariff::class);
    }
}
