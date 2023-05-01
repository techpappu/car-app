<?php

namespace App\Http\Repository;

use App\Models\File;

class FileRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function getFileById($id)
    {
        return File::where('fileable_id', $id)
            ->where('fileable_type', 'App\Models\Order')
            ->get();
    }
    
}
