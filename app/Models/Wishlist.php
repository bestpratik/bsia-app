<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $fillable = [
        'course_id',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
