<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;
use App\Http\Service\Frontend\CustomerFeedbackService;
use Illuminate\Http\Request;

class CustomerFeedbackController extends Controller
{
    public $bodyStyleService;
    public $brandService;
    public $customerFeedbackService;
    public $galleryImageService;
    public function __construct(
        CustomerFeedbackService $customerFeedbackService,
        BodyStyleService $bodyStyleService,
        BrandService $brandService
    ) {

        $this->customerFeedbackService = $customerFeedbackService;
        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        $customerFeedback = $this->customerFeedbackService->index();
        return view('frontend.home.review', compact('customerFeedback', 'bodyStyle', 'brand'));
    }

    public function carReview()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
       
        return view('frontend.user.car_review', compact('bodyStyle', 'brand'));
    }

    public function reviewPost(Request $request)
    {
       return $this->customerFeedbackService->reviewPost($request);

    }
}
