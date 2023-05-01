<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;

class AboutController extends Controller
{
    public $bodyStyleService;
    public $brandService;

    public function __construct(
        BodyStyleService $bodyStyleService,
        BrandService $brandService
    ) {

        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.home.about_us', compact('bodyStyle', 'brand'));
    }
}
