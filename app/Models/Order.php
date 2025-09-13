<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'order_number',
        'reference_id',
        'payable_amount',
        'course_type',
        'payment_method',
        'payment_status',
        'status',
        'order_date',
        'payment_date',
        'created_at',
        'updated_at',
    ];
}
