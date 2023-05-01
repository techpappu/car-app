<?php

namespace App\Http\Service;

use App\Http\Repository\PriceCalculatorRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\PriceCalculatorResource;

class PriceCalculatorService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return PriceCalculatorResource::collection(PriceCalculatorRepository::index());
    }

    public function add($request)
    {
        $existCheck = PriceCalculatorRepository::existCheck($request);
       
        if ($existCheck) {
            return $this->failure(trans("messages.exist"), Response::HTTP_CONFLICT);
        }
            $calculator = PriceCalculatorRepository::store($request);
            if ($calculator) {
                return $this->success(trans('messages.add'), Response::HTTP_CREATED);
            }
        
    }

    public function show($id)
    {
        $calculator = PriceCalculatorRepository::findById($id);
        if (!$calculator) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new PriceCalculatorResource($calculator);
    }

    public function update($request)
    {
        $calculator = PriceCalculatorRepository::findById($request->id);
        if (!$calculator) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        
        $existCheckInUpdate = PriceCalculatorRepository::existCheckInUpdate($request);
       
        if ($existCheckInUpdate) {
            return $this->failure(trans("messages.exist"), Response::HTTP_CONFLICT);
        }

        $isUpdated = PriceCalculatorRepository::update($calculator, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $calculator = PriceCalculatorRepository::findById($id);
        if (!$calculator) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(PriceCalculatorRepository::delete($calculator));
    }
}
