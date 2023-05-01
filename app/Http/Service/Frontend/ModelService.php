<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\ModelRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Resources\Frontend\ModelResource;

class ModelService
{
    use RespondsWithHttpStatus;
    public function getModelsByBrand($brandId)
    {
        return ModelResource::collection(ModelRepository::getModelsByBrand($brandId));
    }
}
