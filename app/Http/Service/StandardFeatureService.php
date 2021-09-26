<?php

namespace App\Http\Service;

use App\Http\Repository\StandardFeatureRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Resources\StandardFeatureResource;

class StandardFeatureService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return StandardFeatureResource::collection(StandardFeatureRepository::index());
    }
}
