<?php

namespace App\Repositories;

use App\Models\MatTariff;

class MatTariffRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatTariff::class);
    }

    /**
     * @return int[]
     */
    public function getAllIds(): array
    {
        return $this->mapAll(fn (MatTariff $tariff) => $tariff->id);
    }
}
