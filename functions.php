<?php
	/**
	 * FUNCTIONS
	 */


	//require_once( 'external/starkers-utilities.php' );


	add_theme_support('post-thumbnails');
	

	//add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	add_action( 'wp_enqueue_scripts', 'enqeue_css' );
	function enqeue_css() {
		$handle = 'main';
		$src =  get_template_directory_uri() . '/style.css';
		$deps = '';
		$ver = filemtime( get_template_directory() . '/style.css');
		$media = 'screen';
		wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	}	

	// add new custom css
	add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
	function my_theme_enqueue_styles() {
		// Memuat stylesheet utama
		wp_enqueue_style('main-style', get_stylesheet_uri());
		// Memuat stylesheet kustom
		wp_enqueue_style('custom-style', get_template_directory_uri() . '/custom-style.css', array('main-style'));
	}

	
	
	function my_custom_login_logo(){
    	echo '<style  type="text/css"> .login h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/screenshot.png)  !important; background-size:contain; width:300px;height:225px; } </style>';
	}
	add_action('login_head',  'my_custom_login_logo');
	

   
	function custom_css() {
		echo '<style type="text/css">
			.acf-field {
				min-height:0 !important;	
			}
			.acf-field-wysiwyg .acf-editor-wrap iframe {
				height: 50px ;
				min-height: 50px;
			}
			[data-type="wysiwyg"].acf-field .acf-input {
				margin-top: -35px;
			}
			.acf-flexible-content .layout .acf-fc-layout-handle {
				background: #e4efef none repeat scroll 0 0;
			}
            #product_catdiv, #tagsdiv-product_tag, #tagsdiv-collection, .term-description-wrap, #woocommerce-product-images {
                display:none;
            }
            .acf-field-62a2b7b1fa22e  {
            clear:both !important;
            }
            .acf-field-file .file-icon {
                display:none;
            }
            .acf-file-uploader .file-info {
                margin-left: 0; 
            }
		</style>';
	}
	add_action('admin_head', 'custom_css');

	// Add Menu
//	function register_my_menu() {
//		register_nav_menu('main-menu',__( 'Main Menu' ));
//	}
//	add_action( 'init', 'register_my_menu' );

    function register_my_menu() {
      register_nav_menus(
        array(
          'main-menu' => __( 'Left Menu' ),
          'right-menu' => __( 'Right Menu' )
        )
      );
    }
    add_action( 'init', 'register_my_menu' );



	// Add ACF Options Page
	if( function_exists('acf_add_options_page') ) { 
		acf_add_options_page();
	}

	function show_posts_nav() { // Check if there are more archive pages for navigation
		global $wp_query;
		return ($wp_query->max_num_pages > 1);
	}

	// rename 'posts'
	function revcon_change_post_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Articles';
		$submenu['edit.php'][5][0] = 'Articles';
		$submenu['edit.php'][10][0] = 'Add Article';
		$submenu['edit.php'][16][0] = 'Tags';
		echo '';
	}
	function revcon_change_post_object() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Articles';
		$labels->singular_name = 'Article';
		$labels->add_new = 'Add Article';
		$labels->add_new_item = 'Add Article';
		$labels->edit_item = 'Edit Article';
		$labels->new_item = 'Article';
		$labels->view_item = 'View Articles';
		$labels->search_items = 'Search Articles';
		$labels->not_found = 'No Articles found';
		$labels->not_found_in_trash = 'No Articles found in Trash';
		$labels->all_items = 'All Articles';
		$labels->menu_name = 'Articles';
		$labels->name_admin_bar = 'Articles';
	}
	//-----------------Uncomment to enable
	//add_action( 'admin_menu', 'revcon_change_post_label' ); //uncomment to change naming of standard 'posts' post type
	//add_action( 'init', 'revcon_change_post_object' ); //uncomment to change naming of standard 'posts' post type


	//reorder admin menu
	function custom_menu_order($menu_ord) {
		if (!$menu_ord) return true;
		return array(
			'index.php', // Dashboard
			'separator1', // First separator
			'edit.php?post_type=product',   //Uncomment / edit to move custom post type menu item 
			'edit.php?post_type=in_situ',   //Uncomment / edit to move custom post type menu item 
			'edit.php?post_type=page', // Pages
			'separator2', // First separator
			'upload.php', // Media
			'edit.php', // Posts
		);
	}
	add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
	add_filter('menu_order', 'custom_menu_order');

	//Change jpeg compression ratio
	// add_filter( 'jpeg_quality', create_function( '', 'return 70;' ) ); DEPRECATED!
	add_filter( 'jpeg_quality', function() {
		return 70;
	} );
	

	// add editor styles
	add_editor_style('editor-style.css');

	// remove emoji js
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	//Add HTML5 theme support.
	function wpdocs_after_setup_theme() {
		add_theme_support( 'html5', array( 'search-form' ) );
	}
	add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

	 //add class to archive nav
	add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

	function posts_link_attributes_1() {
		return 'class="next"';
	}
	function posts_link_attributes_2() {
		return 'class="prev"';
	}


	//////////////////////// Enqueue Scripts
	////////////////////////////////////////
	////////////////////////////////////////

	/**
	 * Enqueue gallery scripts
	 */

	add_action( 'wp_enqueue_scripts', function(){
	// if( is_front_page() ){
		//wp_enqueue_script('zoom');
		//wp_enqueue_script('flexslider');
		//wp_enqueue_script('photoswipe-ui-default');
	//  }
	});

    
	function starter_scripts() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_enqueue_script( 'jquery' );

		wp_register_script('barba', get_template_directory_uri() . '/scripts/barba.min.js', array('jquery'),'1.1', true);
		wp_register_script('slick', get_template_directory_uri() . '/scripts/slick.min.js', array('jquery'),'1.1', true);
		wp_register_script('gsap', get_template_directory_uri() . '/scripts/gsap.min.js', array('jquery'),'1.12', true);
		wp_register_script('scrolltrigger', get_template_directory_uri() . '/scripts/ScrollTrigger.min.js', array('jquery'),'1.12', true);
        wp_register_script('site_scripts', get_template_directory_uri() . '/scripts/site.js', array('jquery', 'gsap'),'1.167', true); 

		wp_enqueue_script('barba');
		wp_enqueue_script('slick');
		wp_enqueue_script('gsap');
        wp_enqueue_script('scrolltrigger');
        wp_enqueue_script('site_scripts');
	}
	add_action( 'wp_enqueue_scripts', 'starter_scripts' );


