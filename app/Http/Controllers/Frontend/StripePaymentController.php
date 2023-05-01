<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\BankAccountService;
use App\Http\Service\Frontend\StripePaymentService;
use Illuminate\Http\Request;
use Session;
use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;
use App\Http\Service\Frontend\PaymentService;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    public $stripePaymentService;
    public $paymentService;
    public $bankAccountService;
    public $bodyStyleService;
    public $brandService;
    public function __construct(
        StripePaymentService $stripePaymentService,
        PaymentService $paymentService,
        BankAccountService $bankAccountService,
        BodyStyleService $bodyStyleService,
        BrandService $brandService
    ) {
        $this->stripePaymentService = $stripePaymentService;
        $this->paymentService = $paymentService;
        $this->bankAccountService = $bankAccountService;
        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
    }
    public function checkOut()
    {
        return $this->stripePaymentService->checkOutView();
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        $bank = $this->bankAccountService->index();
        return view('frontend.car.checkout', compact('bank','bodyStyle', 'brand'));
    }

    public function fetchAddressList()
    {
        $deliveryAddress = $this->deliveryAddressService->index();
        return view('frontend.car.address_list', compact('deliveryAddress'))->render();
    }

    public function orderConfirm(Request $request)
    {
        return $this->stripePaymentService->orderConfirm($request);
    }

    public function orderConfirmed(Request $request)
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.car.order_confirm', compact('bodyStyle', 'brand'));
    }

    public function orderConfirmed_2(Request $request)
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.car.order_confirm_2', compact('bodyStyle', 'brand'));
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        $order =  $this->stripePaymentService->getOrderByOrderId($request);
        /*  $stripe = new \Stripe\StripeClient(
        'sk_test_51K1Z77AQlnpAAuiUW8ZvD9RcSFq2paay4s0CeWOATa5dvNYjEyODXA4h91DSGH7ivyJKHCgffeNR3e98kAK5gSnK00cmSTAG6R'
      ); */
        /*   $charge = $stripe->charges->create([
        'amount' => $order->item_total_price+$order->delivery_charge,
        'currency' => 'jpy',
        'source' => $request->stripeToken,
        'description' => 'Test payment from kmcjapan.co.jp)',
      ]); */

        /*   Stripe\Stripe::setApiKey(env('sk_test_51K1Z77AQlnpAAuiUW8ZvD9RcSFq2paay4s0CeWOATa5dvNYjEyODXA4h91DSGH7ivyJKHCgffeNR3e98kAK5gSnK00cmSTAG6R'));
        $charge = Stripe\Charge::create([
            "amount" => $order->item_total_price+$order->delivery_charge,
            "currency" => "jpy",
            "source" => $request->stripeToken,
            "description" => "Test payment from kmcjapan.co.jp"
        ]); */
        //$response = $charge->jsonSerialize();

        // $order = Order::findOrFail($order->id);
        /*  if ($order) {
            $order->transaction_id =  $response["id"];
            $order->isPaid = 1;
            $order->save();
           // Session::flash('success', 'Payment successful!');
        } else {
           // Session::flash('success', 'Payment not successful!');
        } */
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        if ($order) {
            Session::flash('success', 'Payment successful!');
        } else {
            Session::flash('success', 'Payment not successful!');
        }
        Session::flash('order_number',  $request->order_number);
       
        return view('car.order_confirm', compact('bodyStyle', 'brand'));
        // return back();
    }

    public function userOrderList(Request $request)
    {
        $orderList = $this->stripePaymentService->userOrderList($request);
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.user.order_list', compact('orderList', 'bodyStyle', 'brand'));
    }
    public function cancelOrder($id)
    {
        return $this->stripePaymentService->cancelOrder($id);
    }

    public function userPaymentList(Request $request)
    {
        $paymentList = $this->paymentService->userPaymentList($request);
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        $totalPay = Payment::where('user_id', '=', Auth::user()->id)->sum('payment_amount');
        $totalOrder = Order::where('user_id', '=', Auth::user()->id)->sum('total_price');
        $balanceAmount = $totalOrder - $totalPay;
        return view('frontend.user.payment_list', compact('paymentList', 'balanceAmount', 'bodyStyle', 'brand'));
    }
}
