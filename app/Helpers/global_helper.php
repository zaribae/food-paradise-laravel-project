<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;

/**
 * Create unique slug
 */

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name): String
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }

        $slug = Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

/**
 * Positioning currency function
 */
if (!function_exists('currencyPosition')) {
    function currencyPosition($price): string
    {
        if (config('settings.site_currency_icon_position') === 'left') {
            return config('settings.site_currency_icon') . $price;
        } else {
            return  $price . config('settings.site_currency_icon');
        }
    }
}

/**
 * Calculate cart total price
 */
if (!function_exists('cartTotalPrice')) {
    function cartTotalPrice()
    {
        $total = 0;

        foreach (Cart::content() as $product) {
            $productPrice = $product->price;
            $sizePrice = $product->options?->product_sizes['price'] ?? 0;
            $optionPrice =  0;
            foreach ($product->options->product_options as $productOption) {
                $optionPrice += $productOption['price'];
            }

            $total += ($productPrice + $sizePrice + $optionPrice) * $product->qty;
        }

        return $total;
    }
}
