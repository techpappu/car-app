<?php

namespace App\Http\Service;

use App\Http\Repository\ColorRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\ColorResource;

class ColorService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return ColorResource::collection(ColorRepository::index());
    }

    public function allBrand()
    {
        return ColorResource::collection(ColorRepository::allBodyStyle());
    }

    public function add($request)
    {
        $color = ColorRepository::store($request);
        if ($color) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function show($id)
    {
        $color = ColorRepository::findById($id);
        if (!$color) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new ColorResource($color);
    }

    public function update($request)
    {
        $color = ColorRepository::findById($request->id);
        if (!$color) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = ColorRepository::update($color, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $color = ColorRepository::findById($id);
        if (!$color) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(ColorRepository::delete($color));
    }
}
