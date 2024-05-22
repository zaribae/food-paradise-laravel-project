@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                                                                                                                                                                                                                                                                                        BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>menu Details</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">menu Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                        BREADCRUMB END
                                                                                                                                                                                                                                                                                                                                    ==============================-->


    <!--=============================
                                                                                                                                                                                                                                                                                                                                        MENU DETAILS START
                                                                                                                                                                                                                                                                                                                                    ==============================-->
    <section class="fp__menu_details mt_115 xs_mt_85 mb_95 xs_mb_65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-9 wow fadeInUp" data-wow-duration="1s">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box fp__menu_details_images">
                            <ul class='exzoom_img_ul'>
                                <li><img class="zoom ing-fluid w-100" src="{{ $product->thumbnail_image }}"
                                        alt="{{ $product->name }}">
                                </li>
                                @foreach ($product->productImages as $image)
                                    <li><img class="zoom ing-fluid w-100" src="{{ $image->product_images }}"
                                            alt="{{ $product->name }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                            </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_details_text">
                        <h2>{!! $product->name !!}</h2>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>
                        <h3 class="price">
                            @if ($product->offer_price > 0)
                                {{ currencyPosition($product->offer_price) }}
                                <del>{{ currencyPosition($product->price) }}</del>
                            @else
                                {{ currencyPosition($product->price) }}
                            @endif
                        </h3>
                        <p class="short_description">
                            {!! $product->short_description !!}
                        </p>

                        <form action="" method="POST" id="view_add_to_cart_form">
                            @csrf
                            <input type="hidden"
                                value="{{ $product->offer_price > 0 ? $product->offer_price : $product->price }}"
                                name="base_price" class="view_base_price">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if ($product->productSizes()->exists())
                                <div class="details_size">
                                    <h5>select size</h5>
                                    @foreach ($product->productSizes as $productSize)
                                        <div class="form-check">
                                            <input class="form-check-input view-product-size" type="radio"
                                                name="product_size" value="{{ $productSize->id }}"
                                                id="size-{{ $productSize->name }}" data-price="{{ $productSize->price }}">
                                            <label class="form-check-label" for="size-{{ $productSize->name }}">
                                                {{ $productSize->name }}<span>+
                                                    {{ currencyPosition($productSize->price) }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if ($product->productOptions()->exists())
                                <div class="details_extra_item">
                                    <h5>select option <span>(optional)</span></h5>
                                    @foreach ($product->productOptions as $productOption)
                                        <div class="form-check">
                                            <input class="form-check-input view-product-option" type="checkbox"
                                                name="product_option[]" value="{{ $productOption->id }}"
                                                data-price="{{ $productOption->price }}"
                                                id="option-{{ $productOption->name }}">
                                            <label class="form-check-label" for="option-{{ $productOption->name }}">
                                                {{ $productOption->name }} <span>+
                                                    {{ currencyPosition($productOption->price) }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="details_quentity">
                                <h5>select quentity</h5>
                                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                    <div class="quentity_btn">
                                        <button class="btn btn-danger view-decrement"><i class="fal fa-minus"></i></button>
                                        <input type="text" class="view-product-quantity" name="quantity" placeholder="1"
                                            value="1" readonly>
                                        <button class="btn btn-success view-increment"><i class="fal fa-plus"></i></button>
                                    </div>
                                    @if ($product->offer_price > 0)
                                        <h3 id="view_total_price">{{ currencyPosition($product->offer_price) }}</h3>
                                    @else
                                        <h3 id="view_total_price">{{ currencyPosition($product->price) }}</h3>
                                    @endif
                                </div>
                            </div>
                        </form>

                        <ul class="details_button_area d-flex flex-wrap">
                            @if ($product->quantity === 0)
                                <li><button type="button" href="javascript:;" class="common_btn bg-danger">Out of
                                        Stock!</button></li>
                            @else
                                <li><a class="common_btn cart_modal_btn" href="#">add to cart</a></li>
                                <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li>
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="menu_det_description">
                                    {!! $product->long_description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="fp__review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>04 reviews</h4>
                                            <div class="fp__comment pt-0 mt_20">
                                                <div class="fp__single_comment m-0 border-0">
                                                    <img src="images/comment_img_1.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Michel Holder <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/chef_1.jpg" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>salina khan <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/comment_img_2.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Mouna Sthesia <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/chef_3.jpg" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>marjan janifar <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <a href="#" class="load_more">load More</a>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fp__post_review">
                                                <h4>write a Review</h4>
                                                <form>
                                                    <p class="rating">
                                                        <span>select your rating : </span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <textarea rows="3" placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($relatedProduct) > 0)
                <div class="fp__related_menu mt_90 xs_mt_60">
                    <h2>related item</h2>
                    <div class="row related_product_slider">
                        @foreach ($relatedProduct as $product)
                            <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                                <div class="fp__menu_item">
                                    <div class="fp__menu_item_img">
                                        <img src="{{ asset($product->thumbnail_image) }}" alt="{{ $product->name }}"
                                            class="img-fluid w-100">
                                        <a class="category" href="#">{{ @$product->productCategory->name }}</a>
                                    </div>
                                    <div class="fp__menu_item_text">
                                        <p class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <span>74</span>
                                        </p>
                                        <a class="title"
                                            href="{{ route('product.show', $product->slug) }}">{!! $product->name !!}</a>
                                        <h5 class="price">
                                            @if ($product->offer_price > 0)
                                                {{ currencyPosition($product->offer_price) }}
                                                <del>{{ currencyPosition($product->price) }}</del>
                                            @else
                                                {{ currencyPosition($product->price) }}
                                            @endif
                                        </h5>
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><a href="javascript:;"
                                                    onclick="loadProductModal('{{ $product->id }}')"><i
                                                        class="fas fa-shopping-basket"></i></a></li>
                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a href="#"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Handler for user selected product sizes
            $('input.view-product-size').on('change', function() {
                view_updateTotalPrice();

            });

            // Handler for user selected product options
            $('input.view-product-option').on('change', function() {
                view_updateTotalPrice();
            });

            $('.view-increment').on('click', function(e) {
                e.preventDefault();
                let productQuantity = $('.view-product-quantity');
                let currentQuantity = parseFloat(productQuantity.val());
                productQuantity.val(currentQuantity + 1);
                view_updateTotalPrice();
            })

            // Handler for user to increase product quantity
            $('.view-decrement').on('click', function(e) {
                e.preventDefault();
                let productQuantity = $('.view-product-quantity');
                let currentQuantity = parseFloat(productQuantity.val());
                if (currentQuantity > 1) {
                    productQuantity.val(currentQuantity - 1);
                    view_updateTotalPrice();
                }
            })

        })

        // Update total price of a product
        function view_updateTotalPrice() {
            let basePrice = parseFloat($('input.view_base_price').val());
            let selectedSizePrice = 0;
            let selectedOptionPrice = 0;
            let productQuantity = parseFloat($('input.view-product-quantity').val());

            // Calculate selected size price
            let selectedSize = $('input.view-product-size:checked');
            if (selectedSize.length > 0) {
                selectedSizePrice = parseFloat(selectedSize.data("price"));
            }

            // Calculate all selected option price
            let selectedOptions = $('input.view-product-option:checked');
            $(selectedOptions).each(function() {
                selectedOptionPrice += parseFloat($(this).data('price'));
            });

            // Calculate total price
            let totalPrice = (basePrice + selectedOptionPrice + selectedSizePrice) * productQuantity;

            $('#view_total_price').text("{{ config('settings.site_currency_icon') }}" + totalPrice);
        }

        $('.cart_modal_btn').on('click', function(e) {
            e.preventDefault();
            $('#view_add_to_cart_form').submit();
        });

        // Add product to cart
        $('#view_add_to_cart_form').on('submit', function(e) {
            e.preventDefault();

            // Validation
            let selectedSize = $('input.view-product-size');

            if (selectedSize.length > 0) {
                if ($('input.view-product-size:checked').val() === undefined) {
                    toastr.error('Please select the product size');
                    console.error('Please select the product size');
                    return;
                }
            }

            let formData = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: "{{ route('product.add-to-cart') }}",
                data: formData,
                beforeSend: function() {
                    $('.cart_modal_btn').attr('disabled', true);
                    $('.cart_modal_btn').html(
                        "<span class='spinner-border spinner-border-sm text-light' role='status' aria-hidden='true'></span> Loading..."
                    )
                },
                success: function(response) {
                    refreshProductCart();
                    toastr.success(response.message);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errorMessage = jqXHR.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    $('.cart_modal_btn').html(
                        "add to cart"
                    );
                    $('.cart_modal_btn').attr('disabled', false);
                }
            });
        })
    </script>
@endpush
