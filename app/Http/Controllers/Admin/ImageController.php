<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $images = Image::query()
            ->where('path', 'like', '%/images/%') // only from 'images' folder
            ->get()->all();
        return view('admin.image.index', compact('images'));
    }

    public function create(): View
    {
        return view('admin.image.create');
    }

    public function store(CreateImageRequest $request): View
    {
        $imageUrls = collect($request->file('images'))->map(function (UploadedFile $uploadedImage) {
            $image = Image::storeUploadedFile($uploadedImage, 'public/images');
            return $image->getPublicUrl();
        })->all();
        return view('admin.image.created_list', compact('imageUrls'));
    }
}
