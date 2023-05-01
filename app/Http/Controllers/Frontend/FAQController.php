<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\FAQService;
use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;

class FAQController extends Controller
{
    public $fAQService;
    public $bodyStyleService;
    public $brandService;
    public function __construct(FAQService $fAQService, BodyStyleService $bodyStyleService,
    BrandService $brandService)
    {
        $this->fAQService = $fAQService;
        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
    }
    public function index()
    {
        $data = $this->fAQService->index();
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.home.faq', compact('data', 'bodyStyle', 'brand'));
    }
    public function howToBuy()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.home.how_to_buy', compact('bodyStyle', 'brand'));
    }
}
