<?php

namespace App\Repositories;

use App\Models\Emblem;

class EmblemRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Emblem::class);
    }
}
