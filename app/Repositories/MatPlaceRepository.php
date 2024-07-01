<?php

namespace App\Repositories;

use App\Models\MatPlace;
use App\Models\MatPlaceInfo;
use App\Models\MatPlaceTemplate;
use Illuminate\Database\Eloquent\Model;

class MatPlaceRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatPlace::class);
    }

    public function createFromPlaceInfo(MatPlaceInfo $placeInfo, MatPlaceTemplate $template): Model
    {
        return $this->firstOrCreate([
            'mat_place_info_id' => $placeInfo->id,
            'mat_place_template_id' => $template->id,
        ]);
    }
}
