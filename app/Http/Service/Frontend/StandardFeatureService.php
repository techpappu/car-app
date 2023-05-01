<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\StandardFeatureRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Resources\Frontend\StandardFeatureResource;

class StandardFeatureService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return StandardFeatureResource::collection(StandardFeatureRepository::index());
    }
}
