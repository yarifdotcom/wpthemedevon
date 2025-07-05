<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>

<div class="woocommerce-my-account">
	<div class="my-account-sidebar">
		<?php
		// Ini akan menampilkan menu sidebar WooCommerce
		do_action('woocommerce_account_navigation');
		?>
	</div>

	<div class="my-account-content">
		<?php
		// Konten berdasarkan pilihan menu
		do_action('woocommerce_account_content');
		?>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('ul.woocommerce-account-navigation li');

    // Dapatkan URL saat ini
    const currentUrl = window.location.href;

    menuItems.forEach(function(menuItem) {
        // Periksa apakah item menu mencocokkan URL saat ini
        if (currentUrl.includes(menuItem.querySelector('a').getAttribute('href'))) {
            menuItem.classList.add('active'); // Tambahkan kelas 'active'
        } else {
            menuItem.classList.remove('active'); // Hapus kelas 'active' jika tidak cocok
        }
    });
});
</script>

