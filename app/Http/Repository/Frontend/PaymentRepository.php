<?php

namespace App\Http\Repository\Frontend;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return Payment::select(
            'orders.order_number as order_number',
            'orders.user_name as user_name',
            'orders.user_email as user_email',
            'orders.phone',
            'orders.phone_country_code',
            'orders.payment_type',
            'orders.total_price',
            'payments.id as payment_id',
            'payments.payment_amount',
            'payments.due_amount',
            'payments.isPaid',
            'payments.created_at'
        )
            ->join('orders', 'orders.id', '=', 'payments.order_id')
            ->where('payments.user_id', Auth::user()->id)
            ->orderBy('payments.id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }
}
