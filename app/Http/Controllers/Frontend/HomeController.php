<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SectionTitle;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;

class HomeController extends Controller
{
    function index(): View
    {
        $sectionTitles = $this->getSectionTitles();
        $sliders = Slider::where('status', 1)->get();
        $benefits = Benefit::where('status', 1)->get();

        $productCategories = ProductCategory::where(['show_at_home' => 1, 'status' => 1])->get();

        return view(
            'frontend.home.index',
            compact(
                'sliders',
                'sectionTitles',
                'benefits',
                'productCategories'
            )
        );
    }

    function getSectionTitles(): SupportCollection
    {
        $keys = ['benefit_top_title', 'benefit_main_title', 'benefit_sub_title'];

        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }

    function showProduct(string $slug): View
    {
        $product = Product::with(['productImages', 'productSizes', 'productOptions'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $relatedProduct = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->take(6)
            ->latest()
            ->get();
        return view('frontend.pages.product-view', compact('product', 'relatedProduct'));
    }

    function loadProductModal($productId)
    {
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($productId);

        // dd($product);
        return view('frontend.layouts.ajax-request-files.product-modal-popup', compact('product'))->render();
    }
}
