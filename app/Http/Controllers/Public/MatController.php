<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\BuyMatRequest;
use App\Http\Requests\Public\CalcMatPriceRequest;
use App\Models\Mat;
use App\Repositories\AccessoryRepository;
use App\Repositories\EmblemRepository;
use App\Repositories\MatRepository;
use App\Repositories\MatTariffRepository;
use App\Services\MatBuyService;
use App\Services\MatCartService;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatController extends Controller
{
    public function __construct(
        private readonly MatTariffRepository $matTariffRepository,
        private readonly AccessoryRepository $accessoryRepository,
        private readonly EmblemRepository $emblemRepository,
        private readonly MatBuyService $matBuyService
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

    public function calc(Mat $mat, CalcMatPriceRequest $request): JsonResponse
    {
        $matCartService = new MatCartService($mat, $request);
        return response()->json([
            'status' => true,
            'data' => $matCartService->makeBill($mat, $request)
        ]);
    }

    public function buy(Mat $mat, BuyMatRequest $request): JsonResponse
    {
        $this->matBuyService->buy($mat, $request);

        return response()->json([
            'status' => true,
            'data' => $request->post(),
        ]);
    }
}
