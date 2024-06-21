<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderPlacedNotification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    function index(): View
    {
        $todayOrders = Order::whereDate('created_at', now()->format('Y-m-d'))->count();
        $todayEarnings = Order::whereDate('created_at', now()->format('Y-m-d'))->where('order_status', 'DELIVERED')->sum('grand_total');

        $monthlyOrders = Order::whereMonth('created_at', now()->month)->count();
        $monthlyEarnings = Order::whereMonth('created_at', now()->month)->where('order_status', 'DELIVERED')->sum('grand_total');

        $totalOrders = Order::count();
        $totalEarnings = Order::where('order_status', 'DELIVERED')->sum('grand_total');

        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $totalBlogs = Blog::count();
        $totalProducts = Product::count();

        return view('admin.dashboard.index', compact(
            'todayOrders',
            'todayEarnings',
            'monthlyOrders',
            'monthlyEarnings',
            'totalOrders',
            'totalEarnings',
            'totalUsers',
            'totalAdmins',
            'totalBlogs',
            'totalProducts'
        ));
    }

    function clearNotification()
    {
        $notification = OrderPlacedNotification::query()->update(['seen' => 1]);

        toastr()->success('Notification mark all read successfully!');
        return redirect()->back();
    }
}
