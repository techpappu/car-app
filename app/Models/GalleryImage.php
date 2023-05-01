<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $guarded = false;
    public function fileable()
    {
        return $this->morphTo();
    }
}
