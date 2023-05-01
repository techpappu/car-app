<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\PriceCalculatorRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\Frontend\PriceCalculatorResource;

class PriceCalculatorService
{
    use RespondsWithHttpStatus;
  

    public function show($id)
    {
        $calculator = PriceCalculatorRepository::findById($id);
        if (!$calculator) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new PriceCalculatorResource($calculator);
    }

    public function portList($country)
    {
        return PriceCalculatorResource::collection(PriceCalculatorRepository::portList($country));
    }
   
    public function priceCalculate($country, $port)
    {
        $calculator = PriceCalculatorRepository::findByCountryAndPort($country, $port);
        if (!$calculator) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new PriceCalculatorResource($calculator);
    }
}
