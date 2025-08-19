<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModules extends Model
{
    protected $table = 'course_modules';
    protected $fillable = [
        'course_id',
        'name',
        'description',
        'order_no',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
