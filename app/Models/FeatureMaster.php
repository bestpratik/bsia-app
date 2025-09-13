<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureMaster extends Model
{
    protected $table = 'features_master';
    protected $fillable = [
        'name', 
        'icon',
        'order_no'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_feature', 'feature_id', 'course_id');
    }
}
