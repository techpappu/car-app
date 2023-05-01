<?php

namespace App\Http\Repository\Frontend;

use App\Models\Brand;

class BrandRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function allBrand()
    {
        return Brand::orderBy('id', 'desc')
            ->get();
    }   
   
}
