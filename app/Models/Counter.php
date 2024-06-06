<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = [
        'background',
        'icon_one',
        'count_one',
        'name_one',
        'icon_two',
        'count_two',
        'name_two',
        'icon_three',
        'count_three',
        'name_three',
        'icon_four',
        'count_four',
        'name_four',
    ];
}
