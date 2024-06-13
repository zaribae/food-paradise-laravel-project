<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('frontend/images/logo.png') }}" alt="FoodPark" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        @php
            $navMenu = Menu::getByName('main_menu');
        @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                @if ($navMenu)
                    @foreach ($navMenu as $menuItem)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}
                                @if ($menuItem['child'])
                                    <i class="far fa-angle-down"></i>
                                @endif
                            </a>
                            @if ($menuItem['child'])
                                <ul class="droap_menu">
                                    @foreach ($menuItem['child'] as $childItem)
                                        <li><a href="{{ $childItem['link'] }}">{{ $childItem['label'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
            <ul class="menu_icon d-flex flex-wrap">
                <li>
                    <a href="#" class="menu_search"><i class="far fa-search"></i></a>
                    <div class="fp__search_form">
                        <form>
                            <span class="close_search"><i class="far fa-times"></i></span>
                            <input type="text" placeholder="Search . . .">
                            <button type="submit">search</button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon"><i class="fas fa-shopping-basket"></i> <span
                            class="cart-count">{{ count(Cart::content()) }}</span></a>
                </li>
                @php
                    @$unseenMessage = \App\Models\Livechat::where([
                        'sender_id' => 1,
                        'receiver_id' => auth()->user()->id,
                        'seen' => 0,
                    ])->count();
                @endphp
                <li>
                    <a class="cart_icon message_icon"><i class="fas fa-comment-alt-dots"></i>
                        <span class="unseen-message-count">
                            {{ @$unseenMessage > 0 ? 1 : 0 }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                </li>
                <li>
                    <a class="common_btn" href="#" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">reservation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="fp__menu_cart_area">
    <div class="fp__menu_cart_boody">
        <div class="fp__menu_cart_header">
            <h5 class="cart-count-total">Total Item ({{ count(Cart::content()) }})</h5>
            <span class="close_cart"><i class="fal fa-times"></i></span>
        </div>
        <ul class="cart-product">
            @foreach (Cart::content() as $cartProduct)
                <li>
                    <div class="menu_cart_img">
                        <img src="{{ asset($cartProduct->options->product_info['image']) }}"
                            alt="{{ $cartProduct->name }}" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title"
                            href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{{ $cartProduct->name }}</a>

                        <p class="size">{{ @$cartProduct->options->product_sizes['name'] }}
                            {{ @$cartProduct->options->product_sizes['price'] ? '(' . currencyPosition(@$cartProduct->options->product_sizes['price']) . ')' : '' }}
                        </p>
                        @foreach ($cartProduct->options->product_options as $productOption)
                            <span class="extra">{{ @$productOption['name'] }}
                                {{ @$productOption['price'] ? '(' . currencyPosition(@$productOption['price']) . ')' : '' }}
                            </span>
                        @endforeach
                        <p class="price">Quantity : {{ $cartProduct->qty }}</p>
                        <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
                    </div>
                    <span class="del_icon" onclick="removeProductFromCart('{{ $cartProduct->rowId }}')"><i
                            class="fal fa-times"></i></span>
                </li>
            @endforeach
            {{-- <li>
                <div class="menu_cart_img">
                    <img src="images/menu8.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Hyderabadi Biryani </a>
                    <p class="size">small</p>
                    <span class="extra">coca-cola</span>
                    <span class="extra">7up</span>
                    <p class="price">$99.00 <del>$110.00</del></p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li> --}}
        </ul>
        <p class="subtotal">sub total <span class="cartSubTotal">{{ currencyPosition(cartTotalPrice()) }}</span></p>
        <a class="cart_view" href="{{ route('cart.index') }}"> view cart</a>
        <a class="checkout" href="{{ route('checkout.index') }}">checkout</a>
    </div>
</div>

@php
    $reservationTime = \App\Models\ReservationTime::where('status', 1)->get();
@endphp

<div class="fp__reservation">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Book a Table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="fp__reservation_form" action="" method="post">
                        @csrf
                        <input class="reservation_input" type="text" placeholder="Name" name="name">
                        <input class="reservation_input" type="text" placeholder="Phone" name="phone">
                        <input class="reservation_input" type="date" name="date">
                        <select class="reservation_input nice-select" name="time">
                            <option value="">select time</option>
                            @foreach (@$reservationTime as $time)
                                <option value="{{ @$time->start_time }}-{{ @$time->end_time }}">
                                    {{ @$time->start_time }} to
                                    {{ @$time->end_time }}</option>
                            @endforeach
                        </select>
                        <input class="reservation_input" type="text" placeholder="Person" name="persons">
                        <button type="submit" class="reservation-submit">book table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.fp__reservation_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('reservation.store') }}",
                    data: formData,
                    beforeSend: function() {
                        $('.reservation-submit').html(
                            "<span class='spinner-border spinner-border-sm text-light' role='status' aria-hidden='true'></span> Loading..."
                        );
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('.fp__reservation_form').trigger("reset");
                        $('#staticBackdrop').modal('hide');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        let errorMessage = jqXHR.responseJSON.errors;
                        $.each(errorMessage, function(index, value) {
                            toastr.error(value);
                        })
                    },
                    complete: function() {
                        $('.reservation-submit').html("book table");
                        $('.reservation-submit').attr('disabled', false);
                    }
                })
            })
        })
    </script>
@endpush
