<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\AppDownloadSection;
use App\Models\Benefit;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Coupon;
use App\Models\DailyOffer;
use App\Models\MenuSlider;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductRating;
use App\Models\Reservation;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\TermsCondition;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

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
        $testimonial = Testimonial::where(['status' => 1, 'show_at_home' => 1])->take(5)->get();
        $appDownloadSection = AppDownloadSection::first();
        $counter = Counter::first();
        $blogs = Blog::withCount(['comments' => function ($query) {
            $query->where('status', 1);
        }])->where(['status' => 1, 'show_at_home' => 1])->latest()->take(6)->get();

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
                'testimonial',
                'appDownloadSection',
                'counter',
                'blogs',
                'productCategories'
            )
        );
    }

    function about(): View
    {
        $keys = [
            'benefit_top_title',
            'benefit_main_title',
            'benefit_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];
        $sectionTitles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');;
        $benefits = Benefit::where('status', 1)->get();
        $chef = Chef::where(['status' => 1, 'show_at_home' => 1])->get();
        $counter = Counter::first();
        $testimonial = Testimonial::where(['status' => 1, 'show_at_home' => 1])->take(5)->get();
        $about = About::first();
        return view('frontend.pages.about', compact('about', 'sectionTitles', 'benefits', 'chef', 'counter', 'testimonial'));
    }

    function contact(): View
    {
        $contact = Contact::first();
        return view('frontend.pages.contact', compact('contact'));
    }

    function reservation(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:24'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'persons' => ['required', 'numeric'],
        ]);

        $reservation = new Reservation();

        $reservation->reservation_id = rand(0, 999999);
        $reservation->user_id = auth()->user()->id;
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->persons = $request->persons;
        $reservation->save();

        return response([
            'status' => 'success',
            'message' => 'Reservation successfully made.'
        ], 200);
    }

    function subscribeNewsletter(Request $request): Response
    {
        $validatedData = $request->validate(
            [
                'email' => ['required', 'email', 'max:255', 'unique:subscribers,email'],
            ],
            [
                'email.unique' => 'Email is already subscribed!'
            ]
        );

        Subscriber::create($validatedData);

        return response([
            'status' => 'success',
            'message' => 'Subscribed successfully!'
        ]);
    }

    function sendContactMessage(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:1000'],
        ]);

        Mail::send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

        return response([
            'status' => 'success',
            'message' => 'Email sent Successfully.'
        ]);
    }

    function privacyPolicy(): View
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('frontend.pages.privacy-policy', compact('privacyPolicy'));
    }

    function termsCondition(): View
    {
        $termsCondition = TermsCondition::first();
        return view('frontend.pages.terms-condition', compact('termsCondition'));
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
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];

        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }

    function chefs(): View
    {
        $chefs = Chef::where('status', 1)->paginate(8);
        return view('frontend.pages.chef-view', compact('chefs'));
    }

    function testimonials(): View
    {
        $testimonials = Testimonial::where('status', 1)->paginate(6);
        return view('frontend.pages.testimonials-page', compact('testimonials'));
    }

    function blog(Request $request): View
    {
        // $blogs = Blog::where('status', 1)->latest()->paginate(6);
        $blogs = Blog::withCount(['comments' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1);

        if ($request->has('search') && $request->filled('search')) {
            $blogs->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('blog_category') && $request->filled('blog_category')) {
            $blogs->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->blog_category);
            });
        }

        $blogs = $blogs->latest()->paginate(6);
        $blogCategory = BlogCategory::all();

        return view('frontend.pages.blog-view', compact('blogs', 'blogCategory'));
    }

    function blogDetails(string $slug): View
    {
        $blogs = Blog::where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $comments = $blogs->comments()->where(['status' => 1])->latest()->paginate(4);
        $latestBlog = Blog::select('id', 'slug', 'title', 'created_at', 'image')
            ->where('status', 1)
            ->where('id', '!=', $blogs->id)
            ->latest()
            ->take(3)
            ->get();
        $blogCategory = BlogCategory::withCount(['blogs' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();

        $nextBlog = Blog::select('id', 'slug', 'title', 'image')
            ->where('id', '>', $blogs->id)
            ->orderBy('id', 'ASC')
            ->first();
        $prevBlog = Blog::select('id', 'slug', 'title', 'image')
            ->where('id', '<', $blogs->id)
            ->orderBy('id', 'DESC')
            ->first();

        return view('frontend.pages.blog-details', compact('blogs', 'latestBlog', 'blogCategory', 'nextBlog', 'prevBlog', 'comments'));
    }

    function blogCommentStore(Request $request, string $blogId): RedirectResponse
    {
        $request->validate([
            'comment' => ['required', 'max:500']
        ]);

        Blog::findOrFail($blogId);

        $blogComment = new BlogComment();

        $blogComment->blog_id = $blogId;
        $blogComment->user_id = auth()->user()->id;
        $blogComment->comment = $request->comment;
        $blogComment->save();

        toastr()->success('Comment posted successfully!');

        return redirect()->back();
    }

    function showProduct(string $slug): View
    {
        $product = Product::with(['productImages', 'productSizes', 'productOptions'])->where(['slug' => $slug, 'status' => 1])
            ->withAvg('productRatings', 'rating')
            ->withCount('productRatings')
            ->firstOrFail();
        $relatedProduct = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->take(6)
            ->withAvg('productRatings', 'rating')
            ->withCount('productRatings')
            ->latest()
            ->get();
        $reviews = ProductRating::where(['product_id' => $product->id, 'status' => 1])->latest()->paginate(4);

        return view('frontend.pages.product-view', compact('product', 'relatedProduct', 'reviews'));
    }

    function productReviewStore(Request $request): RedirectResponse
    {
        $request->validate([
            'rating' => ['required', 'min:1', 'max:5'],
            'review' => ['required', 'max:500'],
            'product_id' => ['required', 'integer']
        ]);

        $user = Auth::user();

        $hasPurchased = $user->orders()->whereHas('orderItems', function ($query) use ($request) {
            $query->where('product_id', $request->product_id);
        })->where('order_status', 'DELIVERED')->get();

        $alreadyReviewed = ProductRating::where(['user_id' => $user->id, 'product_id' => $request->product_id])->exists();

        if (count($hasPurchased) == 0) {
            throw ValidationException::withMessages(['Please buy the product before submitting a Review!']);
        }

        if ($alreadyReviewed) {
            throw ValidationException::withMessages(['You already reviewed this product!']);
        }

        $review = new ProductRating();

        $review->user_id = $user->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        toastr()->success('Review Added Successfully!');

        return redirect()->back();
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
