<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificationFile extends Model
{
    protected $guarded = false;
    public function fileable()
    {
        return $this->morphTo();
    }
}
