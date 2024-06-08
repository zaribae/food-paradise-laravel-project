<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryCreateRequest;
use App\Http\Requests\Admin\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductCategoryDataTable $datatables)
    {
        return $datatables->render('admin.product.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.product.category.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryCreateRequest $request): RedirectResponse
    {
        $productCategory = new ProductCategory();

        $productCategory->name = $request->name;
        $productCategory->slug = Str::slug($request->name);
        $productCategory->status = $request->status;
        $productCategory->show_at_home = $request->show_at_home;

        $productCategory->save();

        toastr()->success('Product Category Added Successfully!');

        return to_route('admin.product-category.index');
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
        $productCategory = ProductCategory::findOrFail($id);
        return view('admin.product.category.components.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryUpdateRequest $request, string $id)
    {
        $productCategory = ProductCategory::findOrFail($id);

        $productCategory->name = $request->name;
        $productCategory->slug = Str::slug($request->name);
        $productCategory->status = $request->status;
        $productCategory->show_at_home = $request->show_at_home;
        $productCategory->save();

        toastr()->success('Product Category content Updated Successfully!');

        return to_route('admin.product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $productCategory = ProductCategory::findOrFail($id);
            $productCategory->delete();

            return response([
                'status' => 'success',
                'message' => 'Slider Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
