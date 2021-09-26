<?php

namespace App\Http\Repository;

use App\Models\InteriorExterior;

class InteriorExteriorRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }
    public static function index()
    {
        return InteriorExterior::orderBy('id', 'desc')
            ->get();
    }
}
