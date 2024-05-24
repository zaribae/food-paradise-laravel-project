<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryAreaCreateRequest;
use App\Models\DeliveryArea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeliveryAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeliveryAreaDataTable $dataTable)
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
    public function store(DeliveryAreaCreateRequest $request): RedirectResponse
    {
        $deliveryAddress = new DeliveryArea();

        $deliveryAddress->area_name = $request->area_name;
        $deliveryAddress->min_delivery_time = $request->min_delivery_time;
        $deliveryAddress->max_delivery_time = $request->max_delivery_time;
        $deliveryAddress->delivery_cost = $request->delivery_cost;
        $deliveryAddress->status = $request->status;

        $deliveryAddress->save();

        toastr()->success('Delivery Address created Successfully!');

        return to_route('admin.delivery-area.index');
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
        $deliveryAddress = DeliveryArea::findOrFail($id);

        return view('admin.delivery.components.edit', compact('deliveryAddress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryAreaCreateRequest $request, string $id)
    {
        $deliveryAddress = DeliveryArea::findOrFail($id);

        $deliveryAddress->update($request->validated());

        toastr()->success('Delivery Address updated successfully.');

        return to_route('admin.delivery-area.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deliveryAddress = DeliveryArea::findOrFail($id);
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
