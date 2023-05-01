<?php

namespace App\Http\Repository\Frontend;

use App\Models\Color;

class ColorRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function allColor()
    {
        return Color::orderBy('id', 'asc')
            ->get();
    }
}
