<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\ContactUsRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;

class ContactUsService
{
    
    use RespondsWithHttpStatus;
       
    public function add($request)
    {
        $address = ContactUsRepository::store($request);
        if ($address) {
            return $this->success(trans('messages.messageSend'), Response::HTTP_CREATED);
        }
    }

  
   
}
