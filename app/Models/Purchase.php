<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $fillable = [
        'order_id',
        'payable_amount',
        'billing_name',
        'billing_email',
        'billing_phone',
        'country',
        'state',
        'city',
        'address',
        'payment_method',
        'created_at',
        'updated_at',
    ];
}
