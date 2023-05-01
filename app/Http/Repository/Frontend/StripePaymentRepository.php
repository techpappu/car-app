<?php

namespace App\Http\Repository\Frontend;

use App\Models\Car;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StripePaymentRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function orderConfirm($request)
    {
        $order = new Order();
        $order_number = rand(100000, 999999);
        $order->user_id = Auth::user()->id;
        $order->order_number = $order_number;
        $current = Carbon::now();
        $currentTime = $current->format('Y-m-d H:i:s');
        $order->order_date = $currentTime;
        //$order->delivery_address_id = $request->addressId;       
        $order->country_code = $request->country_code;
        $order->country_name = $request->country_name;
        $order->port = $request->port;
        $order->marine_insurance = $request->marine_insurance;
        $order->pre_export_inspection = $request->pre_export_inspection;
        $order->marine_insurance_amount = $request->marine_insurance_amount;
        $order->pre_export_inspection_amount = $request->pre_export_inspection_amount;
        $order->user_name = $request->user_name;
        $order->user_email = $request->user_email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->phone_country_name = $request->phone_country_name;
        $order->phone_country_code = $request->phone_country_code;
        $order->user_message = $request->user_message;
        $order->payment_type = $request->ptype;
        $order->item_total_price = $request->item_total_price;
        $order->delivery_charge = $request->delivery_charge;
        $order->total_price = $request->item_total_price + $request->delivery_charge + $request->marine_insurance_amount + $request->pre_export_inspection_amount;
        $order->total_quantity = $request->total_quantity;
        $order->created_by = Auth::user()->id;

        $order->save();
        foreach ($request->carInfo as $key => $value) {
            $car = Car::find($key);
            if ($car) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->car_id = $car->id;
                $orderItem->quantity = $value;
                $orderItem->unit_price = $car->price;
                $orderItem->total_price = $car->price *  $orderItem->quantity;
                $orderItem->save();
                $car->car_sold_status = 2;
                $car->update();
            }
        }
        return $order;
    }

    public static function userOrderList($request)
    {
        $orders = Order::select([
            'id', 'order_number', 'payment_type', 'total_quantity', 'total_price', 'isPaid', 'status', 'delivery_charge', 'country_name',
            'port', 'marine_insurance_amount', 'pre_export_inspection_amount', 'discount', 'ship_name', 'voyage_no',
            'ship_date', 'est_arrival_date', 'invoice_no', 'invoice_date', 'inspec_request_date', 'tracking_no', 'shipping_date',
             'cons_name', 'cons_address', 'cons_phone', 'cons_country','cons_city', 'cons_shipper', 'cons_email'
        ])
            ->with([
                'orderItems' => function ($q) {
                    $q->select([
                        'id', 'order_id', 'car_id', 'quantity', 'unit_price', 'total_price'
                    ]);
                },
                'orderItems.car' => function ($q) {
                    $q->select('id', 'title', 'stock_no', 'chassis_no', 'displacement');
                }
            ])
            ->when($request->orderStatus, function ($q) use ($request) {
                $q->where('status', $request->orderStatus);
            })
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));

        return $orders;
    }
    public static function getOrderByOrderId($request)
    {
        $order = Order::select(
            'id',
            'order_number',
            'payment_type',
            'total_price'
        )

            ->where('order_number', ($request->order_number))
            ->get()->first();

        if ($order) {
            $stripe = new \Stripe\StripeClient(
                'sk_test_51K1Z77AQlnpAAuiUW8ZvD9RcSFq2paay4s0CeWOATa5dvNYjEyODXA4h91DSGH7ivyJKHCgffeNR3e98kAK5gSnK00cmSTAG6R'
            );
            $charge = $stripe->charges->create([
                'amount' => $order->total_price,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Test payment from kmcjapan.co.jp)',
            ]);
            if ($charge) {
                $response = $charge->jsonSerialize();
                $order->transaction_id =  $response["id"];
                $order->isPaid = 1;
                $order->save();
                $payment = new Payment();
                $payment->payment_amount = $order->total_price;
                $payment->order_id = $order->id;
                $payment->user_id = Auth::user()->id;
                $payment->save();
            }

            return $order;
        }
    }

    public static function findById($id)
    {
        return Order::find($id);
    }

    public static function cancelOrder($order)
    {
        if ($order->isPaid = 1 && $order->transaction_id) {
            $stripe = new \Stripe\StripeClient(
                'sk_test_51K1Z77AQlnpAAuiUW8ZvD9RcSFq2paay4s0CeWOATa5dvNYjEyODXA4h91DSGH7ivyJKHCgffeNR3e98kAK5gSnK00cmSTAG6R'
            );
            $stripe->refunds->create([
                'charge' => $order->transaction_id,
            ]);
            $payment = Payment::where('order_id', $order->id)->get()->first();
            if ($payment) {
                $payment->isPaid = 1;
                $payment->update();
            }
        }
        $order->status = 6;
        $current = Carbon::now();
        $currentTime = $current->format('Y-m-d H:i:s');
        $order->cancel_datetime = $currentTime;
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        foreach ($orderItems as $item) {
            $car = Car::find($item->car_id);
            $car->car_sold_status = 1;
            $car->update();
        }
        return $order->update();
    }
}
