<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function __construct(private readonly BrandRepository $brandRepository)
    {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $brands = $this->brandRepository->getAll();
        return view('admin.brand.index', compact('brands'));
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        if (!$brand->delete()) {
            throw new \Exception('Cannot delete brand');
        }
        return redirect()->route('admin.brand.index');
    }
}
