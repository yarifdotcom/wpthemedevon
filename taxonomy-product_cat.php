<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>


<?php

// die(__FILE__);

// Define taxonomy prefix eg category
// Use term for all taxonomies
$taxonomy_prefix = 'product_cat';

// Define term ID
// Replace NULL with ID of term to be queried eg '123'
//$term_id = $curId;

// Example: Get the term ID in a term archive template
$term_id = get_queried_object_id();

// Define prefixed term ID
$term_id_prefixed = $taxonomy_prefix .'_'. $term_id;


$taxonomy = get_queried_object();

$taxCount = $taxonomy->count

?>




<section class="collection-content collection-text p-t-2 p-b-1">
	<div class="container-fluid  noMax">
		<div class="row">
            <div class="col col-sm-5-half col-sm-offset-6 ">
                <h1 class="text10 serif display-inline vertical-align-middle "><?php echo  $taxonomy->name; ?></h1><div class="count text50 display-inline-block vertical-align-text-top">(<?php echo  $taxCount; ?>)</div>
            </div>    
            <div class="col col-sm-6 col-sm-offset-6 main-gallery-col">
                <?php echo get_field( 'text', $term_id_prefixed ); ?>
            </div>
        </div>
        
    </div>
    
</section>

<?php if($taxCount < 5){$countStyle = 'small-grid';} else {$countStyle = '';}?>
<section class="content-section product-grid tax-grid mob-p-b-2 <?php echo $countStyle;?>">
	<div class="container-fluid">
		<div class="row">
            
            <div class="border-left left-line"></div>
            <div class="border-left centre-line"></div>
            <div class="border-left right-line"></div>
            
            
            
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <article class="col col-sm-3 text60 uppercase p-b-1-col mob-p-b-3-em">
                    <a href="<?php echo get_the_permalink(); ?>" class="product-link">

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
		</div><!-- /row -->
	</div><!-- /container -->
</section>


<?php if(get_field( 'text_below_products', $term_id_prefixed )){ ?>
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