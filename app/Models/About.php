<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = "abouts"; 
    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'description',
        'created_at',
        'updated_at'    
    ];
}
