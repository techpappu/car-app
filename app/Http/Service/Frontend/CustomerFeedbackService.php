<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\CarRepository;
use App\Http\Repository\Frontend\CustomerFeedbackRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\ShowCarResource;
use App\Http\Repository\Frontend\FileRepository;
use App\Models\Car;
class CustomerFeedbackService
{
    
    use RespondsWithHttpStatus;
    public function index()
    {
       $feedbacks = CustomerFeedbackRepository::index();
        foreach ($feedbacks as $value) {
            $value->images = FileRepository::getFileByIdFirstOne($value->id);
            $value->feedbackFile = CustomerFeedbackRepository::getFileById($value->customer_feedback_id);
            
        }
       return $feedbacks;
    } 
    
    public function reviewPost($request)
    {
        $car = Car::find($request->car_id);
        if (!$car) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        
        $customerFeedback = CustomerFeedbackRepository::store($request);
        if($customerFeedback){
            return $this->success(trans('messages.review'), Response::HTTP_CREATED);
        }
    }
   
}
