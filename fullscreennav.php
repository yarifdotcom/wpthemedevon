
<nav id="main-nav"> 

	<button type="button" class="navbar-toggle collapsed">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar icon-top"></span>
		<span class="icon-bar icon-bottom"></span>
	</button>
    

	<div class="big-nav">
        
        <div class="logo-holder svg-logo logo-link mobile-only">
            <a href="<?php echo get_home_url(); ?>" >
                <?php include( locate_template( 'snippets/logo.php', false, false ) ); ?>
            </a>
        </div>                    
        
        
        
        <div class="mobile-only border-line"></div>
        
		<div class="nav navbar-nav main-nav mob-p-t-2">

            <ul id="menu-main-menu" class="">
                
                <li class="drop collection-drop text70 mob-text30 loose-kern-10 weight500 uppercase"><span class="trigger">Collections</span>
                    <?php 
                    $tax = $wp_query->get_queried_object();
                    $curTax = $tax->slug;
                    ?>                    
                    
                    <?php $terms = get_terms( 'collection' );

                    echo '<div class="dropdown container-fluid no-max mob-text50"><ul class="row mob-p-b-2-em mob-p-t-0-half-em">';
                    


                    foreach ( $terms as $term ) {

                        
                        // Define taxonomy prefix eg category
                        // Use term for all taxonomies
                        $taxonomy_prefix = 'collection';

                        // Define term ID
                        // Replace NULL with ID of term to be queried eg '123'
                        $term_id = $term->term_id;

                        // Example: Get the term ID in a term archive template
                        // $term_id = get_queried_object_id();

                        // Define prefixed term ID
                        $term_id_prefixed = $taxonomy_prefix .'_'. $term_id;
                    
                    
                    
                        if ( get_field( 'show_this_collection_in_menu_and_home_page', $term_id_prefixed ) == 1   ) {

                            if($term->slug === $curTax){$thisTax = 'curTax';} else {$thisTax = '';} ?>

                            <li class="col <?php echo $thisTax; ?>">



                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">

                                    <?php 
                                    //Image/////////////////////////////////////////  
                                    $image_id= ''; // use ID of image instead of ACF 
                                    $post_id = $term_id_prefixed ;
                                    $imageField = 'image'; // slug of image field
                                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                    $imageSize = 'xl'; //  //
                                    $sizes = '(min-width: 768px) 25vw, 100vw'; // src-set sizes //
                                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                    $forceRatio = '75'; // force image to specific ratio // 
                                    $outerClasses = 'not-mobile'; // 'imgOuter' additional classes
                                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                    $imgClasses = ''; // 'img' additional classes
                                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                                    $loading = 'lazy'; // lazy or eager
                                    include( locate_template( 'snippets/image.php', false, false ) ); 
                                    ?>                              

                                    <div class="caption p-t-0-half-em mob-p-t-0"><?php echo esc_html( $term->name ); ?></div>
                                </a>                            

                            </li>
                        
                        <?php
                        }
                            
                    }

                    echo '</ul></div>';
                    ?>
                
                 
                </li>
            <li class="drop product-drop text70 mob-text30 "><span class="loose-kern-10 weight500 uppercase trigger">Products</span>
                    <?php 
                    $tax = $wp_query->get_queried_object();
                    $curTax = $tax->slug;
                    ?>                    
                    
                    <?php $terms = get_terms( 'product_cat' );

                    echo '<div class="dropdown "><ul class="text40-important mob-p-b-2-em mob-p-t-0-half-em">';
                    echo '<div class="border-left left-line"></div><div class="border-left centre-line"></div>';
                
                
                    ?>
                    
                            <li class="col <?php //echo $thisTax; ?>">


                                <!-- <a href="https://devon.co.nz/product/"> -->
                                <a href="<?php echo site_url(); ?>/product/">

                    <?php /* ?>

                                    <?php 
                                    //Image/////////////////////////////////////////  
                                    $image_id= ''; // use ID of image instead of ACF 
                                    $post_id = $term_id_prefixed ;
                                    $imageField = 'image'; // slug of image field
                                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                    $imageSize = 'xl'; //  //
                                    $sizes = '(min-width: 768px) 25vw, 100vw'; // src-set sizes //
                                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                    $forceRatio = '75'; // force image to specific ratio // 
                                    $outerClasses = 'not-mobile'; // 'imgOuter' additional classes
                                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                    $imgClasses = ''; // 'img' additional classes
                                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                                    $loading = 'lazy'; // lazy or eager
                                    include( locate_template( 'snippets/image.php', false, false ) ); 
                                    ?>       
                    <?php */ 
                    
                    ?>                       

                                    <div class="caption p-t-0-half-em mob-p-t-0">All Products</div>
                                </a>                            

                            </li>                    
                    
                    <?php                

                    foreach ( $terms as $term ) {

                        if($term->slug === $curTax){$thisTax = 'curTax';} else {$thisTax = '';} 
                        
                            if($term->slug !== 'uncategorized'){
                    
                            ?>
                        
                                <li class="<?php echo $thisTax; ?> ">

                                    <?php
                                    // Define taxonomy prefix eg category
                                    // Use term for all taxonomies
                                    $taxonomy_prefix = 'collection';

                                    // Define term ID
                                    // Replace NULL with ID of term to be queried eg '123'
                                    $term_id = $term->term_id;

                                    // Example: Get the term ID in a term archive template
                                    // $term_id = get_queried_object_id();

                                    // Define prefixed term ID
                                    $term_id_prefixed = $taxonomy_prefix .'_'. $term_id;
                                    ?>

                                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">

                                        <?php 
                                        //Image/////////////////////////////////////////  
                                        $image_id= ''; // use ID of image instead of ACF 
                                        $post_id = $term_id_prefixed ;
                                        $imageField = 'image'; // slug of image field
                                        $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                        $imageSize = 'xl'; //  //
                                        $sizes = '(min-width: 768px) 25vw, 100vw'; // src-set sizes //
                                        $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                        $forceRatio = '100'; // force image to specific ratio // 
                                        $outerClasses = ''; // 'imgOuter' additional classes
                                        $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                        $imgClasses = ''; // 'img' additional classes
                                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                        $dataOnly = false; // add src-set fields to data-src-set for js usage
                                        $loading = 'lazy'; // lazy or eager
                                        include( locate_template( 'snippets/image.php', false, false ) ); 
                                        ?>                              

                                        <div class="caption p-t-0-half-em mob-p-t-0"><?php echo esc_html( $term->name ); ?></div>
                                    </a>                            

                                </li>
                        
                        <?php
                            }
                        }

                    echo '</ul></div>';
                    ?>
                </li>
                <?php 
                $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php) // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

                $menuID = $menuLocations['main-menu']; // Get the *primary* menu ID
                $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
                
                //$x = 0;
                //$padOffset = 5.55;
                foreach ( $primaryNav as $navItem ) {
                    //echo '<li style="transition-delay:' . ($x + 2) * $timingInc  . 'ms; padding-top:'. $x * $padOffset  . 'em;"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title;
                    echo '<li class="text70 mob-text30  loose-kern-10 weight500 uppercase"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title;
                    /// Something else? 
                    echo '</a></li>';
                }
                ?>
            </ul>
            <ul id="menu-right-menu" >
                
                <?php 
                $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php) // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

                $menuID = $menuLocations['right-menu']; // Get the *primary* menu ID
                $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
                
                //$x = 0;
                //$padOffset = 5.55;
                foreach ( $primaryNav as $navItem ) {
                    //echo '<li style="transition-delay:' . ($x + 2) * $timingInc  . 'ms; padding-top:'. $x * $padOffset  . 'em;"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title;
                    echo '<li class="text70 mob-text30 loose-kern-10 weight500 uppercase ' . 'menu-' . $navItem->title . '"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title;
                    /// Something else? 
                    echo '</a></li>';
                }
                ?>

                <?php /* ?>

                <li class="text70 mob-text20 loose-kern-10 weight500 uppercase">Quote(5)</li>
                
                <?php */ ?>                
                
                <li class="drop search-drop text70 mob-text30 loose-kern-10 weight500 uppercase not-mobile">
                    <span class="trigger">Search</span>
                    <div class="dropdown container-fluid no-max">
                            <?php echo get_search_form(); ?>
                    </div>
                </li>     
                <li class="text70 mob-text30 loose-kern-10 weight500 uppercase mobile-only mobile-nav-search">
                    <?php //echo get_search_form('mobile'); ?>
                    <?php get_template_part( 'searchform-mobile'); ?>
                </li>                     
                
                <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                
                <!-- Mobile mode -->
                <li class="text70 mob-text30  loose-kern-10 weight500 uppercase wc-headermenu-mobile">
                   <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="My Account">My Account</a>
                </li>
                 <!-- End Mobile -->

                <li class="header-my-account">
                    <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                        <svg class="wc-block-customer-account__account-icon" viewBox="1 1 29 29" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="10.5" r="3.5" stroke="currentColor" stroke-width="2" fill="none"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 18.5H20.5C21.8807 18.5 23 19.6193 23 21V25.5H25V21C25 18.5147 22.9853 16.5 20.5 16.5H11.5C9.01472 16.5 7 18.5147 7 21V25.5H9V21C9 19.6193 10.1193 18.5 11.5 18.5Z" fill="currentColor"></path>
                        </svg>
                    </a>
                </li>

                <!-- hidden di page selain cart & checkout biar konsisten -->
                <?php if ( ! is_cart() && ! is_checkout() ) : ?> 

                <!-- Mobile mode -->
                <li class="text70 mob-text30  loose-kern-10 weight500 uppercase wc-headermenu-mobile">
                   <span class="cart-contents" title="Cart">Cart</span>
                </li>
                 <!-- End Mobile -->

                <li class="header-mini-cart">
                    <span class="cart-contents">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="none" width="20" height="20" class="wc-block-mini-cart__icon" aria-hidden="true" focusable="false">
                            <circle cx="12.6667" cy="24.6667" r="2" fill="currentColor"></circle>
                            <circle cx="23.3333" cy="24.6667" r="2" fill="currentColor"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.28491 10.0356C9.47481 9.80216 9.75971 9.66667 10.0606 9.66667H25.3333C25.6232 9.66667 25.8989 9.79247 26.0888 10.0115C26.2787 10.2305 26.3643 10.5211 26.3233 10.8081L24.99 20.1414C24.9196 20.6341 24.4977 21 24 21H12C11.5261 21 11.1173 20.6674 11.0209 20.2034L9.08153 10.8701C9.02031 10.5755 9.09501 10.269 9.28491 10.0356ZM11.2898 11.6667L12.8136 19H23.1327L24.1803 11.6667H11.2898Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.66669 6.66667C5.66669 6.11438 6.1144 5.66667 6.66669 5.66667H9.33335C9.81664 5.66667 10.2308 6.01229 10.3172 6.48778L11.0445 10.4878C11.1433 11.0312 10.7829 11.5517 10.2395 11.6505C9.69614 11.7493 9.17555 11.3889 9.07676 10.8456L8.49878 7.66667H6.66669C6.1144 7.66667 5.66669 7.21895 5.66669 6.66667Z" fill="currentColor"></path>
                        </svg>
                        <span class="cart-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </span>
                </li>

                <?php endif; ?>

                <?php endif; ?>
 
                
            </ul>
 
            
		</div>
        
	</div><!--/bignav -->

</nav>