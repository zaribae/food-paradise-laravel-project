<script>
    // Sweet alert notification if user want to remove something
    $('body').on('click', '.delete-item', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            window.location.reload();
                        } else if (response.status === 'error') {
                            toastr.error(response.message);
                        }
                    },
                });
            }
        });
    })

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
    function loadProductModal(productId) {
        $.ajax({
            method: 'GET',
            url: "{{ route('product.load-modal', ':productId') }}".replace(':productId', productId),
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

    // Add product to Wishlist
    function addToWishlist(productId) {
        $.ajax({
            method: 'GET',
            url: "{{ route('wishlist.store', ':productId') }}".replace(':productId', productId),
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                let errorMsg = jqXHR.responseJSON.errors;

                $.each(errorMsg, function(index, value) {
                    toastr.error(value);
                })
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

    /**
     * Get user cart total price
     */
    function getCartTotalPrice() {
        return parseInt('{{ cartTotalPrice() }}');
    }
</script>
