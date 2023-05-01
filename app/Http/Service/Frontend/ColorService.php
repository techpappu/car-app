<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\ColorRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\Frontend\ColorResource;

class ColorService
{
    use RespondsWithHttpStatus;
    public function allColor()
    {
        return ColorResource::collection(ColorRepository::allColor());
    }
}
