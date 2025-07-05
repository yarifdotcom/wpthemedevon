<?php
if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()) : ?>
    <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
        <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0) :
                $product_name      = $_product->get_name();
                $thumbnail         = $_product->get_image();
                $product_price     = WC()->cart->get_product_price($_product);
                $product_subtotal  = WC()->cart->get_product_subtotal($_product, $cart_item['quantity']);
                $product_permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                $product_id        = $_product->get_id();
        ?>
            <li class="woocommerce-mini-cart-item mini_cart_item">
                <div class="mini-cart-item-grid" style="display: flex; gap: 10px;">
                    
                    <!-- Kolom 1: Gambar -->
                    <div class="mini-cart-col image-col">
                        <?php if ($product_permalink): ?>
                            <a href="<?php echo esc_url($product_permalink); ?>"><?php echo $thumbnail; ?></a>
                        <?php else: ?>
                            <?php echo $thumbnail; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Kolom 2: Info -->
                    <div class="mini-cart-col info-col" style="flex-grow: 1;">
                        <div class="product-name">
                            <?php if ($product_permalink): ?>
                                <a href="<?php echo esc_url($product_permalink); ?>"><?php echo esc_html($product_name); ?></a>
                            <?php else: ?>
                                <?php echo esc_html($product_name); ?>
                            <?php endif; ?>
                        </div>

                        <div class="product-price"><?php echo $product_price; ?></div>

                        <div class="quantity-control">
                            <button class="qty-minus" data-key="<?php echo esc_attr($cart_item_key); ?>">-</button>
                            <input 
                                type="number" 
                                class="qty-input" 
                                value="<?php echo esc_attr($cart_item['quantity']); ?>" 
                                min="1" 
                                data-key="<?php echo esc_attr($cart_item_key); ?>"
                            >
                            <button class="qty-plus" data-key="<?php echo esc_attr($cart_item_key); ?>">+</button>

                            <!-- 🔄 Loader ketika update quantity -->
                            <div class="mini-cart-loader" style="display: none;">
                                <div class="loader-spinner"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom 3: Subtotal -->
                    <div class="mini-cart-col subtotal-col">
                        <span class="item-subtotal" data-key="<?php echo esc_attr($cart_item_key); ?>">
                            <?php echo $product_subtotal; ?>
                        </span>
                    </div>

                    <!-- Kolom 4: Tombol Hapus -->
                    <div class="mini-cart-col remove-col">
                        <a href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>"
                            class="remove remove_from_cart_button"
                            aria-label="<?php esc_attr_e('Remove this item', 'woocommerce'); ?>"
                            data-product_id="<?php echo esc_attr($product_id); ?>"
                            data-cart_item_key="<?php echo esc_attr($cart_item_key); ?>"
                            data-product_sku="<?php echo esc_attr($_product->get_sku()); ?>">
                            &times;
                        </a>
                    </div>
                </div>
            </li>
        <?php endif; endforeach; ?>
    </ul>

    <p class="woocommerce-mini-cart__total total">
        <span class="mini-cart-subtotal_label"><?php _e('Subtotal', 'woocommerce'); ?>:</span>
        <span class="mini-cart-subtotal">
            <?php echo WC()->cart->get_cart_subtotal(); ?>
        </span>
    </p>

    <p class="woocommerce-mini-cart__buttons buttons">
        <?php do_action('woocommerce_widget_shopping_cart_buttons'); ?>
    </p>

<?php else : ?>
    <p class="woocommerce-mini-cart__empty-message">
       <div class="woocommerce-mini-cart__wrapper-empty-message">
        <p class="has-text-align-center">
                <?php esc_html_e('No products in the cart.', 'woocommerce'); ?>
                
            </p>
            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="button">
                Go to Shop
            </a>
       </div>
       
    </p>
<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>
