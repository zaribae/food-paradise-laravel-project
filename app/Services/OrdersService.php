<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;

final class OrdersService
{
    /** Store Order in Database */
    function createOrder()
    {
        try {
            $order = new Order();

            $order->invoice_id = generateInvoiceId();
            $order->user_id = auth()->user()->id;
            $order->address = session()->get('address');
            $order->address_id = session()->get('address_id');
            if (session()->has('coupon')) {
                $order->discount = session()->get('coupon')['discount'];
                $order->coupon_info = json_encode(session()->get('coupon'));
            }
            $order->delivery_cost = session()->get('delivery_cost');
            $order->subtotal = cartTotalPrice();
            $order->grand_total = subTotalPrice(session()->get('delivery_cost'));
            $order->product_qty = Cart::content()->count();
            $order->payment_method = NULL;
            $order->payment_status = 'PENDING';
            $order->payment_approve_date = NULL;
            $order->transaction_id = NULL;
            $order->currency_name = NULL;
            $order->order_status = 'PENDING';
            $order->save();

            foreach (Cart::content() as $product) {
                $orderItem = new OrderItem();

                $orderItem->order_id = $order->id;
                $orderItem->product_name = $product->name;
                $orderItem->product_id = $product->id;
                $orderItem->product_price = $product->price;
                $orderItem->qty = $product->qty;
                $orderItem->product_size = json_encode($product->options?->product_sizes);
                $orderItem->product_option = json_encode($product->options?->product_options);
                $orderItem->save();
            }

            // Put order id to session
            session()->put('order_id', $order->id);
            // Put the orders grand total to session
            session()->put('grand_total', $order->grand_total);

            return true;
        } catch (\Exception $e) {
            logger($e);
            return false;
        }
    }

    /** Clear Session Items */
    function clearSession()
    {
        Cart::destroy();
        session()->forget('coupon');
        session()->forget('address');
        session()->forget('delivery_cost');
        session()->forget('address_id');
        session()->forget('order_id');
        session()->forget('grand_total');
    }
}
