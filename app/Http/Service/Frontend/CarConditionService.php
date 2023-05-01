<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\CarConditionRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Resources\Frontend\CarConditionResource;

class CarConditionService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return CarConditionResource::collection(CarConditionRepository::index());
    }
}
