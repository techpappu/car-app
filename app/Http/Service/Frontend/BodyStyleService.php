<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\BodyStyleRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\Frontend\BodyStyleResource;

class BodyStyleService
{
    use RespondsWithHttpStatus;
    public function allBodyStyle()
    {
        return BodyStyleResource::collection(BodyStyleRepository::allBodyStyle());
    }
}
