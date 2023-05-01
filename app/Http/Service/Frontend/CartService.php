<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\FileRepository;
use App\Models\Car;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;

class CartService
{
    use RespondsWithHttpStatus;

    public function cart()
    {
    }
    public function addToCart($id)
    {

        $car = Car::findOrFail($id);
        $file =FileRepository::getFileByIdFirstOne($car->id);
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
           // $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "carId" => $car->id,
                "name" => $car->title,
                "quantity" => 1,
                "price" => $car->price,
                "cubic_meter" => $car->cubic_meter,
                "image" => $file->file_name               
            ];
        }
          
        session()->put('cart', $cart);
        return $this->success(trans('messages.cartAdd'), Response::HTTP_CREATED);
       // return redirect()->back()->with('success', 'Car added to cart successfully!');

      /*   $car = CarRepository::findById($id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $cart = CartRepository::addToCart($car);
        if ($cart) {
            return $this->success(trans('messages.cartAdd'), Response::HTTP_CREATED);
        } */
    }
}
