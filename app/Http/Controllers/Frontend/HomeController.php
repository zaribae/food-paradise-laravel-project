<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppDownloadSection;
use App\Models\Benefit;
use App\Models\Chef;
use App\Models\Coupon;
use App\Models\DailyOffer;
use App\Models\MenuSlider;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SectionTitle;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection as SupportCollection;

class HomeController extends Controller
{
    function index(): View
    {
        $sectionTitles = $this->getSectionTitles();
        $sliders = Slider::where('status', 1)->get();
        $benefits = Benefit::where('status', 1)->get();
        $dailyOffers = DailyOffer::with('product')->where('status', 1)->take(6)->get();
        $menuSlider = MenuSlider::where('status', 1)->take(6)->get();
        $chef = Chef::where(['status' => 1, 'show_at_home' => 1])->get();
        $appDownloadSection = AppDownloadSection::first();

        $productCategories = ProductCategory::where(['show_at_home' => 1, 'status' => 1])->get();

        return view(
            'frontend.home.index',
            compact(
                'sliders',
                'sectionTitles',
                'benefits',
                'dailyOffers',
                'menuSlider',
                'chef',
                'appDownloadSection',
                'productCategories'
            )
        );
    }

    function getSectionTitles(): SupportCollection
    {
        $keys = [
            'benefit_top_title',
            'benefit_main_title',
            'benefit_sub_title',
            'daily_offer_top_title',
            'daily_offer_main_title',
            'daily_offer_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title'
        ];

        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }

    function chefs(): View
    {
        $chefs = Chef::where('status', 1)->paginate(4);
        return view('frontend.pages.chef-view', compact('chefs'));
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

    function applyCoupon(Request $request)
    {
        $totalPrice = $request->subtotal;
        $couponCode = $request->code;

        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            return response([
                'message' => 'Invalid coupon code!'
            ], 422);
        }

        if ($coupon->quantity === 0) {
            return response([
                'message' => 'Coupon has been fully redeemed!'
            ], 422);
        }

        if ($coupon->expired_date < now()) {
            return response([
                'message' => 'Coupon has expired!'
            ], 422);
        }

        if ($coupon->discount_type === 'percent') {
            $discount = number_format($totalPrice * ($coupon->discount / 100), 2);
        } else {
            $discount = $coupon->discount;
        }

        $finalPrice = $totalPrice - $discount;

        session()->put('coupon', [
            'code' => $couponCode,
            'discount' => $discount
        ]);

        return response([
            'message' => 'Coupon applied Successfully!',
            'discount_price' => $discount,
            'final_price' => $finalPrice,
            'coupon_code' => $couponCode
        ]);
    }

    function removeCoupon()
    {
        try {
            //code...
            session()->forget('coupon');

            return response([
                'message' => 'Coupon removed Successfully!',
                'cart_subtotal' => subTotalPrice(),
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => 'Something went Wrong'
            ]);
        }
    }
}
