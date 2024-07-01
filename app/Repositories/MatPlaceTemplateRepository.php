<?php

namespace App\Repositories;

use App\Models\MatPlaceTemplate;
use App\Models\MatPlaceTemplateInfo;
use Illuminate\Database\Eloquent\Model;

class MatPlaceTemplateRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatPlaceTemplate::class);
    }

    public function createFromTemplateInfo(int|MatPlaceTemplateInfo $templateInfo): Model
    {
        if (is_int($templateInfo)) {
            $templateInfo = MatPlaceTemplateInfo::where('id', $templateInfo)->first();
        }
        if (is_null($templateInfo)) {
            throw new \InvalidArgumentException('Incorrect template info');
        }
        return $this->firstOrCreate(['mat_place_template_info_id' => $templateInfo->id]);
    }
}
