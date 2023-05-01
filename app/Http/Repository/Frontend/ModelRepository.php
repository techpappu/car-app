<?php

namespace App\Http\Repository\Frontend;

use App\Models\Models;

class ModelRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function getModelsByBrand($brandId)
    {

        return Models::select('id', 'name')
            ->where('brand_id', $brandId)
            ->get();
    }
}
