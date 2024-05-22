<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productCategory = ProductCategory::all();
        return view('admin.product.components.create', compact('productCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request): RedirectResponse
    {
        // Handle Image Upload
        $imagePath = $this->uploadImage($request, 'thumbnail_image');

        $product = new Product();

        $product->thumbnail_image = $imagePath;
        $product->name = $request->name;
        $product->slug = generateUniqueSlug('Product', $request->name);
        $product->product_category_id = $request->product_category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->quantity = $request->quantity;
        $product->sku = $request->sku;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->status = $request->status;
        $product->show_at_home = $request->show_at_home;

        $product->save();

        toastr()->success('Product Created Successfully!');

        return to_route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $productCategory = ProductCategory::all();
        return view('admin.product.components.edit', compact('product', 'productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'thumbnail_image', $product->thumbnail_image);

        if ($request->thumbnail_image) {
            $product->thumbnail_image = $imagePath;
        }

        if ($product->name != $request->name) {
            $product->slug = generateUniqueSlug('Product', $request->name);
        }

        if ($product->quantity) {
            $product->quantity = $request->quantity;
        }

        $product->update($request->validated());

        toastr()->success('Product content updated Successfully!');

        return to_route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $product = Product::findOrFail($id);
            $this->removeImage($product->thumbnail_image);
            $product->delete();

            return response([
                'status' => 'success',
                'message' => 'Product Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
