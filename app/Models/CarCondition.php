<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarCondition extends Model
{
      /**
     * The Condition info that belong to the car.
     */
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'cars');
    }
}
