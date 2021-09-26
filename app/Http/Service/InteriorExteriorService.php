<?php

namespace App\Http\Service;

use App\Http\Repository\InteriorExteriorRepository;
use App\Http\Resources\InteriorExteriorResource;
use App\Traits\RespondsWithHttpStatus;

class InteriorExteriorService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return InteriorExteriorResource::collection(InteriorExteriorRepository::index());
    }
}
