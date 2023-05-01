<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackFile extends Model
{
    protected $table = 'feedback_files';
    protected $fillable = [
        'id', 'customer_feedback_id', 'file_name'
    ];
}
