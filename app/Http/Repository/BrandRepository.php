<?php

namespace App\Http\Repository;

use App\Models\Brand;
use Illuminate\Http\UploadedFile;

class BrandRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return Brand::orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }

    public static function allBrand()
    {
        return Brand::orderBy('id', 'desc')
            ->get();
    }

    public static function store($request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
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
            $brand->image = $uniqueName;
        }
        $brand->save();
        return $brand;
    }

    public static function findById($id)
    {
        return Brand::find($id);
    }

    public static function update($brand, $request)
    {
        if ($request->has('name')) {
            $brand->name = $request->name;
        }
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
            if ($brand->image) {
                unlink(env('FILE_PATH') . $brand->image);
            }

            $brand->image = $uniqueName;
        }
        $brand->update();

        return true;
    }

    public static function delete($brand)
    {
        if ($brand->image) {
            unlink(env('FILE_PATH') . $brand->image);
        }
        return $brand->delete();
    }
}
