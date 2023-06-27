<?php

namespace App\Http\Controllers\Car;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Gate;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Service\ContactUsService;
use Illuminate\Http\Response;

class SellerCarController extends Controller
{
    use RespondsWithHttpStatus;

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
    public $contactUsService;
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
        ColorService $colorService,
        ContactUsService $contactUsService
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
        $this->contactUsService = $contactUsService;
    }

    public function index()
    {   
        $allDataCount=auth()->user()->cars()->count();

        $sold=auth()->user()->cars()->where('car_sold_status',3)
        ->orderBy('id', 'desc')
        ->paginate(config('constant.pagination_records'));

        $available=auth()->user()->cars()->where('car_sold_status',1)
        ->orderBy('id', 'desc')
        ->paginate(config('constant.pagination_records'));

        $reserved=auth()->user()->cars()->where('car_sold_status',2)
        ->orderBy('id', 'desc')
        ->paginate(config('constant.pagination_records'));

        if(request()->is('admin/seller/car/sold')){
            $data=$sold;
        }elseif(request()->is('admin/seller/car/available')){
            $data=$available;
        }
        elseif(request()->is('admin/seller/car/reserved')){
            $data=$reserved;
        }
        else{
            $data = auth()->user()->cars()
            ->orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));
        }
        $brand = $this->brandService->allBrand();
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $colors = $this->colorService->allColor();
        $carCondition = $this->carConditionService->index();
        $standardFeature = $this->standardFeatureService->index();
        $equipment = $this->equipmentService->index();
        $interiorExterior = $this->interiorExteriorService->index();
        $selfDriving = $this->selfDrivingService->index();
        $safetyEquipment = $this->safetyEquipmentService->index();
        return view('seller.car', compact(
            'allDataCount',
            'data',
            'available',
            'sold',
            'reserved',
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
        return view('seller.car_pagination_data', compact('data'))->render();
    }

    public function add(CarAddRequest $request)
    {
        $request->merge([
            'seller_id'             =>  auth()->user()->id,
            'is_3rd_party_seller'   =>  1,

        ]);
        return $this->carService->add($request);
    }

    public function show($id)
    {   
        $car=\Facades\App\Models\Car::find($id);
        Gate::authorize('isSellerCar',$car);
        return $this->carService->show($id);
    }

    public function update(CarUpdateRequest $request)
    {
        $car=\Facades\App\Models\Car::find($request->id);
        Gate::authorize('isSellerCar',$car);
        return $this->carService->update($request);
    }

    public function delete($id)
    {
        $car=\Facades\App\Models\Car::find($id);
        Gate::authorize('isSellerCar',$car);
        return $this->carService->delete($id);
    }

    public function carImageById($id)
    {   
        $car=\Facades\App\Models\Car::find($id);
        Gate::authorize('isSellerCar',$car);
        $data = $this->carService->carImageById($id);
        return view('car.car_image_list', compact('data'))->render();
    }
    public function deleteCarImage($id)
    {   
        $image=\Facades\App\Models\File::find($id);
        if($image->fileable_type!='App\Models\Car'){
            abort(403);
        }
        $car=\Facades\App\Models\Car::find($image->fileable_id);
        Gate::authorize('isSellerCar',$car);
        return $this->carService->deleteCarImage($id);
    }

    public function updatePosition(Request $request)
    {   
        $image=\Facades\App\Models\File::find($request->carImageId);
        if($image->fileable_type!='App\Models\Car'){
            abort(403);
        }
        $car=\Facades\App\Models\Car::find($image->fileable_id);
        Gate::authorize('isSellerCar',$car);
        return $this->carService->updatePosition($request);
    }


    function expenseIndex($id)
    {   $data=[];
        $data['carData'] =\Facades\App\Models\Car::find($id);
        Gate::authorize('isSellerCar',$data['carData']);
        $data['expense']=$data['carData']->expense;
        return view('car.car_expense_data', compact('data'))->render();
    }
    function expenseCreate(Request $request)
    {   
        $carData=\Facades\App\Models\Car::find($request->carId);
        Gate::authorize('isSellerCar',$carData);
        $data=$request->only('type','comment','amount');
        $carData->expense()->create($data);
        return $this->success(trans('messages.add'), Response::HTTP_CREATED);
    }

    function expenseDelete($id)
    {
        $expenseData =\Facades\App\Models\Expense::find($id);
        $carData=\Facades\App\Models\Car::find($expenseData->car_id);
        Gate::authorize('isSellerCar',$carData);
        return $this->success($expenseData->delete());

    }

/**
 * All Service for Seller Inquiry  
 * 
 */
    public function inquiryDelete($id)
    {   
        $carId=\Facades\App\Models\ContactUs::findOrFail($id)->carId;
        $carData=\Facades\App\Models\Car::findOrFail($carId);
        Gate::authorize('isSellerCar',$carData);
        return $this->contactUsService->delete($id);
    }

    public function replayMail(Request $request)
    {   
        $carId=\Facades\App\Models\ContactUs::findOrFail($request->id)->carId;
        $carData=\Facades\App\Models\Car::findOrFail($carId);
        Gate::authorize('isSellerCar',$carData);
        return $this->contactUsService->replayMail($request);
    }

    public function inquiry()
    {
        
        $cars = auth()->user()->cars()->pluck('id')->toArray();
        $data=\Facades\App\Models\ContactUs::whereIn('carId',$cars)
        ->paginate(config('constant.pagination_records'));
        return view('seller.inquiry', compact('data'));
    }

    public function inquiryFetchbyPage()
    {
        $cars = auth()->user()->cars()->pluck('id')->toArray();
        $data=\Facades\App\Models\ContactUs::whereIn('carId',$cars)
        ->paginate(config('constant.pagination_records'));
        return view('car.inquiry_pagination_data', compact('data'))->render();
    }

}
