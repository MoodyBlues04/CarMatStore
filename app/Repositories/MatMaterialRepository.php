<?php

namespace App\Repositories;

use App\Models\MatMaterial;

class MatMaterialRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatMaterial::class);
    }
}
