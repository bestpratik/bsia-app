<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $table = 'ebooks';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'author',
        'featured_image',
        'status'
    ];
}
