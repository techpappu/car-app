<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Service\StripePaymentService;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class StripePaymentController extends Controller
{
    public $stripePaymentService;

    public function __construct(
        StripePaymentService $stripePaymentService

    ) {
        $this->middleware('auth');
        $this->stripePaymentService = $stripePaymentService;
    }


    public function orderList()
    {
        $data = $this->stripePaymentService->userOrderList();
        return view('car.order_list', compact('data'));
    }
    public function orderStatusUpdate(Request $request)
    {
        return $this->stripePaymentService->orderStatusUpdate($request);
    }

    public function fetchbyPage()
    {
        $data = $this->stripePaymentService->userOrderList();
        return view('car.order_list_pagination_data', compact('data'))->render();
    }
    public function getOrderById($id)
    {
        return $this->stripePaymentService->getOrderById($id);
    }

    public function orderAdminInfo($id)
    {
        return $this->stripePaymentService->orderAdminInfo($id);
    }

    public function orderUpdate(Request $request)
    {
        return $this->stripePaymentService->orderUpdate($request);
    }

    public function orderAttachedCertificate(Request $request)
    {
        return $this->stripePaymentService->orderAttachedCertificate($request);
    }
}
