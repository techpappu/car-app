<?php

namespace App\Http\Controllers;

use App\Http\Service\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->middleware('auth');
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $data = $this->paymentService->index();
        return view('car.payment', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->paymentService->index();
        return view('car.payment_pagination_data', compact('data'))->render();
    }
    public function fetchBySearch(Request $request)
    {
        $data = $this->paymentService->fetchBySearch($request);
        return view('car.payment_pagination_data', compact('data'))->render();
    }

    public function getPaymentById($id)
    {
        return $this->paymentService->getPaymentById($id);
    }

    public function addPay(Request $request)
    {
        return $this->paymentService->addPay($request);
    }
}
