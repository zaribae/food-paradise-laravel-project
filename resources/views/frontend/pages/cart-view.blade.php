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
                        <p>subtotal: <span>$124.00</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span>$10.00</span></p>
                        <p class="total"><span>total:</span> <span>$134.00</span></p>
                        <form>
                            <input type="text" placeholder="Coupon Code">
                            <button type="submit">apply</button>
                        </form>
                        <a class="common_btn" href=" #">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
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
                if (inputField.val() > 1) {
                    inputField.val(currentValue - 1);
                } else {
                    cartQtyUpdate(rowId, inputField.val(), function(response) {
                        if (response.status === 'success') {
                            inputField.val(response.qty);
                            let productTotalPrice = response.product_total_price;
                            inputField.closest('tr').find('.product_total_price').text(
                                "{{ currencyPosition(':productTotalPrice') }}".replace(
                                    ':productTotalPrice', productTotalPrice));
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
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errorMessage = jqXHR.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {}
            })
        }
    </script>
@endpush
