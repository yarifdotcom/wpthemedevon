<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	wp_redirect( wc_get_page_permalink( 'myaccount' ) );
	exit;
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

	<div class="wc-form-login-row">
		<div class="wc-form-login-col">
			
		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
					<div class="password-field-wrapper wc-register-icon-eye-pos">
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
						<span type="button" class="toggle-password" aria-label="Toggle password visibility">&#128065;</span>
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
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<p class="woocommerce-form-row form-row">
				<?php esc_html_e( "Already have an account?", 'woocommerce' ); ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"><?php esc_html_e( 'Login here', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
	const passwordInput = document.querySelector('#reg_password');
    const strengthContainer = document.querySelector('#woocommerce-password-strength-meter-1');
    const strengthMeter = strengthContainer.querySelector('meter');
    const strengthWrapper = strengthContainer.closest('.wc-block-components-password-strength');
    const resultText = strengthContainer.querySelector('.wc-block-components-password-strength__result');

    const togglePasswordVisibility = document.querySelector('.toggle-password');
    
    // Function to update strength meter and text
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

    // Event listener for password input change
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
			const _input = button.closest('.password-field-wrapper').querySelector('.woocommerce-Input');
			const isPassword = _input.type === 'password';
			_input.type = isPassword ? 'text' : 'password';
			button.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
			button.classList = isPassword ? 'toggle-password show_pwd' : 'toggle-password'; // Ganti ikon 
		});
	});
});
</script>
