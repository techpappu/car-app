<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\EquipmentRepository;
use App\Http\Resources\Frontend\EquipmentResource;
use App\Traits\RespondsWithHttpStatus;

class EquipmentService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return EquipmentResource::collection(EquipmentRepository::index());
    }
}
