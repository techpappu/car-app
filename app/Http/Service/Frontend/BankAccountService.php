<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\BankAccountRepository;
use App\Http\Repository\Frontend\DeliveryAddressRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\Frontend\ShowCarResource;

class BankAccountService
{
    
    use RespondsWithHttpStatus;
    public function index()
    {
        return BankAccountRepository::index();
    } 
    
    public function add($request)
    {

        $address = DeliveryAddressRepository::store($request);
        if ($address) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function show($id)
    {
        $car = DeliveryAddressRepository::findById($id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new ShowCarResource($car);
    }

    public function update($request)
    {
        $car = DeliveryAddressRepository::findById($request->id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = DeliveryAddressRepository::update($car, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $car = DeliveryAddressRepository::findById($id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(DeliveryAddressRepository::delete($car));
    }
   
}
