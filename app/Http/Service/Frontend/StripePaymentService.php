<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\StripePaymentRepository;
use App\Http\Resources\Frontend\OrderResource;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Repository\Frontend\FileRepository;

class StripePaymentService
{
    use RespondsWithHttpStatus;

    public function checkOutView()
    {
        $isAuthenticatedUser = (Auth::check() && Auth::user()->role == 4);
        if (!$isAuthenticatedUser)
            return $this->success("login", Response::HTTP_OK);

        return $this->success("checkoutView", Response::HTTP_OK);
    }

    public function orderConfirm(Request $request)
    {


        $order = StripePaymentRepository::orderConfirm($request);
        if ($order) {
            $cart = session()->get('cart');

            foreach ($cart as  $value) {
                unset($cart[$value['carId']]);
                session()->put('cart', $cart);
            }
            return $this->success(new OrderResource($order), Response::HTTP_OK);
        } else {
            return $this->failure(trans('messages.notConfirm'), Response::HTTP_OK);
        }
    }

    public function userOrderList(Request $request)
    {
        $orders = StripePaymentRepository::userOrderList($request);
        foreach ($orders as $value) {
            foreach ($value->orderItems as $carItems) {
                $carItems->images = FileRepository::getFileByIdFirstOne($carItems->car_id);
            }
            $file = FileRepository::getFileByIdAndType($value->id);
            $value->documents = $file;

            $certificate = FileRepository::getFileCertificate($value->id);
            $value->certificate = $certificate;
        }


        // dd($orders);
        return $orders;
    }
    public function getOrderByOrderId(Request $request)
    {
        $order = StripePaymentRepository::getOrderByOrderId($request);

        return $order;
        if ($order) {
            return $this->success(trans('messages.paymentSuccess'), Response::HTTP_OK);
        } else {
            return $this->failure(trans("messages.paymentNotSuccess"), Response::HTTP_NOT_FOUND);
        }
    }

    public function cancelOrder($id)
    {
        $order = StripePaymentRepository::findById($id);
        if (!$order) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(StripePaymentRepository::cancelOrder($order));
    }
}
