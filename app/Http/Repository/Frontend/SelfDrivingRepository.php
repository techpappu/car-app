<?php

namespace App\Http\Repository\Frontend;

use App\Models\SelfDriving;

class SelfDrivingRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }
    public static function index()
    {
        return SelfDriving::orderBy('id', 'desc')
            ->get();
    }
}
