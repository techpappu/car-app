<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\BrandRepository;
use App\Http\Repository\Frontend\GalleryImageRepository;
use App\Http\Resources\Frontend\BrandResource;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;

class GalleryImageService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return GalleryImageRepository::index();
    }

    public function allGallery()
    {
        return GalleryImageRepository::allGallery();
    }
    
    public function add($request)
    {
        $gallery = GalleryImageRepository::store($request);
        if ($gallery) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function show($id)
    {   
        $brand = BrandRepository::findById($id);
        if (!$brand) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new BrandResource($brand);
    }

    public function update($request)
    {
        $brand = BrandRepository::findById($request->id);
        if (!$brand) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = BrandRepository::update($brand, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $brand = BrandRepository::findById($id);
        if (!$brand) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(BrandRepository::delete($brand));
    }
}