/// remove WP meta to speed up edit page load
add_filter('acf/settings/remove_wp_meta_box', '__return_true');


////////////////////////////////////////
//Change number of posts in query///////

add_action('pre_get_posts', 'change_tax_num_of_posts' );

function change_tax_num_of_posts( $wp_query ) {  
	if( !is_admin() && $wp_query->is_main_query() && in_array ( $wp_query->get('post_type'), array('product') ) ){
		$wp_query->set( 'posts_per_page', -1 );
        $wp_query->set( 'orderby', 'date' );
        $wp_query->set( 'order', 'DESC' );
	}
    
 	if( !is_admin() && $wp_query->is_main_query() && $wp_query->is_search ){
		$wp_query->set('posts_per_page', -1);

	}   
    
    
    
}

//stop trash deleting
function wpb_remove_schedule_delete() {
    remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' ); 
}
add_action( 'init', 'wpb_remove_schedule_delete' );



//Remove extra WP image sizes //////////////////////////////////////

/*
function filter_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        if (in_array( $size, array('medium_large', '1536x1536', '2048x2048') ) ) {
            remove_image_size( $size );
        }
    }
}

add_action('init', 'filter_image_sizes');
*/




function remove_default_image_sizes( $sizes) {
    unset( $sizes['1536×1536']);
    unset( $sizes['2048×2048']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');


// Remove big image bullshit //////////////////////////////////////
add_filter( 'big_image_size_threshold', '__return_false' );




// -------------------------- add custom styles to the WordPress editor

function my_custom_styles( $init_array ) {  
 
    $style_formats = array(  
        // These are the custom styles
        array(  
            'title' => 'Small Body (Block)',  
            'block' => 'div',  
            'classes' => 'small-body text50x',
            'wrapper' => true,
        ),  
        array(  
            'title' => 'Section Heading (H2)',  
            'block' => 'h2',  
            'classes' => 'section-heading text30-important p-b-0-third-em',
            'wrapper' => false,
        ),          
        
//        array(  
//            'title' => 'Large Text',   
//            'block' => 'span',  
//            'classes' => 'largeText text05',
//            'wrapper' => false,
//        ),    
//
//        array(  
//            'title' => 'underlined',  
//            'block' => 'p',  
//            'classes' => 'underlined',
//            'wrapper' => false,
//        ),    
        

    
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_custom_styles' );






/*-------------------------------------------------------------------------------
	Add thumbnail to admin columns
-------------------------------------------------------------------------------*/

/*
 * Add columns to exhibition post list
 */
 function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'image' => __ ( 'Image' ),
     'sector' => __ ( 'Sector' ),
   ) );
 }
 // add_filter ( 'manage_projects_posts_columns', 'add_acf_columns' );



/*-------------------------------------------------------------------------------
  Add columns to project post list
-------------------------------------------------------------------------------*/
 function exhibition_custom_column ( $column, $post_id ) {
   switch ( $column ) {
     case 'image':
       $imgId =  get_post_meta ( $post_id, 'key_image', true );
        echo wp_get_attachment_image( $imgId, 'thumbnail' );
       break;
     case 'sector':
       //$imgId =  get_post_meta ( $post_id, 'key_image', true );
        //echo wp_get_attachment_image( $imgId, 'thumbnail' );
        $sectorCount = 0;   
        $sector_terms = get_field( 'sector', $post_id ); 
        if ( $sector_terms ): 
            foreach ( $sector_terms as $sector_term ): 
                if($sectorCount === 0){
                    $sectorCount = 1;
                } else {
                    echo ', ';
                }
                echo  $sector_term->name;    
             endforeach; 
         endif;              
       break;           
           
   }
 }
 // add_action ( 'manage_projects_posts_custom_column', 'exhibition_custom_column', 10, 2 );




/*-------------------------------------------------------------------------------
	Allow sorting by sector in project admin columns
-------------------------------------------------------------------------------*/


function filter_projects_by_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	if ( 'projects' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'project_sector' );

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
        
        
        
		foreach ( $terms as $term ) {
            $parent = get_term_by('id', $term->parent, 'project_sector') ;
            if($parent){$parent = ' (' . $parent->name . ')'; }
            
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name . $parent,
				$term->count
			);
		}
        
        
        
        
		echo '</select>';
	}

}
// . add_action( 'restrict_manage_posts', 'filter_projects_by_taxonomies' , 10, 2);





