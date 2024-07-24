<?php

namespace App\Repositories;

use App\Http\Requests\Public\GetMatImageRequest;
use App\Models\Color;
use App\Models\MatImage;
use App\Models\MatMaterial;

class MatImageRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(MatImage::class);
    }

    public function getByRequest(GetMatImageRequest $request): ?MatImage
    {
        $innerColor = Color::query()->where('name', $request->color)->first();
        $borderColor = Color::query()->where('name', $request->border_color)->first();
        $material = MatMaterial::query()->where('name', $request->material)->first();

        /** @var ?MatImage */
        return $this->firstBy([
            'inner_color_id' => $innerColor->id,
            'border_color_id' => $borderColor->id,
            'material_id' => $material->id,
        ]);
    }
}
