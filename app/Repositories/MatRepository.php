<?php

namespace App\Repositories;

use App\Models\Mat;

class MatRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Mat::class);
    }
}
