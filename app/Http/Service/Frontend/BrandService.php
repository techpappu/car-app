<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\BrandRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Resources\Frontend\BrandResource;

class BrandService
{
    use RespondsWithHttpStatus;

    public function allBrand()
    {
        return BrandResource::collection(BrandRepository::allBrand());
    }    
  
}
