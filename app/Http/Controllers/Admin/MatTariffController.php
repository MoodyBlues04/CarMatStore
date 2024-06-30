<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateMatTariffRequest;
use App\Repositories\MatTariffRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatTariffController extends Controller
{
    public function __construct(private readonly MatTariffRepository $matTariffRepository)
    {
    }

    public function index(): View
    {
        $tariffs = $this->matTariffRepository->getAll();
        return view('admin.tariff.index', compact('tariffs'));
    }

    public function create(): View
    {
        return view('admin.tariff.create');
    }

    public function store(CreateMatTariffRequest $request): RedirectResponse
    {
        if (!$this->matTariffRepository->createFromRequest($request)) {
            throw new \Exception('Cannot create tariff');
        }
        return redirect()->route('admin.tariff.index')
            ->with('success', 'Tariff created');
    }
}
