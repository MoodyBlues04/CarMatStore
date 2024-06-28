<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct(private readonly ArticleRepository $articleRepository)
    {
    }

    public function index(): View|\Illuminate\Http\RedirectResponse
    {
        if (!auth()->guest() && auth()->user()->is_admin) {
            return redirect()->route('admin.index');
        }

//        $arr = [1, 2, 3, 4, 5];
//        $collection = collect($arr)->chunk(4)->map(fn (\Illuminate\Support\Collection $c) => $c->all())->all();
//        dd($collection);

        $articles = $this->articleRepository->getAll();
        return view('public.index', compact('articles'));
    }

    public function product(): View
    {
        return view('public.product');
    }
}
