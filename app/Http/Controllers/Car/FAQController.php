<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Service\FAQService;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public $fAQService;
    public function __construct(FAQService $fAQService)
    {
        $this->middleware('auth');
        $this->fAQService = $fAQService;
    }
    public function index()
    {
        $data = $this->fAQService->index();
        return view('car.faq', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->fAQService->index();
        return view('car.faq_pagination_data', compact('data'))->render();
    }

    public function add(Request $request)
    {
        return $this->fAQService->add($request);
    }
    public function show($id)
    {
        return $this->fAQService->show($id);
    }

    public function update(Request $request)
    {
        return $this->fAQService->update($request);
    }

    public function delete($id)
    {
        return $this->fAQService->delete($id);
    }
}
