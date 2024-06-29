<?php

namespace App\Repositories;

use App\Models\MatPlaceTemplate;

class MatPlaceTemplateRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatPlaceTemplate::class);
    }
}
