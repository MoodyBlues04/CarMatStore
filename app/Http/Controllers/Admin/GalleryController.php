<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateGalleryRequest;
use App\Models\Gallery;
use App\Models\Image;
use App\Repositories\GalleryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __construct(private readonly GalleryRepository $galleryRepository)
    {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $galleryImages = $this->galleryRepository->getAll();
        return view('admin.gallery.index', compact('galleryImages'));
    }

    public function create(): View
    {
//        TODO seeder for default images
//        TODO set size of gallery images ???
        return view('admin.gallery.create');
    }

    public function store(CreateGalleryRequest $request): RedirectResponse
    {
        $image = Image::storeUploadedFile($request->file('image'), 'public/gallery');
        if (!$this->galleryRepository->create(['image_id' => $image->id])) {
            throw new \Exception('Cannot create gallery image');
        }
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery img created');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        if (!$gallery->delete()) {
            throw new \Exception('Cannot delete gallery image');
        }
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery img deleted');
    }
}
