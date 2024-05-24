<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 'min_delivery_time', 'max_delivery_time', 'delivery_cost', 'status'
    ];
}
