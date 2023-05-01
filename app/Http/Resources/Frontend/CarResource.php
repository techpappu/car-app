<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'title' => $this->title,
            'price' => $this->price,
            'stock_no' => $this->stock_no,
            'model_year' => $this->model_year,
            'car_up_date' => $this->car_up_date,
            'mileage' => $this->mileage,
            'repaired' => $this->repaired,
            'steering' => $this->steering,
            'transmission' => $this->transmission,
            'fuel' => $this->fuel,
            'drive_system' => $this->drive_system,
            'doors' => $this->doors,
            'displacement' => $this->displacement,
            'chassis_no' => $this->chassis_no,
            'model_code' => $this->model_code,
            'car_location' => $this->car_location,
            'description' => $this->description,
            'is_featured' => $this->is_featured,

        ];
    }
}
