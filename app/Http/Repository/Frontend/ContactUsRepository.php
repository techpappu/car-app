<?php

namespace App\Http\Repository\Frontend;

use App\Mail\ContactUS as MailContactUS;
use App\Mail\CarInquiry as MailCarInquiry;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Models\Car;
use Exception;
class ContactUsRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }


    public static function store($request)
    {
        $contactUs = new ContactUs();
        $contactUs->user_name = $request->user_name;
        $data['user_name'] = $request->user_name;
        $contactUs->company_name = $request->company_name;
        $data['company_name'] = $request->company_name;
        $data['current_date'] = date('Y/m/d');
        $contactUs->country_code = $request->country_code;
        $contactUs->country = $request->country;
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->phone_country_name = $request->phone_country_name;
        $contactUs->phone_country_code = $request->phone_country_code;
        $contactUs->comment = $request->comment;
        if ($request->is_received_news) {
            $contactUs->is_received_news = 1;
        } else {
            $contactUs->is_received_news = 0;
        }
        if ($request->is_agreed) {
            $contactUs->is_agreed = 1;
        } else {
            $contactUs->is_agreed = 0;
        }


        if ($request->carId) {

            $car = Car::findOrFail($request->carId);
            if($car){
                $data['car_title'] = $car->title;
            }
            $contactUs->carId = $request->carId;
        }
        $contactUs->save();
        //Sending Mail
        try {
            if( $request->contactType == 1){
                Mail::to($contactUs->email)->send(new MailCarInquiry($data));
            }else if($request->contactType == 2){
                Mail::to($contactUs->email)->send(new MailContactUS($data));
            }
          
           
        } catch (Exception $e) {
            return $e;
        }
        return $contactUs;
    }
}
