<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\OrdersService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PaymentController extends Controller
{
    function index(): View
    {
        if (!session()->has('delivery_cost') || !session()->has('address')) {
            throw ValidationException::withMessages(['Something went Wrong!']);
        }

        $cartTotalPrice = cartTotalPrice();
        $deliveryCost = session()->get('delivery_cost') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $subtotalPrice = subTotalPrice($deliveryCost);

        return view('frontend.pages.payment', compact('cartTotalPrice', 'deliveryCost', 'discount', 'subtotalPrice'));
    }

    function makePayment(Request $request, OrdersService $ordersService)
    {
        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal']
        ]);

        // Create Order
        if ($ordersService->createOrder()) {
            return true;
        }
    }
}
