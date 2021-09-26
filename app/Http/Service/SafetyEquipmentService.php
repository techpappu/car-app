<?php

namespace App\Http\Service;

use App\Http\Repository\SafetyEquipmentRepository;
use App\Http\Resources\SafetyEquipmentResource;
use App\Traits\RespondsWithHttpStatus;

class SafetyEquipmentService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return SafetyEquipmentResource::collection(SafetyEquipmentRepository::index());
    }
}
