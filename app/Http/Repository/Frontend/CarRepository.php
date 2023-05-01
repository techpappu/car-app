<?php

namespace App\Http\Repository\Frontend;

use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function fearturedCar()
    {

        return Car::select(
            'brands.name as brand',
            'models.name as model',
            'cars.id',
            'cars.title',
            'cars.price',
            'cars.stock_no',
            'cars.model_year',
            'cars.mileage',
            'cars.mileage_type',
            'cars.description',
            'cars.car_sold_status'
        )

            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->orderBy('id', 'desc')
            ->where('is_featured', 1)
            ->get();
    }
    public static function galleryImageCars()
    {

        return Car::select(
            'brands.name as brand',
            'models.name as model',
            'cars.id',
            'cars.title',
            'cars.price'
        )

            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->orderBy('id', 'desc')
            ->where('is_gallery', 1)
            ->get();
    }
    /* public static function allBodyStyle()
    {
    return Car::orderBy('id', 'desc')
    ->get();
    } */

    public static function findById($id)
    {
        $car = Car::select([
            'cars.id', 'cars.title', 'cars.price',
            'cars.stock_no', 'cars.model_year', 'cars.car_up_date', 'cars.car_location', 'cars.mileage', 'cars.mileage_type', 'cars.repaired', 'cars.steering',
            'cars.transmission', 'cars.fuel', 'cars.drive_system', 'cars.doors', 'cars.displacement', 'cars.description',
            'cars.chassis_no', 'cars.model_code', 'cars.cubic_meter', 'cars.seating_capacity', 'cars.car_sold_status', 'brands.name as brand', 'models.name as model', 'body_styles.name as bodyStyle', 'colors.name as colorName',
        ])
            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->join('body_styles', 'body_styles.id', '=', 'cars.body_style_id')
            ->join('colors', 'colors.id', '=', 'cars.color_id')
            ->with([
                'carCondition' => function ($q) {
                    $q->select([
                        'car_id', 'car_condition_id',
                    ]);
                },
            ])
            ->with([
                'carStandardFeature' => function ($q) {
                    $q->select([
                        'car_id', 'standard_feature_id',
                    ]);
                },
            ])
            ->with([
                'carEquipment' => function ($q) {
                    $q->select([
                        'car_id', 'equipment_id',
                    ]);
                },
            ])
            ->with([
                'carInteriorExterior' => function ($q) {
                    $q->select([
                        'car_id', 'interior_exterior_id',
                    ]);
                },
            ])
            ->with([
                'carSelfDriving' => function ($q) {
                    $q->select([
                        'car_id', 'self_driving_id',
                    ]);
                },
            ])
            ->with([
                'carSafetyEquipment' => function ($q) {
                    $q->select([
                        'car_id', 'safety_equipment_id',
                    ]);
                },
            ])
            ->find($id);

        return $car;
    }

    public static function getCarCountByBrand()
    {
        $cars = DB::table('cars')
            ->rightJoin('brands', 'brands.id', '=', 'cars.brand_id')
            ->select('brands.id', 'brands.name', 'brands.image', DB::raw("count(cars.id) as count"))
            ->groupBy('brands.id')
            ->get();
        return $cars;
    }

    public static function relatedCars($id, $brand, $model, $bodyStyle)
    {

        return Car::select(
            'brands.name as brand',
            'models.name as model',
            'cars.id',
            'cars.title',
            'cars.price',
            'cars.stock_no',
            'cars.model_year',
            'cars.mileage',
            'cars.description'
        )

            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->join('body_styles', 'body_styles.id', '=', 'cars.body_style_id')
            ->where('cars.id', '!=', $id)
            ->when($brand, function ($q) use ($brand) {
                $q->where('brands.name', $brand);
            })
            ->when($model, function ($q) use ($model) {
                $q->where('models.name', $model);
            })
            ->when($bodyStyle, function ($q) use ($bodyStyle) {
                $q->where('body_styles.name', $bodyStyle);
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public static function carList($request)
    {
        $sort = "desc";
        $sortBy = 'cars.car_up_date';
        if($request->sortBy == "za" || $request->sortBy == "az"){
           
            $sortBy = 'cars.title';
            if($request->sortBy == "za"){
                $sort = "desc";
            }else{
                $sort = "asc";
            }
        }
       
        if($request->sortBy == "low_high" || $request->sortBy == "high_low"){
            $sortBy = 'cars.price';
            if($request->sortBy == "low_high"){
                $sort = "asc";
            }else{
                $sort = "desc";
            }
           
        }
        return Car::select(
            'brands.name as brand',
            'models.name as model',
            'colors.name as color',
            'cars.id',
            'cars.title',
            'cars.price',
            'cars.stock_no',
            'cars.model_year',
            'cars.mileage',
            'cars.mileage_type',
            'cars.description',
            'cars.car_location',
            'cars.steering',
            'cars.transmission',
            'cars.displacement',
            'cars.car_sold_status'
        )

            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->join('body_styles', 'body_styles.id', '=', 'cars.body_style_id')
            ->join('colors', 'colors.id', '=', 'cars.color_id')
            ->when($request->id, function ($q) use ($request) {
                $q->where('brands.id', $request->id);
            })
            ->when($request->bodyStyleId, function ($q) use ($request) {
                $q->where('body_styles.id', $request->bodyStyleId);
            })
            ->when($request->model_id, function ($q) use ($request) {
                $q->where('models.id', $request->model_id);
            })
            ->when($request->color_id, function ($q) use ($request) {
                $q->where('cars.color_id', $request->color_id);
            })
            ->when($request->lowYear, function ($q) use ($request) {
                // $q->where('cars.model_year',  '2022-01-26');
                $q->where('cars.model_year', '>=', $request->lowYear);
                $q->where('cars.model_year', '<=', $request->highYear);
                // $q->whereBetween('cars.model_year', [2000, 2022]);
            })
            ->when($request->lowPrice, function ($q) use ($request) {
                $q->whereBetween('price', [$request->lowPrice, $request->highPrice]);
            })

            ->orderBy($sortBy, $sort)
            ->paginate(config('constant.pagination_records'));
    }

    public static function carListSearch($request)
    {

        return Car::select(
            'brands.name as brand',
            'models.name as model',
            'colors.name as color',
            'cars.id',
            'cars.title',
            'cars.price',
            'cars.stock_no',
            'cars.model_year',
            'cars.mileage',
            'cars.mileage_type',
            'cars.description',
            'cars.car_sold_status',
            'cars.steering',
            'cars.displacement'
        )

            ->join('brands', 'brands.id', '=', 'cars.brand_id')
            ->join('models', 'models.id', '=', 'cars.model_id')
            ->join('body_styles', 'body_styles.id', '=', 'cars.body_style_id')
            ->join('colors', 'colors.id', '=', 'cars.color_id')
            ->when($request->carTitle, function ($q) use ($request) {
                $q->where('cars.title', 'LIKE', "%$request->carTitle%");
            })
            ->when($request->id, function ($q) use ($request) {
                $q->where('brands.id', $request->id);
            })
            ->when($request->bodyStyleId, function ($q) use ($request) {
                $q->where('body_styles.id', $request->bodyStyleId);
            })
            ->when($request->model_id, function ($q) use ($request) {
                $q->where('models.id', $request->model_id);
            })
            ->when($request->colors, function ($q) use ($request) {
                $q->where('cars.color_id', $request->white);
                $q->orWhere('cars.color_id', $request->red);
                $q->orWhere('cars.color_id', $request->blue);
                $q->orWhere('cars.color_id', $request->green);
                $q->orWhere('cars.color_id', $request->black);
                $q->orWhere('cars.color_id', $request->brown);
                $q->orWhere('cars.color_id', $request->purple);
                $q->orWhere('cars.color_id', $request->yellow);
                $q->orWhere('cars.color_id', $request->orange);
                $q->orWhere('cars.color_id', $request->pink);
                $q->orWhere('cars.color_id', $request->dark_pink);
                $q->orWhere('cars.color_id', $request->gray);
                $q->orWhere('cars.color_id', $request->gradient_purple);
                $q->orWhere('cars.color_id', $request->gradient_yellow);
            })

            ->when($request->min_model_year, function ($q) use ($request) {
                $q->where('cars.model_year', '>=', date($request->min_model_year));
            })
            ->when($request->max_model_year, function ($q) use ($request) {
                $q->where('cars.model_year', '<=', date($request->max_model_year));
            })
            ->when($request->lowPrice, function ($q) use ($request) {
                $q->whereBetween('cars.price', [$request->lowPrice, $request->highPrice]);
            })

            ->when($request->lowMileage, function ($q) use ($request) {
                $q->whereBetween('cars.mileage', [$request->lowMileage, $request->highMileage]);
            })
            ->when($request->mileage_type, function ($q) use ($request) {
                $q->where('cars.mileage_type', $request->mileage_type);
            })
            ->when($request->lowDisplacement, function ($q) use ($request) {
                $q->whereBetween('cars.displacement', [$request->lowDisplacement, $request->highDisplacement]);
            })

            ->when($request->transmission, function ($q) use ($request) {
                $q->where('cars.transmission', $request->transmission);
            })

            ->when($request->drive, function ($q) use ($request) {
                $q->where('cars.drive_system', $request->drive);
            })

            ->when($request->fuel, function ($q) use ($request) {
                $q->where('cars.fuel', $request->fuel);
            })

            ->when($request->repaired, function ($q) use ($request) {
                $q->where('cars.repaired', $request->repaired);
            })

            ->when($request->stearing, function ($q) use ($request) {
                $q->where('cars.steering', $request->stearing);
            })

            ->when($request->lowSeating, function ($q) use ($request) {
                $q->whereBetween('cars.seating_capacity', [$request->lowSeating, $request->highSeating]);
            })

            ->orderBy('cars.id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }
}
