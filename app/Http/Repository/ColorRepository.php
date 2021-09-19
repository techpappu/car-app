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
            ->paginate(5);
    }

    public static function allBodyStyle()
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