<?php

namespace App\Http\Repository\Frontend;

use App\Models\CertificationFile;
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
        return File::orderBy('position', 'asc')
            ->where('fileable_id', $id)
            ->get();
    }

    public static function getFileByIdAndType($id)
    {
        return File::where('fileable_id', $id)
            ->where('fileable_type', 'App\Models\Order')
            ->get();
    }

    public static function getFileByIdFirstOne($id)
    {
        return File::where('fileable_id', $id)
            ->get()->first();
    }

    public static function getFileCertificate($id)
    {
        return CertificationFile::where('fileable_id',$id)->get();
    }
}
