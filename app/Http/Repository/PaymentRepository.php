<?php

namespace App\Http\Repository;

use App\Models\Payment;
use App\Models\Order;
use DB;

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
            ->orderBy('payments.id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }

    public static function fetchBySearch($request)
    {
        $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
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
            ->where('orders.order_number', 'like', '%'.$query.'%')
            ->join('orders', 'orders.id', '=', 'payments.order_id')

            ->orderBy('payments.id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }

    public static function getPaymentById($id)
    {
        $payment = Payment::find($id);
        $orders = Order::select([
            'id', 'order_number', 'user_name', 'user_email', 'phone', 'status', 'isPaid', 'payment_type', 'total_price',
        ])
            ->with([
                'orderItems' => function ($q) {
                    $q->select([
                        'id', 'order_id', 'car_id', 'quantity', 'unit_price', 'total_price',
                    ]);
                },
                'orderItems.car' => function ($q) {
                    $q->select('id', 'title');
                },
            ])
            ->whereId($payment->order_id)
            ->first();

      //  $dueAmount = ($orders->total_price) - ($payment->payment_amount);
       
        $totalPay = Payment::where('user_id', '=', $payment->user_id)->sum('payment_amount');
        $totalOrder = Order::where('user_id', '=', $payment->user_id)->sum('total_price');

        $payments['payment'] = $payment;
        $payments['order'] = $orders;
        $payments['balanceAmount'] = $totalOrder - $totalPay;

        return $payments;
    }

    public static function addPay($request)
    {
        $order = Order::select(
            'id',
            'order_number',
            'payment_type',
            'total_price',
            'user_id'
        )

            ->where('order_number', ($request->order_id))
            ->get()->first();
        if ($order) {
            $payment = Payment::where('order_id', '=', $order->id)->sum('payment_amount');
            $payments = new Payment();
            $payments->payment_amount = $request->payment_amount;
            $payments->due_amount = $order->total_price - ($request->payment_amount + $payment);
            $payments->order_id = $order->id;
            $payments->user_id = $order->user_id;
            $payments->save();

            return true;
        }
    }
}
