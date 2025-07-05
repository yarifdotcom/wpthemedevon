function activatePlaceOrderSpinner() {
    jQuery('form.checkout').off('submit.spinnerFix').on('submit.spinnerFix', function () {
        var $button = jQuery('#place_order');
        if ($button.length) {
            $button.prop('disabled', true);
            $button.addClass('loading');
            $button.html('<span class="spinner"></span> Processing...');
        }
    });
}

function resetPlaceOrderButton() {
    var $button = jQuery('#place_order');
    if ($button.length) {
        $button.prop('disabled', false);
        $button.removeClass('loading');
        $button.html('Place order');
    }
}

jQuery(document).ready(function($) {
    
     // if failed or not valid form
     $(document.body).on('checkout_error', function () {
        resetPlaceOrderButton();
    });

    // if AJAX call saat place order gagal (misal 500 error)
    $('form.checkout').on('checkout_place_order_fail', function () {
        resetPlaceOrderButton();
    });

    activatePlaceOrderSpinner();

    // Re-bind after WooCommerce updates the checkout via AJAX
    $(document.body).on('updated_checkout', function () {
        activatePlaceOrderSpinner();
    });

    // Hidden select kecuali NZ 
    let $countrySelect = $('#billing_country');
    let $shippingcountrySelect = $('#shipping_country');

    $countrySelect.find('option').not('[value="NZ"]').remove();
    $shippingcountrySelect.find('option').not('[value="NZ"]').remove();

    // Set nilai ke NZ (jaga-jaga)
    $countrySelect.val('NZ');
    $shippingcountrySelect.val('NZ');

    if ($countrySelect.hasClass('select2-hidden-accessible')) {
        $countrySelect.select2('destroy');
    }

    if ($shippingcountrySelect.hasClass('select2-hidden-accessible')) {
        $shippingcountrySelect.select2('destroy');
    }

    $countrySelect.select2({
        minimumResultsForSearch: Infinity // hide search box
    });

    $shippingcountrySelect.select2({
        minimumResultsForSearch: Infinity // hide search box
    });


    // Opsional: Buat tidak bisa diubah
    // $countrySelect.prop('disabled', true);
});
