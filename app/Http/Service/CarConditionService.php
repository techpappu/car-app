<?php

namespace App\Http\Service;

use App\Http\Repository\CarConditionRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Resources\CarConditionResource;

class CarConditionService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return CarConditionResource::collection(CarConditionRepository::index());
    }
}
