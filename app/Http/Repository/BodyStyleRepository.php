<?php

namespace App\Http\Repository;

use App\Models\BodyStyle;

class BodyStyleRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return BodyStyle::orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function allBodyStyle()
    {
        return BodyStyle::orderBy('id', 'desc')
            ->get();
    }

    public static function store($request)
    {
        $bodyStyle = new BodyStyle();
        $bodyStyle->name = $request->name;
        $bodyStyle->save();
        return $bodyStyle;
    }

    public static function findById($id)
    {
        return BodyStyle::find($id);
    }

    public static function update($bodyStyle, $request)
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
    }
}
