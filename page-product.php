<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>

<section class="collection-content collection-text p-t-2 p-b-1">
	<div class="container-fluid  noMax">
		<div class="row">
            <div class="col col-sm-5-half col-sm-offset-6 ">
                <h1 class="text10 serif display-inline vertical-align-middle "><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1><div class="count text50 display-inline-block vertical-align-text-top hidden">(<?php //echo  $taxCount; ?>)</div>
            </div>    
            <?php 

            // die(__FILE__);

            /* ?>
                <div class="col col-sm-6 col-sm-offset-6 main-gallery-col">
                    <?php echo get_field( 'text', $term_id_prefixed ); ?>
                </div>
            <?php */ 

            ?>
        </div>
        
    </div>
    
</section>


<section class="content-section product-grid tax-grid mob-p-b-2">
	<div class="container-fluid">
		<div class="row">
            
            <div class="border-left left-line"></div>
            <div class="border-left centre-line"></div>
            <div class="border-left right-line"></div> 
            
                <?php 
                  $args = array( 'post_type' => 'product', 'posts_per_page' => -1 );
                  $the_query = new WP_Query( $args ); 
                ?>            
            
                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
                <article class="col col-sm-3 text60 uppercase p-b-1-col mob-p-b-3-em">

                    <a href="<?php echo get_the_permalink() ?>" class="product-link">

                        <?php $image_id = get_post_thumbnail_id();?>
                        <?php 
                        //Image/////////////////////////////////////////  
                        //$image_id= ''; // use ID of image instead of ACF 
                        $post_id = '';
                        //$imageField = 'main_image'; // slug of image field
                        $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                        $imageSize = 'xl'; //  //
                        $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
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

                        <div class="caption p-t-0-half-em mob-p-t-1-em"><?php echo get_the_title(); ?></div>
                    </a>
                    
                    <div class="wrap-price" style="margin-bottom: 10px !important;">
                        <!-- <span class="price"><php echo $product->get_price_html(); ?></span>     -->
                    </div>

                    <?php
                    global $product; // Ensure you have access to the product object
                    if ( $product ) {
                        if ( $product->get_price_html() ) {
                            if ($product->is_type( 'variable' )) {
                                $product_url = get_permalink( $product->get_id() );
                    ?>
                        <a href="<?php echo get_the_permalink() ?>" class="product-link button product-act-select">Select Options</a>                             
                    <?php
                            } else {
                                ?>
                            
                            <form class="cart" method="post" enctype="multipart/form-data">
                            <button type="submit" class="button alt product-act-add"
                            
                            >Add to Cart</button>
                            <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID(); ?>" />
                            </form>
                    <?php

                            }   
                        
                    ?>
                    <?php
                        
                        }
                    }
                    ?>
                    
                </article><!-- /col -->            


                <?php endwhile; ?>
            
                <?php wp_reset_postdata(); ?>

                <?php endif; ?>

        </div><!-- /row -->
	</div><!-- /container -->
</section>




<?php if(get_field( 'text_below_products' )){ ?>
    <section class="content-section extra-text p-t-2 mob-p-t-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-sm-6 col-sm-offset-6 text40  p-b-1 mob-p-b-2">
                    <?php echo get_field( 'text_below_products', $term_id_prefixed ); ?>
                </div>
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
<?php } ?>


<?php get_template_part( 'footer'); ?>