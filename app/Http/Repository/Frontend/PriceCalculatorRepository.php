<?php

namespace App\Http\Repository\Frontend;

use App\Models\PriceCalculator;


class PriceCalculatorRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }


    public static function portList($country)
    {
        return PriceCalculator::orderBy('id', 'desc')
        ->where('country', $country)
        ->get();
    }

    public static function findById($id)
    {
        return PriceCalculator::find($id);
    }
    public static function findByCountryAndPort($country, $port)
    {
        return PriceCalculator::orderBy('id', 'desc')
        ->where('country', $country)
        ->where('port', $port)
        ->get()->first();
    }
   
}
