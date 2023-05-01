<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceCalculatorResource extends JsonResource
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
            'country' => $this->country,
            'port' => $this->port,
            'delivery_charge' => $this->delivery_charge,
            'marine_insurance' => $this->marine_insurance,
            'pre_export_inspection' => $this->pre_export_inspection,
        ];
    }
}
