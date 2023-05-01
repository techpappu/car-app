<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Service\Frontend\CarService;
use App\Http\Service\Frontend\ContactUsService;
use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;

class ContactUsController extends Controller
{
    public $contactUsService;
    public $carService;
    public $bodyStyleService;
    public $brandService;

    public function __construct(
        ContactUsService $contactUsService,
        CarService $carService,
        BodyStyleService $bodyStyleService,
        BrandService $brandService
    ) {
        $this->contactUsService = $contactUsService;
        $this->carService = $carService;
        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
    }
    public function index()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.home.contact_us', compact('bodyStyle', 'brand'));
    }

    public function add(Request $request)
    {
        return $this->contactUsService->add($request);
    }
    public function addInquiry(Request $request)
    {
        return $this->contactUsService->add($request);
    }

    public function inquiry($carId)
    {
        $car = $this->carService->show($carId);
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.home.inquiry', compact('car', 'bodyStyle', 'brand'));
    }
    public function termsAndConditions()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.home.terms', compact('bodyStyle', 'brand'));
    }
}
