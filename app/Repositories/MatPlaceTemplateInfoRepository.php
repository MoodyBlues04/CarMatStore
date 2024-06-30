<?php

namespace App\Repositories;

use App\Models\MatPlaceTemplateInfo;

class MatPlaceTemplateInfoRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatPlaceTemplateInfo::class);
    }
}
