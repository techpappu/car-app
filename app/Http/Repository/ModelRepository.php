<?php

namespace App\Http\Repository;

use App\Models\Models;

class ModelRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return Models::select('models.id', 'models.name', 'brands.id as brand_id', 'brands.name as brand')
            ->join('brands', 'brands.id', '=', 'models.brand_id')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }
    public static function store($request)
    {
        $models = new Models();
        $models->name = $request->name;
        $models->brand_id = $request->brand;
        $models->save();
        return $models;
    }

    public static function findById($id)
    {
        return Models::find($id);
    }

    public static function update($models, $request)
    {
        if ($request->has('name')) {
            $models->name = $request->name;
        }
        if ($request->has('brand')) {
            $models->brand_id = $request->brand;
        }
        $models->update();

        return true;
    }

    public static function delete($models)
    {
        return $models->delete();
    }

    public static function getModelsByBrand($brandId)
    {
        
        return Models::select('id', 'name')
            ->where('brand_id', $brandId)
            ->get();
    }
}