/*-------------------------------------------------------------------------------
	Turn off automatic relationship connection for 'related' projects + insight/news
-------------------------------------------------------------------------------*/

// field_XXXXXXXX = the field key of the field
// you want to disable bidirectional relationships for
//add_filter('acf/post2post/update_relationships/key=field_5dae482d32f86', '__return_false');
//add_filter('acf/post2post/update_relationships/key=field_5dae486932f87', '__return_false');



/*
function my_custom_mime_types( $mimes ) {
	
	// New allowed mime types.
	$mimes['dwg'] = 'image/dwg';
    $mimes['dwg'] = 'image/vnd.dwg';
    $mimes['rvt'] = 'application/octet-stream';

	return $mimes;
}

add_filter( 'upload_mimes', 'my_custom_mime_types' );

*/

function shop_manager_add_users() {
    $role = get_role('shop_manager');
    $role->add_cap('create_users' );
    $role->add_cap('delete_user');
    $role->add_cap('delete_users');
}
add_action( 'admin_init', 'shop_manager_add_users');




/*
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
WOOCOMMERCE
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
*/

add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


/*-------------------------------------------------------------------------------
	Declare support
-------------------------------------------------------------------------------*/
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


function yourtheme_setup() {
    //add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'yourtheme_setup' );

/*-------------------------------------------------------------------------------
	Remove woo stylesheets
-------------------------------------------------------------------------------*/

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );



/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );




add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

/*-------------------------------------------------------------------------------
	Cart shortcode
-------------------------------------------------------------------------------*/


add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        
	    <?php
        if ( $cart_count > 0 ) {
        ?>
            <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
                <span class="not-mobile">Cart</span> [<span class="cart-contents-count"><?php echo $cart_count; ?></span>]
            </a>
            
        <?php
        } else {
        ?>
		<?php /* ?>

            <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?> " class=" ">Shop</a>

		<?php */ ?>            
        <?php   
        }  
        ?>        
            
            <?php
	        
    return ob_get_clean();
 
}



add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
	<?php
        if ( $cart_count > 0 ) {
       ?>
            <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
                <span class="not-mobile">Cart</span> (<span class="cart-contents-count"><?php echo $cart_count; ?></span>)
            </a>
            
        <?php
        } 
        ?> 
            
        <?php   
         
        ?>   
            
            
            
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}




/** 
 * Remove start and end wrappers
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


/** 
 * Change gallery to use big images
 */


add_filter( 'woocommerce_gallery_image_size', function( $size ) {
    return 'xl';
} );


/* Change Tax to GST  -------------------------------------------*/
add_filter( 'gettext', function( $translation, $text, $domain ) {
	if ( $domain == 'woocommerce' ) {
		if ( $text == '(ex. tax)' ) { $translation = '(ex. gst)'; }
		if ( $text == 'Tax' ) { $translation = 'GST'; }
        
	}
	return $translation;
}, 10, 3 );

/* remove zeros from whole number prices -------------------------------------------*/

add_filter( 'woocommerce_price_trim_zeros', '__return_true' );


add_action( 'wp', 'remove_sidebar_product_pages' );

function remove_sidebar_product_pages() {

    //if ( is_product() ) { OLD
	if ( class_exists( 'WooCommerce' ) && is_product() ) 
	{
    	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
   	}

}
/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}



/**
 * Add suffix to prices
 */
   
