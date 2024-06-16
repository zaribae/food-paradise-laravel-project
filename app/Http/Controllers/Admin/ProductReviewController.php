<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductRatingDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductRating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductReviewController extends Controller
{
    function index(ProductRatingDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.product.review.index');
    }

    function update(Request $request): Response
    {
        $review = ProductRating::findOrFail($request->id);

        $review->status = $request->status;
        $review->save();

        return response([
            'status' => 'success',
            'message' => 'Review updated successfully'
        ], 200);
    }

    public function destroy(string $id)
    {
        try {
            $review = ProductRating::findOrFail($id);
            $review->delete();

            return response([
                'status' => 'success',
                'message' => 'Review Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
