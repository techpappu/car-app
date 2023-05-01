<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\SafetyEquipmentRepository;
use App\Http\Resources\Frontend\SafetyEquipmentResource;
use App\Traits\RespondsWithHttpStatus;

class SafetyEquipmentService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return SafetyEquipmentResource::collection(SafetyEquipmentRepository::index());
    }
}
