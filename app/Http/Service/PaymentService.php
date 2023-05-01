<?php

namespace App\Http\Service;

use App\Http\Repository\PaymentRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;

class PaymentService
{
    use RespondsWithHttpStatus;
    public function index()
    {
        return PaymentRepository::index();
    }

    public function fetchBySearch($request)
    {
        return PaymentRepository::fetchBySearch($request);
    }

    public function getPaymentById($id)
    {
        return PaymentRepository::getPaymentById($id);
    }

    public function addPay($request)
    {
        $payment = PaymentRepository::addPay($request);
        if ($payment) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }
}
