<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = "testimonials";
    protected $fillable = [
        'name', 
        'image', 
        'profession',
        'review',
        'created_at',
        'updated_at'
    ];
}
