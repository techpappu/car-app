<?php

namespace App\Http\Service;

use App\Http\Repository\ModelRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\ModelResource;

class ModelService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return ModelResource::collection(ModelRepository::index());
    }

    public function add($request)
    {
        $models = ModelRepository::store($request);
        if ($models) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function show($id)
    {
        $models = ModelRepository::findById($id);
        if (!$models) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new ModelResource($models);
    }

    public function update($request)
    {
        $models = ModelRepository::findById($request->id);
        if (!$models) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = ModelRepository::update($models, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $models = ModelRepository::findById($id);
        if (!$models) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(ModelRepository::delete($models));
    }
}
