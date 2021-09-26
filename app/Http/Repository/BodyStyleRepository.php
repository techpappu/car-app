<?php

namespace App\Http\Repository;

use App\Models\Car;

class BodyStyleRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return Car::orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function allBodyStyle()
    {
        return Car::orderBy('id', 'desc')
            ->get();
    }

    public static function store($request)
    {
        $car = new Car();
        $car->name = $request->name;
        $car->save();
        return $car;
    }

    public static function findById($id)
    {
        return Car::find($id);
    }

   /*  public static function update($bodyStyle, $request)
    {
        if ($request->has('name')) {
            $bodyStyle->name = $request->name;
        }

        $bodyStyle->update();

        return true;
    }

    public static function delete($bodyStyle)
    {
        return $bodyStyle->delete();
    } */
}
