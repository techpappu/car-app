<?php

namespace App\Http\Repository;

use App\Models\BodyStyle;
use Illuminate\Http\UploadedFile;

class BodyStyleRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {
        return BodyStyle::orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }

    public static function allBodyStyle()
    {
        return BodyStyle::orderBy('id', 'desc')
            ->get();
    }

    public static function store($request)
    {
        $bodyStyle = new BodyStyle();
        $bodyStyle->name = $request->name;

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
            $bodyStyle->image = $uniqueName;
        }
        $bodyStyle->save();
        return $bodyStyle;
    }

    public static function findById($id)
    {
        return BodyStyle::find($id);
    }

    public static function update($bodyStyle, $request)
    {
        if ($request->has('name')) {
            $bodyStyle->name = $request->name;
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
            if ($bodyStyle->image) {
                unlink(env('FILE_PATH') . $bodyStyle->image);
            }

            $bodyStyle->image = $uniqueName;
        }
        $bodyStyle->update();

        return true;
    }

    public static function delete($bodyStyle)
    {
        if ($bodyStyle->image) {
            unlink(env('FILE_PATH') . $bodyStyle->image);
        }
        return $bodyStyle->delete();
    }
}
