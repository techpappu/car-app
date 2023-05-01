<?php

namespace App\Http\Repository\Frontend;

use App\Models\BodyStyle;


class BodyStyleRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function allBodyStyle()
    {
        return BodyStyle::orderBy('id', 'desc')
            ->get();
    }
}
