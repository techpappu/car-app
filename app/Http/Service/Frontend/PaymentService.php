<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\PaymentRepository;

class PaymentService
{

    public function userPaymentList()
    {
        return PaymentRepository::index();
    }
}
