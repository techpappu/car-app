<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\SelfDrivingRepository;
use App\Http\Resources\Frontend\SelfDrivingResource;
use App\Traits\RespondsWithHttpStatus;

class SelfDrivingService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return SelfDrivingResource::collection(SelfDrivingRepository::index());
    }
}
