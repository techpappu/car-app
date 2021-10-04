<?php

namespace App\Http\Service;

use App\Http\Repository\CarRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\CarResource;
use App\Http\Resources\ShowCarResource;

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

    public function show($id)
    {
        $car = CarRepository::findById($id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new ShowCarResource($car);
    }

    public function update($request)
    {
        $car = CarRepository::findById($request->id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = CarRepository::update($car, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $car = CarRepository::findById($id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(CarRepository::delete($car));
    }
}
