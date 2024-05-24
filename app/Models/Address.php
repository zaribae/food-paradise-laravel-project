<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'address', 'type'
    ];


    function deliveryArea(): BelongsTo
    {
        return $this->belongsTo(DeliveryArea::class);
    }
}
