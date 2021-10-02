<?php

namespace App\Http\Service;

use App\Http\Repository\CarRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\CarResource;

class CarService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return CarResource::collection(CarRepository::index());
    }



    public function add($request)
    {

        $car = CarRepository::store($request);
        if ($car) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    /*  public function show($id)
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
    } */
}
