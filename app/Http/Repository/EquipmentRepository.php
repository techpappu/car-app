<?php

namespace App\Http\Repository;

use App\Models\Equipment;
use App\Models\StandardFeature;

class EquipmentRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }
    public static function index()
    {
        return Equipment::orderBy('id', 'desc')
            ->get();
    }
}
