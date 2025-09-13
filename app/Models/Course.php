<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'about_course',
        'why_join_the_course',
        'instructor_name',
        'instructor_designation',
        'instructor_details',
        'mrp',
        'sellable_price',
        'is_popular',
        'show_on_home',
        'featured_image',
        'is_certificate',
        'certificate_file',
        'language',
        'status',
        'order_no',
        'created_at',
        'updated_at',
    ];

    public function modules()
    {
        return $this->hasMany(CourseModules::class);
    }
}
 