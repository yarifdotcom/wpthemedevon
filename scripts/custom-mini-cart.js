jQuery(document).ready(function($) {
    // Update quantity via buttons
    $(document).on('click', '.qty-minus, .qty-plus', function(e) {
        e.preventDefault();
        const input = $(this).siblings('.qty-input');
        const key = input.data('key');
        let qty = parseInt(input.val());

        qty = $(this).hasClass('qty-minus') ? Math.max(qty - 1, 1) : qty + 1;
        input.val(qty);

        showLoader(input);
        updateCartItem(key, qty, input);
    });

    // Update via input change
    $(document).on('change', '.qty-input', function() {
        const key = $(this).data('key');
        const qty = parseInt($(this).val()) || 1;

        $(this).val(qty);
        showLoader($(this));
        updateCartItem(key, qty, $(this));
    });

    function updateCartItem(key, qty, input) {
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'update_mini_cart_item',
                cart_item_key: key,
                quantity: qty,
                _wpnonce: wc_add_to_cart_params.update_qty_nonce
            },
            success: function(response) {
                // delete message after add to cart in single product
                $('.custom-notices-wrapper .woocommerce-message').remove();

                if (response.success ) {
                    refreshWooFragments();
                } else {
                    if (response.data.redirect_url) {
                        console.log(response.data.message);
                        window.location.href = response.data.redirect_url;
                    } else {
                        console.log(response.data.message || 'Error.');
                    }
                }
                hideLoader(input);
                
               

            },
            error: function() {
                console.log('Failed to connect server.');
                hideLoader(input);
            }
        });
    }

    function showLoader(input) {
        input.closest('.mini-cart-item-container').find('.mini-cart-loader').show();
    }

    function hideLoader(input) {
        input.closest('.mini-cart-item-container').find('.mini-cart-loader').hide();
    }

    // Handle remove from cart
    $(document).on('click', '.remove_from_cart_button', function(e) {
        e.preventDefault();

        const $this = $(this);
        const cartItemKey = $this.data('cart_item_key');

        // Animasi keluar item
        const $item = $this.closest('.mini_cart_item');
        $item.fadeOut(300, function() {
            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,
                data: {
                    action: 'remove_mini_cart_item',
                    cart_item_key: cartItemKey,
                    _wpnonce: wc_add_to_cart_params.update_qty_nonce
                },
                success: function(response) {
                    // delete message after add to cart in single product
                    $('.custom-notices-wrapper .woocommerce-message').remove();

                    if (response.success) {
                        $item.fadeOut(300, function() {
                            refreshWooFragments();
                        });
                    } else {
                        console.log(response.data.message || 'Error.');
                    }
                },
                error: function() {
                    console.log('Error in deleting process');
                    $item.show();
                }
            });
        });
    });

    // ✅ Helper to refresh cart fragments (badge, mini cart, etc.)
    function refreshWooFragments() {
        if (typeof wc_add_to_cart_params === 'undefined') return;

        const refreshUrl = wc_add_to_cart_params.wc_ajax_url.replace('%%endpoint%%', 'get_refreshed_fragments');

        $.ajax({
            type: 'POST',
            url: refreshUrl,
            success: function (data) {
                if (data && data.fragments) {
                    $.each(data.fragments, function (selector, html) {
                        $(selector).replaceWith(html);
                    });
                }
            }
        });
    }

});
