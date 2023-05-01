<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\InteriorExteriorRepository;
use App\Http\Resources\Frontend\InteriorExteriorResource;
use App\Traits\RespondsWithHttpStatus;

class InteriorExteriorService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return InteriorExteriorResource::collection(InteriorExteriorRepository::index());
    }
}
