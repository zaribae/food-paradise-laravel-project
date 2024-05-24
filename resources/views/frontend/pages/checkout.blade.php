@extends('frontend.layouts.master')

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>checkout</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__checkout_form">
                        <div class="fp__check_form">
                            <h5>select address <a href="#" data-bs-toggle="modal" data-bs-target="#address_modal"><i
                                        class="far fa-plus"></i> add address</a></h5>

                            <div class="fp__address_modal">
                                <div class="modal fade" id="address_modal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="address_modalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="address_modalLabel">add new address
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="fp_dashboard_new_address d-block">
                                                    <form action="{{ route('profile.address.create') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="fp__check_single_form">
                                                                    <select class="nice-select" name="area_name">
                                                                        <option value="">select available area
                                                                        </option>
                                                                        @foreach ($deliveryAreas as $area)
                                                                            <option value="{{ $area->id }}">
                                                                                {{ $area->area_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" name="first_name"
                                                                        placeholder="First Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" name="last_name"
                                                                        placeholder="Last Name (Optional)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" name="phone_number"
                                                                        placeholder="Phone Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="email" name="email"
                                                                        placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <textarea cols="3" name="address" rows="4" placeholder="Address"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="fp__check_single_form check_area">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" value="home"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            home
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" value="office"
                                                                            id="flexRadioDefault2">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            office
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="common_btn">add
                                                                    address</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($addresses as $address)
                                    <div class="col-md-6">
                                        <div class="fp__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input view_address_checkout"
                                                    value="{{ $address->id }}" type="radio" name="flexRadioDefault"
                                                    id="home">
                                                <label class="form-check-label" for="home">
                                                    <span class="icon">
                                                        @if ($address->type === 'home')
                                                            <i class="fas fa-home"></i>
                                                            {{ $address->type }}
                                                        @else
                                                            <i class="fas fa-car-building"></i>
                                                            {{ $address->type }}
                                                        @endif
                                                    </span>
                                                    <span class="address">
                                                        {{ $address->address }},
                                                        {{ $address->deliveryArea?->area_name }}
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div id="sticky_sidebar" class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span>{{ currencyPosition(cartTotalPrice()) }}</span></p>
                        <p>delivery: <span id="delivery-cost">$00.00</span></p>
                        <p>discount: <span>
                                @if (session()->has('coupon'))
                                    {{ config('settings.site_currency_icon') }}{{ session()->get('coupon')['discount'] }}
                                @else
                                    {{ config('settings.site_currency_icon') }}0
                                @endif
                            </span></p>
                        <p class="total"><span>total:</span> <span id="cart-subtotal">
                                @if (session()->has('coupon'))
                                    {{ currencyPosition(cartTotalPrice() - session()->get('coupon')['discount']) }}
                                @else
                                    {{ config('settings.site_currency_icon') }}0
                                @endif
                            </span></p>

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
            $('.view_address_checkout').on('click', function() {
                let addressId = $(this).val();
                let deliveryCost = $('#delivery-cost');
                let cartSubtotal = $('#cart-subtotal');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('checkout.delivery-total', ':addressId') }}".replace(
                        ':addressId', addressId),
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        deliveryCost.text("{{ currencyPosition(':deliveryCost') }}".replace(
                            ':deliveryCost', response.delivery_cost))
                        cartSubtotal.text("{{ currencyPosition(':cartSubTotal') }}".replace(
                            ':cartSubTotal', response.cart_subtotal))
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        let errorMessage = jqXHR.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                });
            })
        })
    </script>
@endpush
