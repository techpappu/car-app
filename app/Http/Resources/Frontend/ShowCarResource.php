<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'brand' => $this->brand_id,
            'model' => $this->model_id,
            'bodyStyle' => $this->body_style_id,
            'color' => $this->color_id,
            'title' => $this->title,
            'stock_no' => $this->stock_no,
            'modelYear' => $this->model_year,
            'carUpDate' => $this->car_up_date,
            'location' => $this->car_location,
            'mileage' => $this->mileage,
            'mileage_type' => $this->mileage_type,
            'repaired' => $this->repaired,
            'steering' => $this->steering,
            'transmission' => $this->transmission,
            'fuel' => $this->fuel,
            'drive_system' => $this->drive_system,
            'doors' => $this->doors,
            'displacement' => $this->displacement,
            'description' => $this->description,
            'chassisNo' => $this->chassis_no,
            'modelCode' => $this->model_code,
            'car_sold_status' => $this->car_sold_status,
            'carCondition' => $this->carCondition,
            'carStandardFeature' => $this->carStandardFeature,
            'carEquipment' => $this->carEquipment,
            'carInteriorExterior' => $this->carInteriorExterior,
            'carSelfDriving' => $this->carSelfDriving,
            'carSafetyEquipment' => $this->carSafetyEquipment
        ];
    }
}
