<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoTestimonial extends Model
{
    protected $table = 'video_testimonials';
    protected $fillable = [
        'name', 
        'location', 
        'video_path', 
        'image',
        'created_at',
        'updated_at'
    ];
}
