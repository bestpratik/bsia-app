<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseFaqs extends Model
{
    protected $table = 'course_faqs';
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'order_no'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
