<?php

namespace App\Http\Repository;

use App\Models\File;
use App\Models\Car;
use Illuminate\Http\UploadedFile;

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
            'cars.car_location'
        )
            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->orderBy('id', 'desc')
            ->paginate(5);
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
            }
        }
        $car->car_location = $request->car_location;
        $car->mileage = $request->mileage;
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
        if ($request->is_featured) {
            $car->is_featured = 1;
        }
        $car->save();
        $car->carCondition()->attach($request->carCondition);
        $car->carStandardFeature()->attach($request->standardFeature);
        $car->carEquipment()->attach($request->equipment);
        $car->carInteriorExterior()->attach($request->interiorExterior);
        $car->carSelfDriving()->attach($request->selfDriving);
        $car->carSafetyEquipment()->attach($request->safetyEquipment);

        if ($request->hasfile('imageFile')) {

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
                    'extension' => $uploaded_file->extension(),
                    'path' => 'upload/images/' .
                        $uniqueName
                ]);
                $car->files()->create($file->toArray());
            }
        }

        return $car;
    }

    public static function findById($id)
    {
        $car = Car::select([
            'id', 'brand_id', 'model_id', 'body_style_id', 'color_id', 'title', 'stock_no', 'model_year', 'car_up_date',
            'car_location', 'mileage', 'repaired', 'steering', 'transmission', 'fuel', 'drive_system', 'doors', 'displacement',
            'chassis_no', 'model_code', 'is_featured'
        ])
            ->with([
                'carCondition' => function ($q) {
                    $q->select([
                        'car_id', 'car_condition_id'
                    ]);
                }
            ])
            ->with([
                'carStandardFeature' => function ($q) {
                    $q->select([
                        'car_id', 'standard_feature_id'
                    ]);
                }
            ])
            ->with([
                'carEquipment' => function ($q) {
                    $q->select([
                        'car_id', 'equipment_id'
                    ]);
                }
            ])
            ->with([
                'carInteriorExterior' => function ($q) {
                    $q->select([
                        'car_id', 'interior_exterior_id'
                    ]);
                }
            ])
            ->with([
                'carSelfDriving' => function ($q) {
                    $q->select([
                        'car_id', 'self_driving_id'
                    ]);
                }
            ])
            ->with([
                'carSafetyEquipment' => function ($q) {
                    $q->select([
                        'car_id', 'safety_equipment_id'
                    ]);
                }
            ])
            ->find($id);

        return $car;
        //return Car::find($id);
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
        if ($request->has('model_year')) {
            $model_year = $request->model_year != null ? strtotime($request->model_year) : null;
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
        if ($request->is_featured) {
            $car->is_featured = 1;
        } else {
            $car->is_featured = 0;
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

        $car->update();

        return true;
    }

    public static function delete($car)
    {
        return $car->delete();
    }
}
