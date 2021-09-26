<?php

namespace App\Http\Service;

use App\Http\Repository\InteriorExteriorRepository;
use App\Http\Repository\SelfDrivingRepository;
use App\Http\Resources\InteriorExteriorResource;
use App\Http\Resources\SelfDrivingResource;
use App\Traits\RespondsWithHttpStatus;

class SelfDrivingService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return SelfDrivingResource::collection(SelfDrivingRepository::index());
    }
}
