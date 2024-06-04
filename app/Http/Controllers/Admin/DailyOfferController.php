<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DailyOfferDataTable;
use App\Http\Controllers\Controller;
use App\Models\DailyOffer;
use App\Models\Product;
use App\Models\SectionTitle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DailyOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DailyOfferDataTable $dataTable): View|JsonResponse
    {
        $keys = ['daily_offer_top_title', 'daily_offer_main_title', 'daily_offer_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');

        return $dataTable->render('admin.daily-offer.index', compact('titles'));
    }

    public function searchProduct(Request $request): Response
    {
        $product = Product::select('id', 'name', 'thumbnail_image')->where('name', 'LIKE', '%' . $request->search . '%')->get();

        return response($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.daily-offer.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ]);

        DailyOffer::create($validatedData);

        toastr()->success('Daily offer Created Successfully!');

        return to_route('admin.daily-offer.index');
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
        $dailyOffer = DailyOffer::with('product')->findOrFail($id);

        return view('admin.daily-offer.components.edit', compact('dailyOffer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $deliveryAddress = DailyOffer::findOrFail($id);

        $validatedData = $request->validate([
            'product_id' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ]);

        $deliveryAddress->update($validatedData);

        toastr()->success('Daily offer updated successfully.');

        return to_route('admin.daily-offer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $dailyOffer = DailyOffer::findOrFail($id);
            $dailyOffer->delete();

            return response([
                'status' => 'success',
                'message' => 'Daily offer Deleted Successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ], 500);
        }
    }

    function updateTitle(Request $request)
    {
        $validatedData = $request->validate([
            'daily_offer_top_title' => ['nullable', 'max:100'],
            'daily_offer_main_title' => ['nullable', 'max:200'],
            'daily_offer_sub_title' => ['nullable', 'max:500']
        ]);

        foreach ($validatedData as $key => $value) {
            SectionTitle::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }


        toastr()->success('Section Titles Updated Successfully!');

        return redirect()->back();
    }
}
