<?php
/**
 * Custom WooCommerce Checkout Template
 * Theme: Inspired by Twenty Twenty-Five
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// Cek jika user wajib login
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div class="wc-grid-layout">
		
		<div class="wc-checkout-left">

			<?php if ( ! is_user_logged_in() ) : ?>
				<fieldset class="wc-block-checkout__contact-fields wp-block-woocommerce-checkout-contact-information-block wc-block-components-checkout-step" id="contact-fields">
					<legend class="screen-reader-text"><?php esc_html_e( 'Contact Information', 'woocommerce' ); ?></legend>

					<div class="wc-block-components-checkout-step__heading">
						<h2 class="wc-block-components-title wc-block-components-checkout-step__title"><?php esc_html_e( 'Contact Information', 'woocommerce' ); ?></h2>
						<div>
							Already have an account? 
							<span class="wc-block-components-checkout-step__heading-content">
								<a class="wc-block-checkout__login-prompt" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>?redirect_to=<?php echo esc_url( wc_get_checkout_url() ); ?>">
									<?php esc_html_e( 'Login', 'woocommerce' ); ?>
								</a>
							</span>
						</div>
					</div>

					<div class="wc-block-components-checkout-step__container">
						<p class="wc-block-components-checkout-step__description">
							<?php esc_html_e( 'We’ll use this email to send order details and updates.', 'woocommerce' ); ?>
						</p>

						<div class="wc-block-components-checkout-step__content">
							<div class="wc-block-components-address-form">
								<div class="wc-block-components-text-input wc-block-components-address-form__email">
									<label for="reg_email"><?php esc_html_e( 'Email Address', 'woocommerce' ); ?></label>
									<input type="email" name="email" id="reg_email" autocomplete="email" required />
								
								</div>

								<?php if ( get_option( 'woocommerce_enable_signup_and_login_from_checkout' ) === 'yes' ) : ?>
									<div class="wc-block-components-text-input wc-block-components-address-form__password">
										<label for="account_password"><?php esc_html_e( 'Create Password', 'woocommerce' ); ?></label>
										<input type="password" name="account_password" id="account_password" autocomplete="off" required />
										<button type="button" class="toggle-password" aria-label="Show password">&#128065;</button> <!-- mata icon -->
										<!-- Password strength meter -->
										<div id="woocommerce-password-strength-meter-1" class="wc-block-components-password-strength">
											<label for="woocommerce-password-strength-meter-1-meter" class="screen-reader-text"><?php esc_html_e( 'Password strength', 'woocommerce' ); ?></label>
											<meter id="woocommerce-password-strength-meter-1-meter" class="wc-block-components-password-strength__meter" min="0" max="4" value="0"></meter>
											<div id="woocommerce-password-strength-meter-1-result" class="wc-block-components-password-strength__result">
												<span class="screen-reader-text" aria-live="polite"><?php esc_html_e( 'Password strength: unknown', 'woocommerce' ); ?></span>
												<span aria-hidden="true">—</span>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</fieldset>
			<?php endif; ?>

			<!-- If user is logged in, show account password fields -->
			<?php if ( is_user_logged_in() ) : ?>
				<div class="woocommerce-account-fields">
					<div class="create-account">
						<p class="form-row validate-required" id="account_password_field" data-priority="">
							<label for="account_password" class="">
								<?php esc_html_e( 'Create account password', 'woocommerce' ); ?>&nbsp;
								<abbr class="required" title="required">*</abbr>
							</label>
							<span class="woocommerce-input-wrapper password-input">
								<input type="password" class="input-text " name="account_password" id="account_password" placeholder="Password" value="" aria-required="true" autocomplete="new-password">
								<span class="show-password-input"></span>
							</span>
						</p>
					</div>
				</div>
			<?php endif; ?>


			<?php if ( $checkout->get_checkout_fields() ) : ?>
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<div id="customer_details">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<?php endif; ?>

		</div><!-- .wc-checkout-left -->

		<div class="wc-checkout-right">
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

			<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>

			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div><!-- .wc-checkout-right -->

	</div><!-- .wc-grid-layout -->

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
	const passwordInput = document.querySelector('.wc-block-components-address-form__password input');
	const strengthContainer = document.querySelector('.wc-block-components-password-strength');
	const strengthMeter = strengthContainer.querySelector('meter');
	const strengthWrapper = strengthContainer.closest('.wc-block-components-password-strength');
	const resultText = strengthContainer.querySelector('.wc-block-components-password-strength__result');

	const updateStrengthClass = (score) => {
		strengthWrapper.classList.remove(
			'wc-password-strength-weak',
			'wc-password-strength-medium',
			'wc-password-strength-strong'
		);

		let label = '';
		let labelColor = '';

		if (score <= 1) {
			label = 'Weak';
			labelColor = 'red';
			strengthWrapper.classList.add('wc-password-strength-weak');
		} else if (score === 2 || score === 3) {
			label = 'Medium';
			labelColor = 'orange';
			strengthWrapper.classList.add('wc-password-strength-medium');
		} else if (score === 4) {
			label = 'Strong';
			labelColor = 'green';
			strengthWrapper.classList.add('wc-password-strength-strong');
		}

		// Update text inside result
		if (resultText) {
			const srText = resultText.querySelector('.screen-reader-text');
			const visibleText = resultText.querySelector('span[aria-hidden="true"]');

			if (srText) {
				srText.textContent = 'Password strength: ' + label;
			}
			if (visibleText) {
				visibleText.textContent = label;
				visibleText.style.color = labelColor;
			}
		}
	};

	passwordInput.addEventListener('input', function () {
		const val = passwordInput.value;
		let score = 0;

		if (val.length > 5) score++;
		if (val.length > 8) score++;
		if (/[A-Z]/.test(val)) score++;
		if (/[0-9]/.test(val)) score++;
		if (/[\W]/.test(val)) score++;

		const finalScore = Math.min(score, 4); // max value of <meter> is 4
		strengthMeter.value = finalScore;

		updateStrengthClass(finalScore);
	});


	const toggleButtons = document.querySelectorAll('.toggle-password');

	toggleButtons.forEach(button => {
		button.addEventListener('click', () => {
			const _input = button.closest('.wc-block-components-text-input').querySelector('#account_password');
			const isPassword = _input.type === 'password';
			_input.type = isPassword ? 'text' : 'password';
			button.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
			button.classList = isPassword ? 'toggle-password show_pwd' : 'toggle-password'; // Ganti ikon 
		});
	});

	// prevent bug if commit too fast
	const customEmail = document.querySelector('#reg_email');
    const billingEmail = document.querySelector('#billing_email');

    if (customEmail && billingEmail) {
        function sync() {
            billingEmail.value = customEmail.value;
        }
        customEmail.addEventListener('input', sync);
        customEmail.addEventListener('change', sync);

        // Jaga-jaga: sync saat form disubmit
        const form = document.querySelector('form.checkout');
        if (form) {
            form.addEventListener('submit', sync);
        }
    }
});
</script>
