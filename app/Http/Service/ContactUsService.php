<?php

namespace App\Http\Service;

use App\Http\Repository\ContactUsRepository;
use App\Mail\ContactUS;
use App\Mail\CarInquiry;
use App\Traits\RespondsWithHttpStatus;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Models\Car;

class ContactUsService
{

    use RespondsWithHttpStatus;

    public function index()
    {
        return ContactUsRepository::index();
    }

    public function delete($id)
    {
        $contactUs = ContactUsRepository::findById($id);
        if (!$contactUs) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(ContactUsRepository::delete($contactUs));
    }

    public function replayMail($request)
    {

        $contactUs = ContactUsRepository::findById($request->id);
        if ($contactUs) {
            $data['user_name'] = $contactUs->user_name;
            $data['company_name'] = $contactUs->company_name;
            $data['current_date'] = date('Y/m/d'); 
            $data['bodyMessage'] = $request->bodyMessage;          
            //Sending Mail
            try {
               // Mail::to( $contactUs->email)->send(new ContactUS($data));
                if( $request->contactType == 1){
                    $car = Car::findOrFail($contactUs->carId);
                    $data['car_title'] = $car->title;
                    Mail::to($contactUs->email)->send(new CarInquiry($data));
                }else if($request->contactType == 2){
                    Mail::to($contactUs->email)->send(new ContactUS($data));
                }
            } catch (Exception $e) {
                return $e;
            }
        }

        return $this->success(trans('messages.messageSend'), Response::HTTP_OK);
    }

    public function inquiry()
    {
        return ContactUsRepository::inquiry();
    }
}
