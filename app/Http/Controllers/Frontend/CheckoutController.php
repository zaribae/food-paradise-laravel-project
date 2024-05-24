<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    function index(): View
    {
        $addresses = Address::where('user_id', auth()->user()->id)->get();
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        return view('frontend.pages.checkout', compact('addresses', 'deliveryAreas'));
    }

    function calculateDeliveryTotal(string $addressId)
    {
        try {
            $address = Address::findOrFail($addressId);

            $deliveryCost = $address->deliveryArea?->delivery_cost;
            $cartSubtotal = subTotalPrice() + $deliveryCost;

            return response([
                'delivery_cost' => $deliveryCost,
                'cart_subtotal' => $cartSubtotal
            ], 200);
        } catch (\Exception $e) {
            return response([
                'message' => 'Something went wrong!'
            ], 422);
        }
    }
}
