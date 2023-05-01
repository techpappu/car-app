<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\PriceCalculatorService;

class PriceCalculatorController extends Controller
{
    public $priceCalculatorService;
    public function __construct(PriceCalculatorService $priceCalculatorService)
    {
        $this->priceCalculatorService = $priceCalculatorService;
    }

    public function show($id)
    {
        return $this->priceCalculatorService->show($id);
    }

    public function portList($country)
    {
        return $this->priceCalculatorService->portList($country);
    }
    public function priceCalculate($country, $port)
    {
        return $this->priceCalculatorService->priceCalculate($country, $port);
    }
}
