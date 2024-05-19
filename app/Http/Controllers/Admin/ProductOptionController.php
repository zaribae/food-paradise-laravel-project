<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'max:50'],
                'price' => ['required', 'numeric'],
                'product_id' => ['required'],
            ],
            [
                'name.required' => 'Product options name is Required!',
                'price.required' => 'Product options price is Required!',
            ]
        );

        $productOptions = new ProductOption();

        $productOptions->product_id = $request->product_id;
        $productOptions->name = $request->name;
        $productOptions->price = $request->price;
        $productOptions->save();

        toastr()->success('Product Images added Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $productOptions = ProductOption::findOrFail($id);
            $productOptions->delete();

            return response([
                'status' => 'success',
                'message' => 'Product Images Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
