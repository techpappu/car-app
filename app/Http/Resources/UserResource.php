<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'phone_country_name' => $this->phone_country_name,
            'phone_country_code' => $this->phone_country_code,
            'address' => $this->address,
            'gender' => $this->gender,
            'isEnabled'=>$this->is_enabled
            
        ];
    }
}
