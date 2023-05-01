<?php

namespace App\Http\Repository;

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
            ->paginate(config('constant.pagination_records'));
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
            $is_active = 1;
            if (!$request->is_active) {
                $is_active = 0;
            }
            $galleryImage = new GalleryImage([
                'image' => $uniqueName,
                'url' =>  $request->url,
                'is_active' =>   $is_active,
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
        if ($request->has('url')) {
            $galleryImage->url = $request->url;
        }

        if ($request->has('is_active')) {
            $galleryImage->is_active = 1;
        } else {
            $galleryImage->is_active = 0;
        }

        $galleryImage->update();

        return true;
    }

    public static function delete($galleryImage)
    {
        unlink(env('FILE_PATH') . $galleryImage->image);
        return $galleryImage->delete();
    }
}