/*
add_filter( 'woocommerce_get_price_suffix', 'add_price_suffix', 99, 4 );
  
function add_price_suffix( $html, $product, $price, $qty ){
    $html .= ' USD';
    return $html;
}
*/

/**
 * Remove image link
 */
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'custom_remove_product_link' );
function custom_remove_product_link( $html ) {
  return strip_tags( $html, '<div><img>' );
}


/**
 * Change 'added to cart' message, and send to checkout instead
 */


add_filter( 'woocommerce_continue_shopping_redirect', 'my_changed_woocommerce_continue_shopping_redirect', 10, 1 );
function my_changed_woocommerce_continue_shopping_redirect( $return_to ){

    $return_to = wc_get_page_permalink( 'checkout' );

    return $return_to;
}


add_filter( 'wc_add_to_cart_message_html', 'my_changed_wc_add_to_cart_message_html', 10, 2 );
function my_changed_wc_add_to_cart_message_html($message, $products){

    if (strpos($message, 'Continue shopping') !== false) {
        $message = str_replace("Continue shopping", "Proceed to checkout", $message);
    }

    return $message;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////// SINGLE PRODUCT PAGE

/**
 * Hook: woocommerce_before_single_product_summary.
 *
 * @hooked woocommerce_show_product_sale_flash - 10
 * @hooked woocommerce_show_product_images - 20
 */
//do_action( 'woocommerce_before_single_product_summary' );

//remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);



add_action('woocommerce_before_single_product_summary', 'before_image', 5);

function before_image() {
    
    //$sectionClasses = 'titleSection spaceAboveNone spaceBelowNone';
	//$containerClasses = '';
	//$rowClasses = '';
    //$colClasses = 'col-sm-10 text20 featureFont';
    //$removeCol = ''; 
    include( locate_template( 'wc-snippets/pre_image.php', false, false ) );   

}


add_action('woocommerce_before_single_product_summary', 'after_image', 30);

function after_image() {
    
    //$sectionClasses = 'titleSection spaceAboveNone spaceBelowNone';
	//$containerClasses = '';
	//$rowClasses = '';
   // $colClasses = 'col-sm-10 text20 featureFont';
    //$removeCol = '';
    include( locate_template( 'wc-snippets/post_image.php', false, false ) );   

}



/**
 * Hook: woocommerce_single_product_summary.
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 * @hooked WC_Structured_Data::generate_product_data() - 60
 */
//do_action( 'woocommerce_single_product_summary' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 5 ); 
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 55 ); //???



add_action('woocommerce_single_product_summary', 'post_quote', 40);

function post_quote() {
    include( locate_template( 'wc-snippets/post_quote.php', false, false ) );   
}




//////////////////////////////////////
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
//do_action( 'woocommerce_after_single_product_summary' );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_action('woocommerce_after_single_product_summary', 'add_summary_close', 1);


function add_summary_close() {
    
    include( locate_template( 'wc-snippets/post_summary.php', false, false ) );   

}






/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = -1;
  return $cols;
}



/**
 * @snippet       Hide Price & Stock @ Google
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli, BusinessBloomer.com
 * @testedwith    WooCommerce 6
 * @community     https://businessbloomer.com/club/
 */
 
//add_filter( 'woocommerce_structured_data_product_offer', '__return_empty_array' );



add_filter( 'woocommerce_structured_data_product_offer', 'ywraq_my_woocommerce_structured_data_product' );
function ywraq_my_woocommerce_structured_data_product( $markup_offer ) {
 if ( isset( $markup_offer['price'] ) ) {
 unset( $markup_offer['price'] );
 }
 if ( isset( $markup_offer['lowPrice'] ) ) {
 unset( $markup_offer['lowPrice'] );
 }
 if ( isset( $markup_offer['highPrice'] ) ) {
 unset( $markup_offer['highPrice'] );
 }
 if (isset($markup_offer['priceSpecification']) ) {
 unset( $markup_offer['priceSpecification'] );
 }
 return $markup_offer;
}



/**
 * DEBUGGING
 */

// add_action('wp', function() {
//     if (is_page() || is_single()) { // Bisa disesuaikan untuk kondisi tertentu
//         echo '<pre>';
//         print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
//         echo '</pre>';
//         exit; // Hentikan eksekusi untuk melihat output
//     }
// });


function custom_return_to_shop_url() {

    return home_url('/product'); // Ganti dengan URL yang diinginkan
}
add_filter( 'woocommerce_get_shop_page_permalink', 'custom_return_to_shop_url' );


function custom_remove_variation_wrap() {
    remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);
}
add_action('wp', 'custom_remove_variation_wrap');

function custom_variation_script() {
    if (is_product()) { // Hanya load script di halaman produk tunggal
        wp_enqueue_script('custom-variation-js', get_stylesheet_directory_uri() . '/scripts/custom.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'custom_variation_script');







