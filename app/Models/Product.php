<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'short_description', 'product_category_id',
        'long_description', 'price', 'offer_price',
        'sku', 'seo_title', 'seo_description',
        'status', 'show_at_home'
    ];
}
