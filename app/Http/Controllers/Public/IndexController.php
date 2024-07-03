<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\ConsultationRequest;
use App\Http\Requests\Public\SearchRequest;
use App\Models\Gallery;
use App\Models\Mat;
use App\Repositories\ArticleRepository;
use App\Repositories\BrandRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\MatRepository;
use App\Services\ConsultationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct(
        private readonly ArticleRepository $articleRepository,
        private readonly GalleryRepository $galleryRepository,
        private readonly BrandRepository $brandRepository,
        private readonly MatRepository $matRepository,
        private readonly ConsultationService $consultationService
    ) {
    }

    public function index(): View|RedirectResponse
    {
        if (!auth()->guest() && auth()->user()->is_admin) {
            return redirect()->route('admin.index');
        }

        $brands = $this->brandRepository->query()->with('mats')->get()->all();
        $articles = $this->articleRepository->getAll();
        $galleryImages = $this->galleryRepository->getAll();
        $imageUrlsChunks = collect($galleryImages)
            ->map(fn (Gallery $gallery) => $gallery->image->getPublicUrl())
            ->chunk(4)
            ->map(fn (Collection $collection) => $collection->all())
            ->all();

        return view('public.index', compact(
            'articles',
            'imageUrlsChunks',
            'brands'
        ));
    }

    /**
     * For ajax searching, if more ajax - create special controller
     * @param SearchRequest $request
     * @return JsonResponse
     */
    public function search(SearchRequest $request): JsonResponse
    {
        $mats = [];
        if ($request->has('search')) {
            $mats = $this->matRepository->query()
                ->where('model', 'like', "%$request->search%")
                ->limit(10)
                ->get()
                ->map(fn (Mat $mat) => ['model' => $mat->model, 'id' => $mat->id])
                ->all();
        }
        return response()->json(['status' => true, 'data' => $mats]);
    }

    public function about(): View
    {
        return view('public.about');
    }

    public function orderInstruction(): View
    {
        return view('public.order_instruction');
    }

    public function consultation(ConsultationRequest $request): View|RedirectResponse
    {
        $this->consultationService->run($request);

        return redirect()->route('public.index')
            ->with('success', 'Consultation requested');
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
