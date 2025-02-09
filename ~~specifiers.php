<?php 
/*
Template Name: Specifiers
*/
?>
<?php get_template_part( 'header'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


    <section class="title-section top-space p-b-0-half p-t-3">
        <div class="container-fluid no-max">
            <div class="row">
                
                <div class="col col-sm-4-half">
                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'image'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xl'; //  //
                    $sizes = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $forceRatio = ''; // force image to specific ratio // 
                    $outerClasses = ''; // 'imgOuter' additional classes
                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                    $imgClasses = ''; // 'img' additional classes
                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                    $loading = 'eager'; // lazy or eager
                    include( locate_template( 'snippets/image.php', false, false ) ); 
                    ?>  
                </div><!-- /col -->                
                
                <div class="col col-sm-5-half col-sm-offset-1-half">
                    <h1 class="text10 serif p-b-0-half-em"><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1> 
                    <div class="intro-text text40 p-b-1">
                        <?php echo get_field( 'text' ); ?>
                    </div>
                    
                    <div class="intro-text text50 p-b-1">
                        <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 2 ) ); ?>
                    </div>
                    
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    


 

<?php $in_situ_product_connection = get_field( 'in_situ' ); ?>
<?php if ( $in_situ_product_connection ) : ?>


    <section class="in-situ p-t-1">
        <div class="container-fluid noMax no-step">
            
            <div class="row">
                <div class="col col-sm-6">
                    <h4 class="text40 p-b-0-half-em">In Situ</h4>
                </div>
                <div class="col col-sm-6">
                    <h4 class="text40 p-b-0-half-em align-right"><a href="<?php echo get_post_type_archive_link( 'in_situ' );?>">View all</a></h4>
                </div>                
                
            </div>            
            <div class="row grid-row tax-grid count-<?php echo count($in_situ_product_connection);?>">
                
            <div class="border-left left-line"></div>
            <div class="border-left centre-line"></div>
            <div class="border-left right-line"></div>                
                
                <?php foreach ( $in_situ_product_connection as $post ) :  ?>
                    <div class="col col-sm-3 text50 uppercase p-b-1-col">
                        <?php setup_postdata( $post ); ?>
                            <a href="<?php echo get_the_permalink($post->ID); ?>" >
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $post_id = $post->ID;
                                $imageField = 'main_image'; // slug of image field
                                $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                $forceRatio = '75'; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>  

                                <div class="caption p-t-0-half-em"><?php echo get_the_title($post->ID); ?></div>
                            </a>
                    </div>
                
                
                
                
                    
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                    
            </div>
        </div>
    </section>


<?php endif; ?>








<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>