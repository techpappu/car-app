<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Service\Frontend\CartService;
use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;

class CartController extends Controller
{
    public $cartService;
    public $bodyStyleService;
    public $brandService;
    public function __construct(
        CartService $cartService,
        BodyStyleService $bodyStyleService,
        BrandService $brandService
    ) {
        $this->cartService = $cartService;
        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
    }
    public function cart()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.car.cart', compact('bodyStyle', 'brand'));
    }

    public function addToCart($id)
    {
        $cart = $this->cartService->addToCart($id);
        return $cart;
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
