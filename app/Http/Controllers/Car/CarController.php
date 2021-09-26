<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Service\BrandService;
use App\Http\Service\CarService;
use App\Http\Service\CarConditionService;
use App\Http\Service\EquipmentService;
use App\Http\Service\InteriorExteriorService;
use App\Http\Service\SafetyEquipmentService;
use App\Http\Service\SelfDrivingService;
use App\Http\Service\StandardFeatureService;

class CarController extends Controller
{
    public $carService;
    public $brandService;
    public $carConditionService;
    public $standardFeatureService;
    public $equipmentService;
    public $interiorExteriorService;
    public $selfDrivingService;
    public $safetyEquipmentService;
    public function __construct(
        CarService $carService,
        BrandService $brandService,
        CarConditionService $carConditionService,
        StandardFeatureService $standardFeatureService,
        EquipmentService $equipmentService,
        InteriorExteriorService $interiorExteriorService,
        SelfDrivingService $selfDrivingService,
        SafetyEquipmentService $safetyEquipmentService
    ) {
        $this->middleware('auth');
        $this->carService = $carService;
        $this->brandService = $brandService;
        $this->carConditionService = $carConditionService;
        $this->standardFeatureService = $standardFeatureService;
        $this->equipmentService = $equipmentService;
        $this->interiorExteriorService = $interiorExteriorService;
        $this->selfDrivingService = $selfDrivingService;
        $this->safetyEquipmentService = $safetyEquipmentService;
    }

    public function index()
    {
        $data = $this->carService->index();
        $brand = $this->brandService->allBrand();
        $carCondition = $this->carConditionService->index();
        $standardFeature = $this->standardFeatureService->index();
        $equipment = $this->equipmentService->index();
        $interiorExterior = $this->interiorExteriorService->index();
        $selfDriving = $this->selfDrivingService->index();
        $safetyEquipment = $this->safetyEquipmentService->index();
        return view('car.car', compact('data', 'brand', 'carCondition', 'standardFeature', 
        'equipment', 'interiorExterior', 'selfDriving', 'safetyEquipment'));
    }

    public function fetchbyPage()
    {
        $data = $this->carService->index();
        return view('car.car_pagination_data', compact('data'))->render();
    }
}
