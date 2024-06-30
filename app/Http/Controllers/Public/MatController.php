<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\BuyMatRequest;
use App\Models\Mat;
use App\Repositories\AccessoryRepository;
use App\Repositories\EmblemRepository;
use App\Repositories\MatRepository;
use App\Repositories\MatTariffRepository;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatController extends Controller
{
    public function __construct(
        private readonly MatRepository $matRepository,
        private readonly MatTariffRepository $matTariffRepository,
        private readonly AccessoryRepository $accessoryRepository,
        private readonly EmblemRepository $emblemRepository
    ) {
//        $this->middleware('auth');
    }

    public function show(Mat $mat): View
    {
        $accessories = $this->accessoryRepository->getAll();
        $emblems = $this->emblemRepository->getAll();
        $tariffs = $this->matTariffRepository->query()
            ->with(['colors', 'materials'])
            ->get()->all();
        return view('public.mat.show', compact('mat', 'tariffs', 'accessories', 'emblems'));
    }

    public function calc(Mat $mat, Request $request): JsonResponse
    {
//        TODO ajax request to calc cost of mat e t c
        return response()->json(['status' => true, 'data' => [
            'model' => $mat,
            'request' => $request,
        ]]);
    }

    public function buy(Mat $mat, BuyMatRequest $request): JsonResponse
    {
//        TODO buy request to send to tg
        dd($request);
    }
}
