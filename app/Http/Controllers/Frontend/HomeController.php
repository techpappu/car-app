<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;
use App\Http\Service\Frontend\ModelService;
use App\Http\Service\Frontend\ColorService;
use App\Http\Service\Frontend\CarService;
use App\Http\Service\Frontend\CustomerFeedbackService;
use App\Http\Service\Frontend\GalleryImageService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $bodyStyleService;
    public $brandService;
    public $modelService;
    public $colorService;
    public $carService;
    public $customerFeedbackService;
    public $galleryImageService;
    public function __construct(
        BodyStyleService $bodyStyleService,
        BrandService $brandService,
        ModelService $modelService,
        ColorService $colorService,
        CarService $carService,
        CustomerFeedbackService $customerFeedbackService,
        GalleryImageService $galleryImageService
    ) {
        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
        $this->modelService = $modelService;
        $this->colorService = $colorService;
        $this->carService = $carService;
        $this->customerFeedbackService = $customerFeedbackService;
        $this->galleryImageService = $galleryImageService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        $colors = $this->colorService->allColor();
        $fearturedCars = $this->carService->fearturedCar();
       // $galleryImageCars = $this->carService->galleryImageCars();
        $galleryImageCars = $this->galleryImageService->allGallery();
        $carCountByBrands = $this->carService->getCarCountByBrand();
        $customerFeedback = $this->customerFeedbackService->index();
        /* return view('home.index', [
            'bodyStyle' => $bodyStyle,
            'brand' => $brand,
            'colors' => $colors,
            'fearturedCars' => $fearturedCars,
            'carCountByBrands' => $carCountByBrands,
        ]); */
        $carList=[];
        $carList['new']=$this->carService->carListing(4);

        $carList['mileage']=\Facades\App\Models\Car::where('price','>',0)
        ->where('mileage','<=',50000)
        ->where('car_sold_status',1)
        ->orderBy('mileage','ASC')
        ->paginate(4);

        $carList['lowPrice']=\Facades\App\Models\Car::where('price','>',0)
        ->where('car_sold_status',1)
        ->orderBy('price','ASC')
        ->paginate(4);
        
        $carList['highPrice']=\Facades\App\Models\Car::where('car_sold_status',1)
        ->orderBy('price','DESC')
        ->paginate(4);

        return view('frontend.home.index', compact('bodyStyle', 'brand', 'colors', 'galleryImageCars', 'fearturedCars', 'carCountByBrands', 'customerFeedback','carList'));
    }

    public function getModelsByBrand($brandId)
    {
        return $this->modelService->getModelsByBrand($brandId);
    }

    public function getAllBrand()
    {
        return $this->brandService->allBrand();
    }
}
