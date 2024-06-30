<?php

namespace App\Repositories;

use App\Models\Color;

class ColorRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Color::class);
    }
}
