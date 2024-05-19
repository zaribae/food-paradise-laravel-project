<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(string $productId): View
    {
        $product = Product::findOrFail($productId);
        $productImages = ProductGallery::where('product_id', $productId)->get();
        return view('admin.product.gallery.index', compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_images' => ['required', 'image', 'max:2048'],
            'product_id' => ['required']
        ]);

        $imagePath = $this->uploadImage($request, 'product_images');

        $productGallery = new ProductGallery();

        $productGallery->product_id = $request->product_id;
        $productGallery->product_images = $imagePath;
        $productGallery->save();

        toastr()->success('Product Images added Successfully!');

        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $productImages = ProductGallery::findOrFail($id);
            $this->removeImage($productImages->product_images);
            $productImages->delete();

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
