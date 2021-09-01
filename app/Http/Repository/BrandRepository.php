<?php

namespace App\Http\Repository;

use App\Models\Brand;

class BrandRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return Brand::orderBy('id', 'desc')
            ->paginate(5);
    }
    public static function store($request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();
        return $brand;
    }

    public static function findById($id)
    {
        return Brand::find($id);
    }

    public static function update($brand, $request)
    {
        if ($request->has('name')) {
            $brand->name = $request->name;
        }

        $brand->update();

        return true;
    }

    public static function delete($brand)
    {
        return $brand->delete();
    }
}
