<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\BodyStyleRequest;
use App\Http\Requests\UpdateBodyStyleRequest;
use App\Http\Service\BodyStyleService;

class BodyStyleController extends Controller
{
    public $bodyStyleService;
    public function __construct(BodyStyleService $bodyStyleService)
    {
        $this->middleware('auth');
        $this->bodyStyleService = $bodyStyleService;
    }
    public function index()
    {
        $data = $this->bodyStyleService->index();
        return view('car.body_style', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->bodyStyleService->index();
        return view('car.body_style_pagination_data', compact('data'))->render();
    }

    public function add(BodyStyleRequest $request)
    {
        return $this->bodyStyleService->add($request);
    }
    public function show($id)
    {
        return $this->bodyStyleService->show($id);
    }

    public function update(UpdateBodyStyleRequest $request)
    {
        return $this->bodyStyleService->update($request);
    }

    public function delete($id)
    {
        return $this->bodyStyleService->delete($id);
    }
}
