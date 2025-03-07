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
});