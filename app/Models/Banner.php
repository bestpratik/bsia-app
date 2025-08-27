<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "banners";
    protected $fillable = [
        'type',
        'title',
        'sub_title',
        'image',
        'video_url',
        'button_text_one',
        'button_link_one',
        'button_text_two',
        'button_link_two',
        'created_at',
        'updated_at'
    ];
}
