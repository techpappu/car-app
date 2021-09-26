<?php

namespace App\Http\Repository;

use App\Models\CarCondition;
use App\Models\StandardFeature;

class StandardFeatureRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }
    public static function index()
    {
        return StandardFeature::orderBy('id', 'desc')
            ->get();
    }
}
