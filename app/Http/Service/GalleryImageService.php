<?php

namespace App\Http\Service;

use App\Http\Repository\GalleryImageRepository;
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
        $gallery = GalleryImageRepository::findById($id);
        if (!$gallery) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return $gallery;
    }

    public function update($request)
    {
        $gallery = GalleryImageRepository::findById($request->id);
        if (!$gallery) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = GalleryImageRepository::update($gallery, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $galleryImage = GalleryImageRepository::findById($id);
        if (!$galleryImage) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(GalleryImageRepository::delete($galleryImage));
    }
}
