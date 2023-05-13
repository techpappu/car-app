<?php

namespace App\Http\Repository;

use App\Models\File;
use App\Models\Car;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image as Image;

class CarRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index()
    {

        return Car::select(
            'brands.name as brand',
            'models.name as model',
            'cars.id',
            'cars.title',
            'cars.stock_no',
            'cars.model_year',
            'cars.car_location',
            'cars.car_sold_status'
        )
            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }

    /* public static function allBodyStyle()
    {
        return Car::orderBy('id', 'desc')
            ->get();
    } */

    public static function store($request)
    {

        $car = new Car();
        $car->brand_id = $request->brand_id;
        $car->model_id = $request->model_id;
        $car->body_style_id = $request->body_style_id;
        $car->color_id = $request->color_id;
        $car->title = $request->title;
        $car->price = $request->price;
        if ($request->has('model_year')) {
            $model_year = $request->model_year != null ? strtotime($request->model_year) : null;
            if ($model_year != null) {
                $date = date('Y-m-d', $model_year);
                $car->model_year = $date;
            }
        }

        $car->stock_no = $request->stock_no;

        if ($request->has('car_up_date')) {            
            $car_up_date = $request->car_up_date != null ? strtotime($request->car_up_date) : null;
            if ($car_up_date != null) {
                $date = date('Y-m-d', $car_up_date);
                $car->car_up_date = $date;
            }else{
                $date = date('Y-m-d');
                $car->car_up_date = $date;
            }
        }else{
            $date = date('Y-m-d');
            $car->car_up_date = $date;
        }
        $car->car_location = $request->car_location;
        $car->mileage = $request->mileage;
        $car->mileage_type = $request->mileage_type;
        $car->repaired = $request->repaired;
        $car->steering = $request->steering;
        $car->transmission = $request->transmission;
        $car->fuel = $request->fuel;
        $car->drive_system = $request->drive_system;
        $car->doors = $request->doors;
        $car->displacement = $request->displacement;
        $car->chassis_no = $request->chassis_no;
        $car->model_code = $request->model_code;
        $car->description = $request->description;
        $car->seating_capacity = $request->seating_capacity;
        if ($request->is_3rd_party_seller) {
            $car->is_3rd_party_seller = 1;
        }
        if ($request->is_featured) {
            $car->is_featured = 1;
        }
        if ($request->is_gallery) {
            $car->is_gallery = 1;
        }
        $car->cubic_meter = $request->cubic_meter;

        $car->save();
        $car->carCondition()->attach($request->carCondition);
        $car->carStandardFeature()->attach($request->standardFeature);
        $car->carEquipment()->attach($request->equipment);
        $car->carInteriorExterior()->attach($request->interiorExterior);
        $car->carSelfDriving()->attach($request->selfDriving);
        $car->carSafetyEquipment()->attach($request->safetyEquipment);

        if ($request->hasfile('imageFile')) {

            $position = 1;
            foreach ($request->file('imageFile') as $imgFile) {
                $uniqueName = md5($imgFile->getClientOriginalName() . time()) . '.' . $imgFile->extension();
                $file = env('FILE_PATH') . $uniqueName;

                if (!file_exists(env('FILE_PATH'))) {
                    // path does not exist
                    mkdir(env('FILE_PATH'), 0777, true);
                }
                $contents = file_get_contents($imgFile);
                file_put_contents($file, $contents);
                $uploaded_file = new UploadedFile($file, $uniqueName);
                //create FIle model
                $file = new File([
                    'file_name' => $uniqueName,
                    'original_file_name' => $imgFile->getClientOriginalName(),
                    'position' => $position,
                    'extension' => $uploaded_file->extension(),
                    'path' => 'upload/images/' .
                        $uniqueName
                ]);
                
                // waterMark
                $img = Image::make('upload/images/'.$uniqueName);
                //insert watermark at bottom-right corner with 10px offset
                $img->insert('mark.png', 'bottom-center', 10, 10);
                $img->save('upload/images/'.$uniqueName);

                //positioning the Image
                $car->files()->create($file->toArray());
                $position = $position + 1;;
            }
        }

        return $car;
    }

    public static function findById($id)
    {
        return Car::find($id);
    }

    public static function update($car, $request)
    {
        if ($request->has('brand_id')) {
            $car->brand_id = $request->brand_id;
        }
        if ($request->has('model_id')) {
            $car->model_id = $request->model_id;
        }
        if ($request->has('body_style_id')) {
            $car->body_style_id = $request->body_style_id;
        }
        if ($request->has('color_id')) {
            $car->color_id = $request->color_id;
        }
        if ($request->has('title')) {
            $car->title = $request->title;
        }
        if ($request->has('price')) {
            $car->price = $request->price;
        }
        if ($request->has('model_year')) {
            $model_year = $request->model_year != null ? strtotime("$request->model_year") : null;
            if ($model_year != null) {
                $date = date('Y-m-d', $model_year);
                $car->model_year = $date;
            }
        }

        if ($request->has('stock_no')) {
            $car->stock_no = $request->stock_no;
        }

        if ($request->has('car_up_date')) {
            $car_up_date = $request->car_up_date != null ? strtotime($request->car_up_date) : null;
            if ($car_up_date != null) {
                $date = date('Y-m-d', $car_up_date);
                $car->car_up_date = $date;
            }
        }


        if ($request->has('car_location')) {
            $car->car_location = $request->car_location;
        }
        if ($request->has('mileage')) {
            $car->mileage = $request->mileage;
        }
        if ($request->has('mileage_type')) {
            $car->mileage_type = $request->mileage_type;
        }
        if ($request->has('repaired')) {
            $car->repaired = $request->repaired;
        }
        if ($request->has('steering')) {
            $car->steering = $request->steering;
        }
        if ($request->has('transmission')) {
            $car->transmission = $request->transmission;
        }
        if ($request->has('fuel')) {
            $car->fuel = $request->fuel;
        }
        if ($request->has('drive_system')) {
            $car->drive_system = $request->drive_system;
        }
        if ($request->has('doors')) {
            $car->doors = $request->doors;
        }
        if ($request->has('displacement')) {
            $car->displacement = $request->displacement;
        }
        if ($request->has('chassis_no')) {
            $car->chassis_no = $request->chassis_no;
        }
        if ($request->has('model_code')) {
            $car->model_code = $request->model_code;
        }
        if ($request->has('description')) {
            $car->description = $request->description;
        }

        $car->seating_capacity = $request->seating_capacity;
        $car->cubic_meter = $request->cubic_meter;

        if ($request->is_featured) {
            $car->is_featured = 1;
        } else {
            $car->is_featured = 0;
        }

        if ($request->is_3rd_party_seller) {
            $car->is_3rd_party_seller = 1;
        } else {
            $car->is_3rd_party_seller = 0;
        }

        if ($request->is_gallery) {
            $car->is_gallery = 1;
        } else {
            $car->is_gallery = 0;
        }

        $car->carCondition()->where('condition_info.car_id', $car->id)->detach();
        $car->carCondition()->attach($request->carCondition);

        $car->carStandardFeature()->where('car_standard_feature.car_id', $car->id)->detach();
        $car->carStandardFeature()->attach($request->standardFeature);

        $car->carEquipment()->where('car_equipment.car_id', $car->id)->detach();
        $car->carEquipment()->attach($request->equipment);

        $car->carInteriorExterior()->where('car_interior_exterior.car_id', $car->id)->detach();
        $car->carInteriorExterior()->attach($request->interiorExterior);

        $car->carSelfDriving()->where('car_self_driving.car_id', $car->id)->detach();
        $car->carSelfDriving()->attach($request->selfDriving);

        $car->carSafetyEquipment()->where('car_safety_equipment.car_id', $car->id)->detach();
        $car->carSafetyEquipment()->attach($request->safetyEquipment);
        if ($request->hasfile('imageFile')) {

            
            $position = 1;
            $filePosition = File::orderBy('position', 'desc')->where('fileable_id', $car->id) ->first();
            if($filePosition){
                $position =  $position + $filePosition->position;
             }
           
            foreach ($request->file('imageFile') as $imgFile) {
                $uniqueName = md5($imgFile->getClientOriginalName() . time()) . '.' . $imgFile->extension();
                $file = env('FILE_PATH') . $uniqueName;

                if (!file_exists(env('FILE_PATH'))) {
                    // path does not exist
                    mkdir(env('FILE_PATH'), 0777, true);
                }
                 $contents = file_get_contents($imgFile);
                file_put_contents($file, $contents);
                $uploaded_file = new UploadedFile($file, $uniqueName);
                //create FIle model
                $file = new File([
                    'file_name' => $uniqueName,
                    'original_file_name' => $imgFile->getClientOriginalName(),
                    'position' => $position,
                    'extension' => $uploaded_file->extension(),
                    'path' => 'upload/images/' .
                        $uniqueName
                ]);
                // waterMark
                $img = Image::make('upload/images/'.$uniqueName);
                /* insert watermark at bottom-right corner with 10px offset */
                $img->insert('mark.png', 'bottom-center', 10, 10);
                $img->save('upload/images/'.$uniqueName);

                //positioning the images
                $car->files()->create($file->toArray());
                $position = $position+1;
            }
        }
        $car->update();

        return true;
    }

    public static function delete($car)
    {   if($car->files){
            foreach($car->files as $file){
                unlink(config('constant.image_file_path') . $file->file_name);
                $file->delete();
            }
        }
        return $car->delete();
    }

    public static function getFileById($id)
    {
        return File::orderBy('position', 'asc')
            ->where('fileable_id', $id)
            ->get();
    }    
    
    public static function findByFileId($id)
    {
        return File::find($id);
    }

    public static function deleteCarImage($file)
    {
        
        unlink(config('constant.image_file_path') . $file->file_name);

        return $file->delete();
    }

    public static function updatePosition($file, $request)
    {
        if ($request->has('position')) {
            $file->position = $request->position;
        }
        
        $file->update();
        return true;
    }
}
