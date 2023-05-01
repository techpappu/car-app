<?php

namespace App\Http\Repository\Frontend;

use App\Models\GalleryImage;
use Illuminate\Http\UploadedFile;
class GalleryImageRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return GalleryImage::orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function allGallery()
    {
        return GalleryImage::orderBy('id', 'desc')
            ->get();
    }

    public static function store($request)
    {
       $galleryImage = null;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $uniqueName = md5($image->getClientOriginalName() . time()) . '.' . $image->extension();
            $file = env('FILE_PATH') . $uniqueName;

            if (!file_exists(env('FILE_PATH'))) {
                // path does not exist
                mkdir(env('FILE_PATH'), 0777, true);
            }

            $contents = file_get_contents($image);
            file_put_contents($file, $contents);
            $uploaded_file = new UploadedFile($file, $uniqueName);
            //create FIle model
            $galleryImage = new GalleryImage([
                'image' => $uniqueName  
            ]);
            $galleryImage->save();
        }
       
        return $galleryImage;
    }

    public static function findById($id)
    {
        return GalleryImage::find($id);
    }

    public static function update($galleryImage, $request)
    {
        if ($request->has('image')) {
            $galleryImage->image = $request->image;
        }

        $galleryImage->update();

        return true;
    }

    public static function delete($galleryImage)
    {
        return $galleryImage->delete();
    }
}
