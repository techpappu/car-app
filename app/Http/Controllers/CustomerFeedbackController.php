<?php

namespace App\Http\Controllers;

use App\Http\Service\CustomerFeedbackService;
use Illuminate\Http\Request;

class CustomerFeedbackController extends Controller
{
    public $bodyStyleService;
    public $brandService;
    public $customerFeedbackService;
    public $galleryImageService;
    public function __construct(CustomerFeedbackService $customerFeedbackService) {
        $this->middleware('auth');
        $this->customerFeedbackService = $customerFeedbackService;
    }


    public function carReview()
    {

        return view('car.car_review');
    }

    public function reviewPost(Request $request)
    {
        return $this->customerFeedbackService->reviewPost($request);
    }
}
