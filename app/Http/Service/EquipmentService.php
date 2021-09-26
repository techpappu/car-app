<?php

namespace App\Http\Service;

use App\Http\Repository\EquipmentRepository;
use App\Http\Resources\EquipmentResource;
use App\Traits\RespondsWithHttpStatus;

class EquipmentService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return EquipmentResource::collection(EquipmentRepository::index());
    }
}
