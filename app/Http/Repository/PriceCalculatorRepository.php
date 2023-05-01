<?php

namespace App\Http\Repository;

use App\Models\PriceCalculator;


class PriceCalculatorRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return PriceCalculator::orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }

    public static function allBodyStyle()
    {
        return PriceCalculator::orderBy('id', 'desc')
            ->get();
    }

    public static function existCheck($request)
    {
        return PriceCalculator::where('country', $request->country)
            ->where('port', $request->port)
            ->first();
    }

    public static function store($request)
    {
        $priceCalculator = new PriceCalculator();
        $priceCalculator->country = $request->country;
        $priceCalculator->port = $request->port;
        $priceCalculator->delivery_charge = $request->delivery_charge;
        $priceCalculator->marine_insurance = $request->marine_insurance;
        $priceCalculator->pre_export_inspection = $request->pre_export_inspection;
        $priceCalculator->save();
        return $priceCalculator;
    }

    public static function findById($id)
    {
        return PriceCalculator::find($id);
    }

    public static function existCheckInUpdate($request)
    {
        return PriceCalculator::where('country', $request->country)
            ->where('port', $request->port)
            ->where('id', '!=', $request->id)
            ->first();
    }

    public static function update($priceCalculator, $request)
    {
        if ($request->has('country')) {
            $priceCalculator->country = $request->country;
        }
        if ($request->has('port')) {
            $priceCalculator->port = $request->port;
        }
        if ($request->has('delivery_charge')) {
            $priceCalculator->delivery_charge = $request->delivery_charge;
        }
        if ($request->has('marine_insurance')) {
            $priceCalculator->marine_insurance = $request->marine_insurance;
        }

        if ($request->has('pre_export_inspection')) {
            $priceCalculator->pre_export_inspection = $request->pre_export_inspection;
        }

        $priceCalculator->update();

        return true;
    }

    public static function delete($priceCalculator)
    {
        return $priceCalculator->delete();
    }
}
