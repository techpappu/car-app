<?php

namespace App\Http\Service;

use App\Http\Repository\BodyStyleRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\BodyStyleResource;

class BodyStyleService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return BodyStyleResource::collection(BodyStyleRepository::index());
    }

    public function allBodyStyle()
    {
        return BodyStyleResource::collection(BodyStyleRepository::allBodyStyle());
    }

    public function add($request)
    {
        $bodyStyle = BodyStyleRepository::store($request);
        if ($bodyStyle) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function show($id)
    {
        $bodyStyle = BodyStyleRepository::findById($id);
        if (!$bodyStyle) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new BodyStyleResource($bodyStyle);
    }

    public function update($request)
    {
        $bodyStyle = BodyStyleRepository::findById($request->id);
        if (!$bodyStyle) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = BodyStyleRepository::update($bodyStyle, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $bodyStyle = BodyStyleRepository::findById($id);
        if (!$bodyStyle) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(BodyStyleRepository::delete($bodyStyle));
    }
}
