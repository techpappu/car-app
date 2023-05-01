<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Service\GalleryImageService;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public $galleryImageService;
    public function __construct(GalleryImageService $galleryImageService)
    {
        $this->middleware('auth');
        $this->galleryImageService = $galleryImageService;
    }
    public function index()
    {
        $data = $this->galleryImageService->index();
        return view('car.gallery_image', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->galleryImageService->index();
        return view('car.gallery_pagination_data', compact('data'))->render();
    }

    public function add(Request $request)
    {
        return $this->galleryImageService->add($request);
    }
    public function show($id)
    {
        return $this->galleryImageService->show($id);
    }

    public function delete($id)
    {
        return $this->galleryImageService->delete($id);
    }
}
