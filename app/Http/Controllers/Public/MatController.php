<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Mat;
use App\Repositories\AccessoryRepository;
use App\Repositories\EmblemRepository;
use App\Repositories\MatRepository;
use App\Repositories\MatTariffRepository;
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
}
