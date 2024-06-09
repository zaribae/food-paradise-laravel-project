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

/**
 * Calculate single product in cart total price
 */
if (!function_exists('cartProductTotalPrice')) {
    function cartProductTotalPrice($rowId)
    {
        $total = 0;

        $product = Cart::get($rowId);

        $productPrice = $product->price;
        $productSizePrice = $product->options?->product_sizes['price'] ?? 0;
        $productOptionPrice = 0;

        foreach ($product->options->product_options as $productOptions) {
            $productOptionPrice += $productOptions['price'];
        }

        $total = ($productPrice + $productSizePrice + $productOptionPrice) * $product->qty;

        return $total;
    }
}


/**
 * Calculate subtotal in cart price
 */
if (!function_exists('subTotalPrice')) {
    function subTotalPrice($deliveryCost = 0)
    {
        $total = 0;
        $cartTotal = cartTotalPrice();

        if (session()->has('coupon')) {
            $discount = session()->get('coupon')['discount'];

            if ($cartTotal < $discount) {
                $total = $cartTotal + $deliveryCost;
            } else {
                $total = ($cartTotal + $deliveryCost) - $discount;
            }
        } else {
            $total = $cartTotal + $deliveryCost;
        }
        return $total;
    }
}


/**
 * Generate Invoice Id
 */
if (!function_exists('generateInvoiceId')) {
    function generateInvoiceId()
    {
        $randomNumber = rand(1, 99999999);
        $currentDate = now();

        $invoiceId = $randomNumber . $currentDate->format('ymd') . $currentDate->format('s');

        return $invoiceId;
    }
}


/**
 * Get Product Discount in percent
 */
if (!function_exists('discountInPercent')) {
    function discountInPercent($price, $dicountPrice)
    {
        $result = (($price - $dicountPrice) / $price) * 100;

        return round($result);
    }
}


/**
 * truncate long string to readable string
 */
if (!function_exists('truncateString')) {
    function truncateString(string $string, int $limit = 50)
    {
        return Str::limit($string, $limit, '...');
    }
}


/**
 * get thumbnail image from link
 */
if (!function_exists('getThumbnail')) {
    function getThumbnail($link, $size = 'medium')
    {
        $links = explode('.be/', $link);
        $videoId = $links[1];

        $finalSize = match ($size) {
            'low' => 'sddefault',
            'medium' => 'mqdefault',
            'high' => 'hqdefault',
            'max' => 'maxresdefault',
        };

        return "https://img.youtube.com/vi/$videoId/$finalSize.jpeg";
    }
}
