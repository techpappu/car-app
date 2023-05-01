<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\CarRepository;
use App\Http\Repository\Frontend\FileRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\CarResource;
use App\Http\Resources\Frontend\ShowCarResource;

class CarService
{
    use RespondsWithHttpStatus;
    public function carListing($page){
       
        $carList= \Facades\App\Models\Car::latest()->paginate($page);
        // foreach ($carList as $value) {
        //     $file = FileRepository::getFileById($value->id);           
        //     if($file){
        //         $value->images = $file;
        //     }else{
        //         $value->images = [];
        //     }
        // }

        return $carList;
    }
    public function fearturedCar()
    {
        // return CarRepository::fearturedCar();
        $fearturedCars = CarRepository::fearturedCar();

        foreach ($fearturedCars as $value) {
            $file = FileRepository::getFileById($value->id);           
            if($file){
                $value->images = $file;
            }else{
                $value->images = [];
            }
        }

        return $fearturedCars;
        // return CarResource::collection(CarRepository::fearturedCar());

        /*  $data = [ 
        'fearturedCar' => CarResource::collection(CarRepository::fearturedCar())
       ];
return $data; */
    }
    public function galleryImageCars()
    {
        $fearturedCars = CarRepository::galleryImageCars();

        foreach ($fearturedCars as $value) {
           $file = FileRepository::getFileById($value->id);           
            if($file){
                $value->images = $file;
            }else{
                $value->images = [];
            }
           
        }
        return $fearturedCars;
        
    }

    public function show($id)
    {
        $car = CarRepository::findById($id);
        if (!$car) {
            return null;
           // return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $car->images = FileRepository::getFileById($car->id);
        return new ShowCarResource($car);
    }


    public function relatedCars($id, $brand, $model, $bodyStyle)
    {
        $cars = CarRepository::relatedCars($id, $brand, $model, null);


        if (count($cars) <= 0) {
            $cars = CarRepository::relatedCars($id, $brand, null, $bodyStyle);
        }

        if (count($cars) <= 0) {
            $cars = CarRepository::relatedCars($id, null, null, $bodyStyle);
        }

        foreach ($cars as $value) {
            $value->images = FileRepository::getFileById($value->id);
        }

        return $cars;
    }

    public function getCarCountByBrand()
    {
        return CarRepository::getCarCountByBrand();
    }

    public function carList($request)
    {
        $cars = CarRepository::carList($request);
        foreach ($cars as $value) {
            $value->images = FileRepository::getFileByIdFirstOne($value->id);
            
        }
        return $cars;
    }

    public function carListSearch($request)
    {
        if($request->colors){
            $var=explode(',',$request->colors);
             foreach($var as $row)
            {
                if($row==1){
                    $request->white = 1;
                }else if($row == 2){
                    $request->red = 2;
                }else if($row == 3){
                    $request->blue = 3;
                }else if($row == 4){
                    $request->green = 4;
                }else if($row == 5){
                    $request->black = 5;
                }else if($row == 6){
                    $request->brown = 6;
                }else if($row == 7){
                    $request->purple = 7;
                }else if($row == 8){
                    $request->yellow = 8;
                }else if($row == 9){
                    $request->orange = 9;
                }else if($row == 10){
                    $request->pink = 10;
                }else if($row == 11){
                    $request->dark_pink = 11;
                }else if($row == 12){
                    $request->gray = 12;
                }else if($row == 13){
                    $request->gradient_purple = 13;
                }else if($row == 14){
                    $request->gradient_yellow = 14;
                }
            }
        }
       
        $cars = CarRepository::carListSearch($request);
        foreach ($cars as $value) {
            $value->images = FileRepository::getFileByIdFirstOne($value->id);
            
        }
        return $cars;
    }
}
