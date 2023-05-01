<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\CarService;
use App\Http\Service\Frontend\CarConditionService;
use App\Http\Service\Frontend\EquipmentService;
use App\Http\Service\Frontend\InteriorExteriorService;
use App\Http\Service\Frontend\SafetyEquipmentService;
use App\Http\Service\Frontend\SelfDrivingService;
use App\Http\Service\Frontend\StandardFeatureService;
use App\Http\Service\Frontend\BrandService;
use App\Http\Service\Frontend\ColorService;

class CarController extends Controller

{
    public $carService;
    public $carConditionService;
    public $standardFeatureService;
    public $equipmentService;
    public $interiorExteriorService;
    public $selfDrivingService;
    public $safetyEquipmentService;
    public $brandService;
    public $bodyStyleService;
    public $modelService;
    public $colorService;
    public function __construct(
        BodyStyleService $bodyStyleService,
        CarService $carService,
        CarConditionService $carConditionService,
        StandardFeatureService $standardFeatureService,
        EquipmentService $equipmentService,
        InteriorExteriorService $interiorExteriorService,
        SelfDrivingService $selfDrivingService,
        SafetyEquipmentService $safetyEquipmentService,
        BrandService $brandService,
        ColorService $colorService
    ) {
        $this->bodyStyleService = $bodyStyleService;
        $this->carService = $carService;
        $this->carConditionService = $carConditionService;
        $this->standardFeatureService = $standardFeatureService;
        $this->equipmentService = $equipmentService;
        $this->interiorExteriorService = $interiorExteriorService;
        $this->selfDrivingService = $selfDrivingService;
        $this->safetyEquipmentService = $safetyEquipmentService;
        $this->brandService = $brandService;
        $this->colorService = $colorService;
    }

    public function carDetails($id)
    {
        $carDetails = $this->carService->show($id);
        $data=[];
        $data['carCondition']=$carDetails->carCondition()->get()->toArray();
        $data['standardFeature']=$carDetails->carStandardFeature()->get()->toArray();
        $data['equipment']=$carDetails->carEquipment()->get()->toArray();
        $data['interiorExterior']=$carDetails->carInteriorExterior()->get()->toArray();
        $data['selfDriving']=$carDetails->carSelfDriving()->get()->toArray();
        $data['safetyEquipment']=$carDetails->carSafetyEquipment()->get()->toArray();
        $relatedCars = $this->carService->relatedCars($id, $carDetails->brand, $carDetails->model, $carDetails->bodyStyle);
        $carCondition = $this->carConditionService->index();
        $standardFeature = $this->standardFeatureService->index();
        $equipment = $this->equipmentService->index();
        $interiorExterior = $this->interiorExteriorService->index();
        $selfDriving = $this->selfDrivingService->index();
        $safetyEquipment = $this->safetyEquipmentService->index();
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.car.car_details', with([
            'carDetails' => $carDetails,
            'carCondition' => $carCondition,
            'standardFeature' => $standardFeature,
            'equipment' => $equipment,
            'interiorExterior' => $interiorExterior,
            'selfDriving' => $selfDriving,
            'safetyEquipment' => $safetyEquipment,
            'relatedCars' => $relatedCars,
            'bodyStyle' => $bodyStyle,
            'brand' => $brand,
            'data'=>$data
        ]
        ));
    }

    public function carList(Request $request)
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $carList =$this->carService->carList($request);  
        $brand = $this->brandService->allBrand();
        $colors = $this->colorService->allColor();
        if($request->sortBy){
            if($request->directive){
                return view('frontend.car.car_list', compact('carList', 'brand', 'colors', 'bodyStyle'));
            }else{
                return view('frontend.car.car_list_data', compact('carList', 'bodyStyle', 'brand'))->render();
            }
            
        }else{
            return view('frontend.car.car_list', compact('carList', 'brand', 'colors', 'bodyStyle'));
        }
    }

    public function fetchbyPage(Request $request)
    {
        $carList = $this->carService->carList($request);
        return view('frontend.car.car_list_data', compact('carList'))->render();
    }

    public function show($id)
    {
        return $this->carService->show($id);
    }

    public function carListSearch(Request $request)
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();

        $carList =$this->carService->carListSearch($request);  
        if($request->directive){
         $colors = $this->colorService->allColor();
            return view('frontend.car.car_list', compact('carList', 'colors', 'bodyStyle', 'brand'));
        }
        return view('frontend.car.car_list_data', compact('carList', 'bodyStyle', 'brand'))->render();

    }
}
