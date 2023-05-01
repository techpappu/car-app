<?php

namespace App\Http\Repository;

use App\Models\Color;

class ColorRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return Color::orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }

    public static function allColor()
    {
        return Color::orderBy('id', 'desc')
            ->get();
    }

    public static function store($request)
    {
        $color = new Color();
        $color->name = $request->name;
        $color->save();
        return $color;
    }

    public static function findById($id)
    {
        return Color::find($id);
    }

    public static function update($color, $request)
    {
        if ($request->has('name')) {
            $color->name = $request->name;
        }

        $color->update();

        return true;
    }

    public static function delete($color)
    {
        return $color->delete();
    }
}
