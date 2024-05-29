<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Dotenv\Util\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrderController extends Controller
{
    function index(OrderDataTable $dataTables)
    {
        return $dataTables->render('admin.order.index');
    }

    function show(string $orderId): View
    {
        $order = Order::findOrFail($orderId);
        return view('admin.order.components.show', compact('order'));
    }

    function updateStatus(Request $request, string $orderId): RedirectResponse|Response
    {
        $request->validate([
            'payment_status' => ['required', 'in:PENDING,COMPLETED'],
            'order_status' => ['required', 'in:PENDING,IN_PROCESS,DELIVERED,CANCELED']
        ]);

        $order = Order::findOrFail($orderId);

        $order->payment_status = $request->payment_status;
        $order->order_status = $request->order_status;
        $order->save();

        if ($request->ajax()) {
            return response([
                'message' => 'Order status updated successfully!'
            ]);
        } else {
            toastr()->success('Order updated successfully');

            return redirect()->back();
        }
    }

    function getOrderStatus(string $orderId)
    {
        $order = Order::select(['order_status', 'payment_status'])->findOrFail($orderId);

        return response($order);
    }

    function removeOrder(string $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            $order->delete();

            return response([
                'status' => 'success',
                'message' => 'Order Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
