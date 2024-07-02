<?php

namespace App\Services;

use App\Http\Requests\Public\BuyMatRequest;
use App\Models\Mat;

class MatBuyService
{
    public function buy(Mat $mat, BuyMatRequest $request)
    {
//        todo validate and send to tg
        return [];
    }
}
