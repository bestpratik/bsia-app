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

    public function lessons()
    {
        return $this->hasMany(CourseLesson::class, 'course_module_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_module_id');
    }
}
 