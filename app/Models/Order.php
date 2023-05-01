<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }

    public function filesCertificate()
    {
        return $this->morphMany('App\Models\CertificationFile', 'fileable');
    }
}
