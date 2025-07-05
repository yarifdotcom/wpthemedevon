jQuery(document).ready(function($) {
     // Fungsi untuk kalkulasi total pada single product
     function parsePrice(priceText) {
        return parseFloat(
            priceText
                .replace(/[^\d,.-]/g, '')  // Remove all non-numeric except comma, dot, minus
                .replace(/,/g, '')         // Remove thousand separators
        ) || 0;
    }

    // Function to format price with $ and commas
    function formatPrice(amount) {
        return '$' + amount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Update total untuk produk simple
    function updateSimpleProductTotal() {
        let $formSimple = $('form.cart:not(.variations_form)'); // pastikan ini bukan form variation
        if (!$formSimple.length) return;

        let qty = Math.max(parseInt($formSimple.find('input.qty').val()) || 1, 1);

        let $priceElement = $('.woocommerce-simple-price .woocommerce-Price-amount.amount').last();
        if (!$priceElement.length) return;

        let price = parsePrice($priceElement.text());
        let total = price * qty;

        let $totalContainer = $('.woocommerce-simple-price .simple-total');
        if ($totalContainer.length) {
            $totalContainer.find('.amount').text(formatPrice(total));
        } else {
            $formSimple.find('.woocommerce-simple-price').append(
                '<div class="simple-total">' + 
                'Total: <span class="amount">' + formatPrice(total) + '</span></div>'
            );
        }
    }

    // Handler saat quantity diubah
    $(document.body).on('input change', 'form.cart:not(.variations_form) input.qty', function () {
        // Validasi angka
        if (!/^\d*$/.test(this.value)) {
            this.value = this.value.replace(/\D/g, '');
        }
        updateSimpleProductTotal();
    });


    // Initial update
    setTimeout(updateSimpleProductTotal, 500);
});