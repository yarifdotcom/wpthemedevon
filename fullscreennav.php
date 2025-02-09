
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
                <li class="menu-item cart-contents text70 mob-text30 loose-kern-10 weight500 uppercase">
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="View Cart">
                        <span class="cart-icon">🛒</span>
                        <span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                    </a>
                </li>
                <?php endif; ?>
 
                
            </ul>
 
            
		</div>
        
	</div><!--/bignav -->

</nav>