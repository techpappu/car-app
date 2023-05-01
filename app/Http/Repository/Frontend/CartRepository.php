<?php

namespace App\Http\Repository\Frontend;

use App\Models\Car;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function addToCart($car)
    {
        $cart = new Cart();
        $cart->user_id = 1;
        $cart->car_id = $car->id;
        $cart->quantity = 1;
        $cart->unit_price = $car->price;
        $cart->total_price = $car->price;
        $cart->save();
        return $cart;
    }
}
