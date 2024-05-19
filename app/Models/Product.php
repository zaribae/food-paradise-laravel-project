<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'short_description', 'product_category_id',
        'long_description', 'price', 'offer_price',
        'sku', 'seo_title', 'seo_description',
        'status', 'show_at_home'
    ];

    function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    function productImages(): HasMany
    {
        return $this->hasMany(ProductGallery::class);
    }

    function productSizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
    }

    function productOptions(): HasMany
    {
        return $this->hasMany(ProductOption::class);
    }
}
