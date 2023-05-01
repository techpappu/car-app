<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CertificationFile;
use Illuminate\Support\Facades\Response;
use App\Models\File;

class DownloadController extends Controller
{

    public function download($id)
    {
        $file_ = File::find($id);
        if ($file_) {
            $filename = $file_->original_file_name;
            $tempImage = tempnam(sys_get_temp_dir(), $filename);
            copy('https://admin.kmcjapan.co.jp/'.$file_->path, $tempImage);
            return response()->download($tempImage, $filename);
        }
    }

    public function downloadCertificate($id)
    {

       $file_ = CertificationFile::find($id);
        if ($file_) {
            $filename = $file_->original_file_name;
            $tempImage = tempnam(sys_get_temp_dir(), $filename);
            copy('https://admin.kmcjapan.co.jp/'.$file_->path, $tempImage);
            return response()->download($tempImage, $filename);
        }
    }
}
