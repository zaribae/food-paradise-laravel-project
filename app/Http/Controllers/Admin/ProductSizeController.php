<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId): View
    {
        $product = Product::findOrFail($productId);
        $productSizes = ProductSize::where('product_id', $productId)->get();
        $productOptions = ProductOption::where('product_id', $productId)->get();

        return view('admin.product.product-size.index', compact('product', 'productSizes', 'productOptions'));
    }

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
                'name.required' => 'Product size name is Required!',
                'price.required' => 'Product size price is Required!',
            ]
        );

        $productSize = new ProductSize();

        $productSize->product_id = $request->product_id;
        $productSize->name = $request->name;
        $productSize->price = $request->price;
        $productSize->save();

        toastr()->success('Product Images added Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $productSizes = ProductSize::findOrFail($id);
            $productSizes->delete();

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
