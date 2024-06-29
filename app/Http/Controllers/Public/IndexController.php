<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\ConsultationRequest;
use App\Models\Gallery;
use App\Repositories\ArticleRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct(
        private readonly ArticleRepository $articleRepository,
        private readonly GalleryRepository $galleryRepository
    ) {
    }

    public function index(): View|RedirectResponse
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

        return view('public.index', compact('articles', 'imageUrlsChunks'));
    }

    public function product(): View
    {
//        TODO temporary
        return view('public.product');
    }

    public function about(): View
    {
        return view('public.about');
    }

    public function consultation(ConsultationRequest $request): View|RedirectResponse
    {
        return redirect()->route('public.index')
            ->with('error', 'Consultation not implemented yet');
    }

    public function contacts(): View
    {
        return view('public.contacts');
    }

    public function privacyPolicy(): View
    {
        return view('public.privacy_policy');
    }
}
