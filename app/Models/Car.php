<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The Condition info that belong to the car.
     */
    public function carCondition()
    {
        return $this->belongsToMany(CarCondition::class, 'condition_info');
    }

    public function carStandardFeature()
    {
        return $this->belongsToMany(StandardFeature::class, 'car_standard_feature');
    }

    public function carEquipment()
    {
        return $this->belongsToMany(Equipment::class, 'car_equipment');
    }
    public function carInteriorExterior()
    {
        return $this->belongsToMany(InteriorExterior::class, 'car_interior_exterior');
    }

    public function carSelfDriving()
    {
        return $this->belongsToMany(SelfDriving::class, 'car_self_driving');
    }

    public function carSafetyEquipment()
    {
        return $this->belongsToMany(SafetyEquipment::class, 'car_safety_equipment');
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }
}
