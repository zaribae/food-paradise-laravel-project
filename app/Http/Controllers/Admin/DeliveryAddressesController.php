<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeliveryAddressDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryAddressCreateRequest;
use App\Models\DeliveryAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeliveryAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeliveryAddressDataTable $dataTable)
    {
        return $dataTable->render('admin.delivery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.delivery.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryAddressCreateRequest $request): RedirectResponse
    {
        $deliveryAddress = new DeliveryAddress();

        $deliveryAddress->address = $request->address;
        $deliveryAddress->min_delivery_time = $request->min_delivery_time;
        $deliveryAddress->max_delivery_time = $request->max_delivery_time;
        $deliveryAddress->delivery_cost = $request->delivery_cost;
        $deliveryAddress->status = $request->status;

        $deliveryAddress->save();

        toastr()->success('Delivery Address created Successfully!');

        return to_route('admin.delivery-address.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deliveryAddress = DeliveryAddress::findOrFail($id);

        return view('admin.delivery.components.edit', compact('deliveryAddress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryAddressCreateRequest $request, string $id)
    {
        $deliveryAddress = DeliveryAddress::findOrFail($id);

        $deliveryAddress->update($request->validated());

        toastr()->success('Delivery Address updated successfully.');

        return to_route('admin.delivery-address.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deliveryAddress = DeliveryAddress::findOrFail($id);
            $deliveryAddress->delete();

            return response([
                'status' => 'success',
                'message' => 'Delivery Address Deleted Successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ], 500);
        }
    }
}
