<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    protected $table = 'course_lessons';
    protected $fillable = [
        'course_module_id',
        'title',
        'type',
        'content',
        'video_url', 
		'downloadable_file', 
		'order_no'
    ];

    public function courseModule()
    {
        return $this->belongsTo(CourseModules::class);
    }
}
