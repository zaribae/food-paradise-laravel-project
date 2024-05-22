<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>

<form action="" method="POST" id="add_to_cart_form">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="fp__cart_popup_img">
        <img src="{{ asset($product->thumbnail_image) }}" alt="menu" class="img-fluid w-100">
    </div>
    <div class="fp__cart_popup_text">
        <a href="{{ route('product.show', $product->slug) }}" class="title">{{ $product->name }}</a>
        <p class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <span>(201)</span>
        </p>
        <h4 class="price">
            @if ($product->offer_price > 0)
                <input type="hidden" name="price" value="{{ $product->offer_price }}">

                {{ currencyPosition($product->offer_price) }}
                <del>{{ currencyPosition($product->price) }}</del>
            @else
                <input type="hidden" name="price" value="{{ $product->price }}">

                {{ currencyPosition($product->price) }}
            @endif
        </h4>

        @if ($product->productSizes()->exists())
            <div class="details_size">
                <h5>select size</h5>
                @foreach ($product->productSizes as $productSize)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="product_size"
                            value="{{ $productSize->id }}" id="size-{{ $productSize->name }}"
                            data-price="{{ $productSize->price }}">
                        <label class="form-check-label" for="size-{{ $productSize->name }}">
                            {{ $productSize->name }}<span>+ {{ currencyPosition($productSize->price) }}</span>
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
                        <input class="form-check-input" type="checkbox" name="product_option[]"
                            data-price="{{ $productOption->price }}" value="{{ $productOption->id }}"
                            id="option-{{ $productOption->name }}">
                        <label class="form-check-label" for="option-{{ $productOption->name }}">
                            {{ $productOption->name }} <span>+ {{ currencyPosition($productOption->price) }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="details_quentity">
            <h5>select quantity</h5>
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button class="btn btn-danger decrement"><i class="fal fa-minus"></i></button>
                    <input type="text" class="product-quantity" name="quantity" placeholder="1" value="1"
                        readonly>
                    <button class="btn btn-success increment"><i class="fal fa-plus"></i></button>
                </div>
                @if ($product->offer_price > 0)
                    <h3 id="total_price">{{ currencyPosition($product->offer_price) }}</h3>
                @else
                    <h3 id="total_price">{{ currencyPosition($product->price) }}</h3>
                @endif
            </div>
        </div>
        <ul class="details_button_area d-flex flex-wrap">
            {{-- <li><a class="common_btn" href="#">add to cart</a></li> --}}
            @if ($product->quantity === 0)
                <li><button type="button" class="common_btn bg-danger">Out of Stock!</button></li>
            @else
                <li><button type="submit" class="common_btn view_modal_btn">add to cart</button></li>
            @endif
        </ul>
    </div>
</form>

<script>
    $(document).ready(function() {
        // Handler for user selected product sizes
        $('input[name="product_size"]').on('change', function() {
            updateTotalPrice();
        });

        // Handler for user selected product options
        $('input[name="product_option[]"]').on('change', function() {
            updateTotalPrice();
        });

        // Handler for user to decrease product quantity
        $('.increment').on('click', function(e) {
            e.preventDefault();
            let productQuantity = $('.product-quantity');
            let currentQuantity = parseFloat(productQuantity.val());
            productQuantity.val(currentQuantity + 1);
            updateTotalPrice();
        })

        // Handler for user to increase product quantity
        $('.decrement').on('click', function(e) {
            e.preventDefault();
            let productQuantity = $('.product-quantity');
            let currentQuantity = parseFloat(productQuantity.val());
            if (currentQuantity > 1) {
                productQuantity.val(currentQuantity - 1);
                updateTotalPrice();
            }
        })

        // Function to calculate the total price of a product with selected option
        function updateTotalPrice() {
            let basePrice = parseFloat($('input[name="price"').val());
            let selectedSizePrice = 0;
            let selectedOptionPrice = 0;
            let productQuantity = parseFloat($('input.product-quantity').val());

            // Calculate selected size price
            let selectedSize = $('input[name="product_size"]:checked');
            if (selectedSize.length > 0) {
                selectedSizePrice = parseFloat(selectedSize.data("price"));
            }

            // Calculate all selected option price
            let selectedOptions = $('input[name="product_option[]"]:checked');
            $(selectedOptions).each(function() {
                selectedOptionPrice += parseFloat($(this).data('price'));
            });

            // Calculate total price
            let totalPrice = (basePrice + selectedOptionPrice + selectedSizePrice) * productQuantity;

            $('#total_price').text("{{ config('settings.site_currency_icon') }}" + totalPrice);
        }

        $('#add_to_cart_form').on('submit', function(e) {
            e.preventDefault();

            // Validation
            let selectedSize = $('input[name="product_size"]');

            if (selectedSize.length > 0) {
                if ($('input[name="product_size"]:checked').val() === undefined) {
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
                    $('.view_modal_btn').attr('disabled', true);
                    $('.view_modal_btn').html(
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
                    $('.view_modal_btn').html(
                        "add to cart"
                    );
                    $('.view_modal_btn').attr('disabled', false);
                }
            });
        })

    });
</script>
