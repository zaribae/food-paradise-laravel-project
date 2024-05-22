<script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    //Set csrf-token at Ajax Header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
        }
    });

    // Show loading indicator
    function showLoader(params) {
        $('.overlay-container').removeClass('d-none');
        $('.overlay').addClass('active');
    }

    // Hide loading indicator
    function hideLoader(params) {
        $('.overlay').removeClass('active');
        $('.overlay-container').addClass('d-none');
    }

    // Load product Modal
    function loadProductModal($productId) {
        $.ajax({
            method: 'GET',
            url: "{{ route('product.load-modal', ':productId') }}".replace(':productId', $productId),
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                $('.load_product_modal_content').html(response)
                $('#cartModal').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            },
            complete: function() {
                hideLoader();
            }
        })
    }

    // Refresh cart after adding
    function refreshProductCart(callback = null) {
        $.ajax({
            method: 'GET',
            url: '{{ route('product.refresh-cart') }}',
            success: function(response) {
                $('.cart-product').html(response);
                let cartTotal = $('#cartTotal').val();
                let cartCount = $('#cartCount').val();
                $('.cartSubTotal').text("{{ currencyPosition(':cartTotal') }}".replace(':cartTotal',
                    cartTotal));
                $('.cart-count').text(cartCount);
                $('.cart-count-total').text("Total Item (:cartCount)".replace(':cartCount', cartCount));

                if (callback && typeof callback === 'function') {
                    callback();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        })
    }

    // Remove product from Cart
    function removeProductFromCart($rowId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('product.remove-cart', ':rowId') }}'.replace(":rowId", $rowId),
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                if (response.status === 'success') {
                    refreshProductCart(function() {
                        toastr.success(response.message);
                        hideLoader();
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                let errorMessage = jqXHR.responseJSON.message;
                toastr.error(errorMessage);
            }
        })
    }
</script>
