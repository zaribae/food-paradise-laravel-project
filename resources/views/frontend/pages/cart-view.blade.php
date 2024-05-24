@extends('frontend.layouts.master')

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>cart view</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">cart view</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="fp__pro_img">
                                            Image
                                        </th>

                                        <th class="fp__pro_name">
                                            details
                                        </th>

                                        <th class="fp__pro_status">
                                            price
                                        </th>

                                        <th class="fp__pro_select">
                                            quantity
                                        </th>

                                        <th class="fp__pro_tk">
                                            total
                                        </th>

                                        <th class="fp__pro_icon">
                                            <a class="clear_all" href="{{ route('cart.product-clear') }}">clear all</a>
                                        </th>
                                    </tr>

                                    @foreach (Cart::content() as $product)
                                        <tr>
                                            <td class="fp__pro_img"><img
                                                    src="{{ asset($product->options->product_info['image']) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </td>

                                            <td class="fp__pro_name">
                                                <a
                                                    href="{{ route('product.show', $product->options->product_info['slug']) }}">{{ $product->name }}</a>
                                                @if (count($product->options->product_sizes) > 0)
                                                    <span>{{ @$product->options->product_sizes['name'] }}
                                                        ({{ currencyPosition($product->options->product_sizes['price']) }})
                                                    </span>
                                                @endif
                                                @if (count($product->options->product_options) > 0)
                                                    @foreach ($product->options->product_options as $options)
                                                        <p>{{ $options['name'] }}
                                                            ({{ currencyPosition($options['price']) }})
                                                        </p>
                                                    @endforeach
                                                @endif
                                            </td>

                                            <td class="fp__pro_status">
                                                <h6>{{ currencyPosition($product->price) }}</h6>
                                            </td>

                                            <td class="fp__pro_select">
                                                <div class="quentity_btn">
                                                    <button class="btn btn-danger decrement"><i
                                                            class="fal fa-minus"></i></button>
                                                    <input type="text" class="quantity" data-id="{{ $product->rowId }}"
                                                        placeholder="1" value="{{ $product->qty }}" readonly>
                                                    <button class="btn btn-success increment"><i
                                                            class="fal fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="fp__pro_tk">
                                                <h6 class="product_total_price">
                                                    {{ currencyPosition(cartProductTotalPrice($product->rowId)) }}</h6>
                                            </td>

                                            <td class="fp__pro_icon">
                                                <a href="#" class="cart-product-remove"
                                                    data-id="{{ $product->rowId }}"><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count(Cart::content()) === 0)
                                        <tr>
                                            <td class="text-center" style="width: 100%; display: inline;">
                                                Your cart is Empty..</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="subtotal-price">{{ currencyPosition(cartTotalPrice()) }}</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span id="discount-price">
                                @if (isset(session()->get('coupon')['discount']))
                                    {{ config('settings.site_currency_icon') }}{{ session()->get('coupon')['discount'] }}
                                @else
                                    {{ config('settings.site_currency_icon') }}0
                                @endif
                            </span>
                        </p>
                        <p class="total"><span>total:</span> <span id="final-price">
                                @if (isset(session()->get('coupon')['discount']))
                                    {{ config('settings.site_currency_icon') }}{{ cartTotalPrice() - session()->get('coupon')['discount'] }}
                                @else
                                    {{ config('settings.site_currency_icon') }}{{ cartTotalPrice() }}
                                @endif
                            </span>
                        </p>
                        <form id="coupon-form">
                            <input type="text" id="coupon-code" name="code" placeholder="Coupon Code">
                            <button type="submit">apply</button>
                        </form>

                        <div class="coupon-card">
                            @if (session()->has('coupon'))
                                <div class="card mt-4">
                                    <div class="m-2">
                                        <span><b class="v-coupon-code">Applied Coupon:
                                                {{ session()->get('coupon')['code'] }}</b></span>
                                        <span>
                                            <button id="remove-coupon"><i class="far fa-times"></i></button>
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <a class="common_btn" href="{{ route('checkout.index') }}">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var cartTotal = parseInt("{{ cartTotalPrice() }}");
        $(document).ready(function() {

            $('.increment').on('click', function() {
                let inputField = $(this).siblings('.quantity');
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data('id');
                inputField.val(currentValue + 1);

                cartQtyUpdate(rowId, inputField.val(), function(response) {
                    if (response.status === 'success') {
                        inputField.val(response.qty);
                        let productTotalPrice = response.product_total_price;
                        inputField.closest('tr').find('.product_total_price').text(
                            "{{ currencyPosition(':productTotalPrice') }}".replace(
                                ':productTotalPrice', productTotalPrice));

                        cartTotal = response.cart_total;
                        $('#subtotal-price').text("{{ config('settings.site_currency_icon') }}" +
                            cartTotal);

                        $('#final-price').text("{{ config('settings.site_currency_icon') }}" +
                            response.cart_subtotal);
                    } else if (response.status === 'error') {
                        inputField.val(response.qty);
                        toastr.error(response.message);
                    }
                });
            });
        })
        $(document).ready(function() {
            $('.decrement').on('click', function() {
                let inputField = $(this).siblings('.quantity');
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data('id');
                if (currentValue > 1) {
                    inputField.val(currentValue - 1);
                    cartQtyUpdate(rowId, inputField.val(), function(response) {
                        if (response.status === 'success') {
                            inputField.val(response.qty);
                            let productTotalPrice = response.product_total_price;
                            inputField.closest('tr').find('.product_total_price').text(
                                "{{ currencyPosition(':productTotalPrice') }}".replace(
                                    ':productTotalPrice', productTotalPrice));

                            cartTotal = response.cart_total;
                            $('#subtotal-price').text(
                                "{{ config('settings.site_currency_icon') }}" +
                                cartTotal);

                            $('#final-price').text("{{ config('settings.site_currency_icon') }}" +
                                response.cart_subtotal);
                        } else if (response.status === 'error') {
                            inputField.val(response.qty);
                            toastr.error(response.message);
                        }

                    });
                }

            });
        })

        $('.cart-product-remove').on('click', function(e) {
            e.preventDefault();
            let rowId = $(this).data('id');
            removeCartProduct(rowId);

            $(this).closest('tr').remove();
        })

        function cartQtyUpdate(rowId, quantity, callback) {
            $.ajax({
                method: 'POST',
                url: "{{ route('cart.quantity-update') }}",
                data: {
                    'rowId': rowId,
                    'qty': quantity
                },
                beforeSend: function() {},
                success: function(response) {
                    if (callback && typeof callback == 'function') {
                        callback(response);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errorMessage = jqXHR.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {}
            })
        }

        function removeCartProduct(rowId) {
            $.ajax({
                method: 'GET',
                url: "{{ route('product.remove-cart', ':rowId') }}".replace(':rowId', rowId),
                beforeSend: function() {},
                success: function(response) {
                    refreshProductCart();
                    cartTotal = response.cart_total;
                    $('#subtotal-price').text("{{ config('settings.site_currency_icon') }}" + cartTotal);
                    $('#final-price').text("{{ config('settings.site_currency_icon') }}" + response
                        .cart_subtotal);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errorMessage = jqXHR.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {}
            })
        }

        $('#coupon-form').on('submit', function(e) {
            e.preventDefault();
            let couponCode = $('#coupon-code').val();
            let subtotal = cartTotal;

            applyCoupon(couponCode, subtotal);
        });

        function applyCoupon(coupon, subtotal) {
            $.ajax({
                method: 'POST',
                url: "{{ route('coupon.apply') }}",
                data: {
                    code: coupon,
                    subtotal: subtotal
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    $('#coupon-code').val("");
                    $('#discount-price').text("{{ config('settings.site_currency_icon') }}" + response
                        .discount_price);

                    $('#final-price').text("{{ config('settings.site_currency_icon') }}" + response
                        .final_price);

                    $couponCardHtml = `<div class="card mt-4">
                                    <div class="m-2">
                                        <span><b class="v-coupon-code">Applied Coupon: ${response.coupon_code}</b></span>
                                        <span>
                                            <button id="remove-coupon"><i class="far fa-times"></i></button>
                                        </span>
                                    </div>
                                </div>`;
                    $('.coupon-card').html($couponCardHtml);

                    toastr.success(response.message);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errorMessage = jqXHR.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    hideLoader();
                }
            })
        }

        $(document).on('click', '#remove-coupon', function() {
            removeCoupon();
        });

        function removeCoupon() {
            $.ajax({
                method: 'GET',
                url: "{{ route('coupon.remove') }}",
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    $('#coupon-code').val("");
                    $('#discount-price').text("{{ config('settings.site_currency_icon') }}" + 0);
                    $('#final-price').text("{{ config('settings.site_currency_icon') }}" + response
                        .cart_subtotal);
                    $('.coupon-card').html("");

                    toastr.success(response.message);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errorMessage = jqXHR.responseJSON.message;
                    hideLoader();
                    toastr.error(errorMessage);
                },
                complete: function() {
                    hideLoader();
                }
            })
        }
    </script>
@endpush
