<?php

namespace App\Http\Repository\Frontend;

use App\Models\FAQ;

class FAQRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return FAQ::orderBy('position', 'asc')
            ->get();
    }  
}
