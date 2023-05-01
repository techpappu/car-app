<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
    protected $table = 'customer_feedback';

    public function feedbackFile()
    {
        return $this->hasMany(FeedbackFile::class, 'customer_feedback_id');
    }
}
