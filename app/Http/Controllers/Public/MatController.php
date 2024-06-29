<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Mat;
use App\Repositories\MatRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatController extends Controller
{
    public function __construct(private readonly MatRepository $matRepository)
    {
    }

    public function show(Mat $mat): View
    {
//        TODO doesnt really show it
        return view('public.mat.show', $mat);
    }
}
