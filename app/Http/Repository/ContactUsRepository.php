<?php

namespace App\Http\Repository;

use App\Models\ContactUs;

class ContactUsRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return ContactUs::orderBy('id', 'desc')
            ->where('carId', '=',0)
            ->paginate(config('constant.pagination_records'));
    }   

    public static function findById($id)
    {
        return ContactUs::find($id);
    }

    public static function delete($contactUs)
    {
        return $contactUs->delete();
    }

    public static function inquiry()
    {
        return ContactUs::orderBy('id', 'desc')
            ->where('carId', '>', 0)
            ->paginate(config('constant.pagination_records'));
    }    
}
