<?php

namespace App\Repositories;

use App\Models\MatPlaceTemplateInfo;

class TemplateInfoRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatPlaceTemplateInfo::class);
    }
}
