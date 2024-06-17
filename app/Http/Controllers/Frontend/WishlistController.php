<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WishlistController extends Controller
{
    function store($productId)
    {
        if (!Auth::check()) {
            throw ValidationException::withMessages(['Please logged in before adding product to your Wishlist']);
        }

        $productAlreadyExists = Wishlist::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->exists();


        if ($productAlreadyExists) {
            throw ValidationException::withMessages(['Product is already in your Wishlist']);
        }


        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $productId
        ]);

        return response([
            'status' => 'success',
            'message' => 'Product added to wishlist successfully'
        ]);
    }
}
