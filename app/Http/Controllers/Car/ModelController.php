<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Service\ModelService;
use Illuminate\Http\Request;
use App\Http\Service\BrandService;
class ModelController extends Controller
{
    public $modelService;
    public $brandService;
    public function __construct(ModelService $modelService, BrandService $brandService)
    {
        $this->middleware('auth');
        $this->modelService = $modelService;
        $this->brandService = $brandService;
    }
    public function index()
    {
        $data = $this->modelService->index();
        $brand = $this->brandService->allBrand();
        return view('car.model', compact('data', 'brand'));
    }

    public function fetchbyPage()
    {
        $data = $this->modelService->index();
        return view('car.model_pagination_data', compact('data'))->render();
    }

    public function add(Request $request)
    {
        return $this->modelService->add($request);
    }
    public function show($id)
    {
        return $this->modelService->show($id);
    }

    public function update(Request $request)
    {
        return $this->modelService->update($request);
    }

    public function delete($id)
    {
        return $this->modelService->delete($id);
    }

    public function getModelsByBrand($brandId)
    {
        return $this->modelService->getModelsByBrand($brandId);
    }
}
