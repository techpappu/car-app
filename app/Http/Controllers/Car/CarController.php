<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarAddRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Http\Service\BodyStyleService;
use App\Http\Service\BrandService;
use App\Http\Service\CarService;
use App\Http\Service\CarConditionService;
use App\Http\Service\ColorService;
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
    public $bodyStyleService;
    public $colorService;
    public function __construct(
        CarService $carService,
        BrandService $brandService,
        CarConditionService $carConditionService,
        StandardFeatureService $standardFeatureService,
        EquipmentService $equipmentService,
        InteriorExteriorService $interiorExteriorService,
        SelfDrivingService $selfDrivingService,
        SafetyEquipmentService $safetyEquipmentService,
        BodyStyleService $bodyStyleService,
        ColorService $colorService
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
        $this->bodyStyleService = $bodyStyleService;
        $this->colorService = $colorService;
    }

    public function index()
    {
        $data = $this->carService->index();
        $brand = $this->brandService->allBrand();
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $colors = $this->colorService->allColor();
        $carCondition = $this->carConditionService->index();
        $standardFeature = $this->standardFeatureService->index();
        $equipment = $this->equipmentService->index();
        $interiorExterior = $this->interiorExteriorService->index();
        $selfDriving = $this->selfDrivingService->index();
        $safetyEquipment = $this->safetyEquipmentService->index();
        return view('car.car', compact(
            'data',
            'brand',
            'bodyStyle',
            'colors',
            'carCondition',
            'standardFeature',
            'equipment',
            'interiorExterior',
            'selfDriving',
            'safetyEquipment'
        ));
    }

    public function fetchbyPage()
    {
        $data = $this->carService->index();
        return view('car.car_pagination_data', compact('data'))->render();
    }

    public function add(CarAddRequest $request)
    {
        return $this->carService->add($request);
    }

    public function show($id)
    {
        return $this->carService->show($id);
    }

    public function update(CarUpdateRequest $request)
    {
        return $this->carService->update($request);
    }

    public function delete($id)
    {
        return $this->carService->delete($id);
    }
}
