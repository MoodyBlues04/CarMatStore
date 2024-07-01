<?php

namespace App\Repositories;

use App\Models\MatPlaceInfo;

class MatPlaceInfoRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatPlaceInfo::class);
    }
}
