<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Service\BrandService;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandUpdateRequest;

class BrandController extends Controller
{
    public $brandService;
    public function __construct(BrandService $brandService)
    {
        $this->middleware('auth');
        $this->brandService = $brandService;
    }
    public function index()
    {
        $data = $this->brandService->index();
        return view('car.brand', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->brandService->index();
        return view('car.brand_pagination_data', compact('data'))->render();
    }

    public function add(BrandRequest $request)
    {
        return $this->brandService->add($request);
    }
    public function show($id)
    {
        return $this->brandService->show($id);
    }

    public function update(BrandUpdateRequest $request)
    {
        return $this->brandService->update($request);
    }

    public function delete($id)
    {
        return $this->brandService->delete($id);
    }
}
