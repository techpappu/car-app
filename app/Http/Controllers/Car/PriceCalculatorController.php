<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Service\PriceCalculatorService;
use Illuminate\Http\Request;

class PriceCalculatorController extends Controller
{
    public $priceCalculatorService;
    public function __construct(PriceCalculatorService $priceCalculatorService)
    {
        $this->middleware('auth');
        $this->priceCalculatorService = $priceCalculatorService;
    }
    public function index()
    {
        $data = $this->priceCalculatorService->index();
        return view('car.price_calculator', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->priceCalculatorService->index();
        return view('car.price_calculator_pagination_data', compact('data'))->render();
    }

    public function add(Request $request)
    {
        return $this->priceCalculatorService->add($request);
    }
    public function show($id)
    {
        return $this->priceCalculatorService->show($id);
    }

    public function update(Request $request)
    {
        return $this->priceCalculatorService->update($request);
    }

    public function delete($id)
    {
        return $this->priceCalculatorService->delete($id);
    }
}
