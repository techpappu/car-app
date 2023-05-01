<?php

namespace App\Http\Service;

use App\Http\Repository\CarRepository;
use App\Http\Repository\CustomerFeedbackRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\ShowCarResource;
use App\Http\Repository\FileRepository;
use App\Http\Repository\UserRepository;
use App\Models\Car;
class CustomerFeedbackService
{
    
    use RespondsWithHttpStatus;
  
    public function reviewPost($request)
    {
        $car = Car::find($request->car_id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
       $user = UserRepository::findByEmail($request);
       if(!$user){
         return $this->failure(trans("messages.notFoundUser"), Response::HTTP_NOT_FOUND);
       }

        $customerFeedback = CustomerFeedbackRepository::store($request, $user);
        if($customerFeedback){
            return $this->success(trans('messages.review'), Response::HTTP_CREATED);
        }
    }
   
}
