<?php

namespace App\Http\Repository\Frontend;

use App\Models\CarCondition;

class CarConditionRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }
    public static function index()
    {
        return CarCondition::orderBy('id', 'desc')
            ->get();
    }
}
