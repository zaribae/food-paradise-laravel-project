<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

use function Laravel\Prompts\alert;

class CartController extends Controller
{
    // Add product to Cart
    function addToCart(Request $request)
    {
        try {
            $product = Product::with(['productSizes', 'productOptions'])->findOrFail($request->product_id);
            $productSizes = $product->productSizes->where('id', $request->product_size)->first();
            $productOptions = $product->productOptions->whereIn('id', $request->product_option);

            $options = [
                'product_sizes' => [],
                'product_options' => [],
                'product_info' => [
                    'image' => $product->thumbnail_image,
                    'slug' => $product->slug,
                ],
            ];

            if ($productSizes !== null) {
                $options['product_sizes'] = [
                    'id' => $productSizes?->id,
                    'name' => $productSizes?->name,
                    'price' => $productSizes?->price,
                ];
            }

            foreach ($productOptions as $option) {
                $options['product_options'][] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'price' => $option->price,
                ];
            }

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
                'weight' => 0,
                'options' => $options
            ]);

            return response([
                'status' => 'success',
                'message' => 'Product added into cart successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong!'
            ], 500);
        }
    }

    function refreshCartProduct()
    {
        return view('frontend.layouts.ajax-request-files.refresh-cart-product')->render();
    }

    function deleteProduct(string $rowId)
    {
        try {
            Cart::remove($rowId);

            return response([
                'status' => 'success',
                'message' => 'Product removed from cart successfully'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
