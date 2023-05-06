<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CertificationFile;
use Illuminate\Support\Facades\Response;
use App\Models\File;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

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

    public function carImageDownload($id)
    {
        $car = \Facades\App\Models\Car::find($id);

        $files = [];
        
        foreach ($car->files as $image) {
            $files[] =$image->path; // Add the renamed image file to the files array
        }
    
        $zip = new ZipArchive;
        $fileName = 'kmcjapan-'.$car->title.'-'.time().'-images.zip'; // Set the filename for the zip file
    
        if ($zip->open($fileName, ZipArchive::CREATE) === TRUE) {
            $index=0;
            foreach ($files as $file) {
                $extension=explode('.', $file);
                $zip->addFile($file, 'kmcjapan-images-'.$car->title.'-'.$index.'.'.$extension[1]);
                $index+=1;
            }
            $zip->close();
        }
        $headers = array('Content-Type' => 'application/octet-stream'); // Set the appropriate headers for downloading
        return response()->download($fileName, $fileName, $headers)->deleteFileAfterSend(); // Download the zip file and delete it after sending
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
