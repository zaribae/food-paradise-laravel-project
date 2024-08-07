<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AddressCreateRequest;
use App\Http\Requests\Frontend\AddressUpdateRequest;
use App\Models\Address;
use App\Models\DeliveryArea;
use App\Models\Order;
use App\Models\ProductRating;
use App\Models\Reservation;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(): View
    {
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        $userAddresses = Address::where('user_id', auth()->user()->id)->get();
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $reservations = Reservation::where('user_id', auth()->user()->id)->get();
        $reviews = ProductRating::where('user_id', auth()->user()->id)->get();
        $wishlists = Wishlist::with('product')->where('user_id', auth()->user()->id)->latest()->paginate(6);

        $totalOrders = Order::where('user_id', auth()->user()->id)->count();
        $totalCompletedOrders = Order::where(['user_id' => auth()->user()->id, 'order_status' => 'DELIVERED'])->count();
        $totalCanceledOrders = Order::where(['user_id' => auth()->user()->id, 'order_status' => 'CANCELED'])->count();

        return view('frontend.dashboard.index', compact(
            'deliveryAreas',
            'userAddresses',
            'orders',
            'reservations',
            'reviews',
            'wishlists',
            'totalOrders',
            'totalCompletedOrders',
            'totalCanceledOrders'
        ));
    }

    function createAddress(AddressCreateRequest $request)
    {
        $address = new Address();

        $address->user_id = auth()->user()->id;
        $address->delivery_area_id = $request->area_name;
        $address->first_name = $request->first_name;

        if ($request->last_name) {
            $address->last_name = $request->last_name;
        }

        $address->email = $request->email;
        $address->phone_number = $request->phone_number;
        $address->address = $request->address;
        $address->type = $request->type;

        $address->save();

        toastr()->success('Address added successfully!');

        return redirect()->back();
    }

    function updateAddress(AddressUpdateRequest $request, string $addressId)
    {
        $address = Address::findOrFail($addressId);

        $address->user_id = auth()->user()->id;
        $address->delivery_area_id = $request->area_name;

        $address->update($request->validated());

        toastr()->success('Address updated successfully.');

        return to_route('dashboard');
    }

    function removeAddress(string $addressId)
    {
        $address = Address::findOrFail($addressId);

        if ($address && $address->user_id === auth()->user()->id) {
            $address->delete();
            return response([
                'status' => 'success',
                'message' => 'Address Deleted Successfully!'
            ], 200);
        }

        return response([
            'status' => 'error',
            'message' => 'Something went Wrong!'
        ], 403);
    }
}
