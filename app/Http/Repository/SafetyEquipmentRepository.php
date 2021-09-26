<?php

namespace App\Http\Repository;

use App\Models\SafetyEquipment;

class SafetyEquipmentRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }
    public static function index()
    {
        return SafetyEquipment::orderBy('id', 'desc')
            ->get();
    }
}
