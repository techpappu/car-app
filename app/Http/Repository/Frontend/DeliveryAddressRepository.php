<?php

namespace App\Http\Repository\Frontend;

use App\Models\DeliveryAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryAddressRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return DeliveryAddress::select(          
            'id','addressType', 'name', 'mobile_no', 'address', 'country', 'city', 'area'
        )
       
            ->orderBy('id', 'desc')
            ->where('user_id', Auth::user()->id)
            ->get();
    }
    public static function store($request)
    {
        $address = new DeliveryAddress();
        $address->user_id = Auth::user()->id;
        if ($request->addressType == "HOME") {
            $address->addressType = 1;
        } else {
            $address->addressType = 2;
        }
        $address->name = $request->name;
        $address->mobile_no = $request->mobile_no;
        $address->mobile_no = $request->mobile_no;
        $address->alternative_mobile_no = $request->alternative_mobile_no;
        $address->country = $request->country;
        $address->address = $request->address;

        $address->save();

        return $address;
    }
    public static function findById($id)
    {
    }
    public static function update($car, $request)
    {
    }

    public static function delete($car)
    {
        return $car->delete();
    }
}
