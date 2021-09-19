<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Http\Requests\ColorUpdateRequest;
use App\Http\Service\ColorService;

class ColorController extends Controller
{
    public $colorService;
    public function __construct(ColorService $colorService)
    {
        $this->middleware('auth');
        $this->colorService = $colorService;
    }
    public function index()
    {
        $data = $this->colorService->index();
        return view('car.color', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->colorService->index();
        return view('car.color_pagination_data', compact('data'))->render();
    }

    public function add(ColorRequest $request)
    {
        return $this->colorService->add($request);
    }
    public function show($id)
    {
        return $this->colorService->show($id);
    }

    public function update(ColorUpdateRequest $request)
    {
        return $this->colorService->update($request);
    }

    public function delete($id)
    {
        return $this->colorService->delete($id);
    }
}
