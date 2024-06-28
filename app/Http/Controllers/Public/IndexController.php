<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Repositories\ArticleRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct(
        private readonly ArticleRepository $articleRepository,
        private readonly GalleryRepository $galleryRepository
    ) {
    }

    public function index(): View|\Illuminate\Http\RedirectResponse
    {
        if (!auth()->guest() && auth()->user()->is_admin) {
            return redirect()->route('admin.index');
        }

        $articles = $this->articleRepository->getAll();
        $galleryImages = $this->galleryRepository->getAll();
        $imageUrlsChunks = collect($galleryImages)
            ->map(fn (Gallery $gallery) => $gallery->image->getPublicUrl())
            ->chunk(4)
            ->map(fn (Collection $collection) => $collection->all())
            ->all();

//        dd($imageUrlsChunks);
        return view('public.index', compact('articles', 'imageUrlsChunks'));
    }

    public function product(): View
    {
        return view('public.product');
    }
}
