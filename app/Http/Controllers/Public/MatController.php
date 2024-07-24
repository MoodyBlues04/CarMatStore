<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\BuyMatRequest;
use App\Http\Requests\Public\CalcMatPriceRequest;
use App\Http\Requests\Public\GetMatImageRequest;
use App\Models\Mat;
use App\Models\MatImage;
use App\Repositories\AccessoryRepository;
use App\Repositories\EmblemRepository;
use App\Repositories\MatImageRepository;
use App\Repositories\MatTariffRepository;
use App\Services\MatBuyService;
use App\Services\MatCartService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class MatController extends Controller
{
    public function __construct(
        private readonly MatTariffRepository $matTariffRepository,
        private readonly AccessoryRepository $accessoryRepository,
        private readonly MatImageRepository $matImageRepository,
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
            'data' => $matCartService->makeBill()
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

    public function image(GetMatImageRequest $request): JsonResponse
    {
        /** @var ?MatImage $matImage */
        $matImage = $this->matImageRepository->getByRequest($request);
        return response()->json([
            'status' => true,
            'data' => ['url' => $matImage ? $matImage->image->getPublicUrl() : MatImage::DEFAULT_MAT_IMG_URL],
        ]);
    }
}
