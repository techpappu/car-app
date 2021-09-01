<?php

namespace App\Http\Service;

use App\Http\Repository\BrandRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\BrandResource;

class BrandService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return BrandResource::collection(BrandRepository::index());
    }

    public function add($request)
    {
        $brand = BrandRepository::store($request);
        if ($brand) {
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
