jQuery(document).ready(function($) {
    var clearButton = $('#content-holder.single-product form.cart .reset_variations')[0]; // Ambil elemen DOM (bukan jQuery object)
    var addToCartButton = $('.single_add_to_cart_button');

    function toggleAddToCartButton() {
        if (clearButton.style.visibility === 'hidden' || clearButton.style.display === 'none') {
            addToCartButton.prop('disabled', true); 
        } else {
            addToCartButton.prop('disabled', false); 
        }
    }

    // Buat MutationObserver untuk memantau perubahan pada atribut style tombol "Clear"
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && (mutation.attributeName === 'style' || mutation.attributeName === 'class')) {
                toggleAddToCartButton(); 
            }
        });
    });

    observer.observe(clearButton, {
        attributes: true 
    });

    // Panggil fungsi saat halaman dimuat
    toggleAddToCartButton();


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

    // Main update function
    function updateVariationTotal() {
        let $formVariation = $('.variations_form');
        if (!$formVariation.length) return;

        // Get quantity (minimum 1)
        let qty = Math.max(parseInt($formVariation.find('input.qty').val()) || 1, 1);
        
        // Get price element
        let $priceElement = $formVariation.find('.woocommerce-Price-amount.amount').last();
        if (!$priceElement.length) return;

        // Parse and calculate
        let price = parsePrice($priceElement.text());
        let total = price * qty;

        // Update display
        let $totalContainer = $formVariation.find('.variation-total');
        if ($totalContainer.length) {
            $totalContainer.find('.amount').text(formatPrice(total));
        } else {
            $formVariation.find('.woocommerce-variation-price').append(
                '<div class="variation-total">' + 
                'Total: <span class="amount">' + formatPrice(total) + '</span></div>'
            );
        }
    }

    // Event handlers
    $(document.body)
        .on('input change', '.variations_form input.qty', function() {
            // Validate quantity (whole numbers only)
            if (!/^\d*$/.test(this.value)) {
                this.value = this.value.replace(/\D/g, '');
            }
            updateVariationTotal();
        })
        .on('found_variation', '.variations_form', updateVariationTotal);

    // Initial update
    setTimeout(updateVariationTotal, 500);
});