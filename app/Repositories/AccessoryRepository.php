<?php

namespace App\Repositories;

use App\Models\Accessory;

class AccessoryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Accessory::class);
    }
}
