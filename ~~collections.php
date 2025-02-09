<?php 
/*
Template Name: Collections
*/
?>
<?php get_template_part( 'header'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>





<section id="collections-section" class="p-t-2 p-b-1">
    <div class="container-fluid p-b-1">
        <div class="row">
            <div class="col col-sm-12">
                <h1 class="text10 serif">Collections</h1>
            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
        
        
    <div class="container-fluid ">
        <div class="row slider-outer">
            
               <?php 
                $terms = get_terms( 'collection' );
                foreach ( $terms as $term ) {
                    // The $term is an object, so we don't need to specify the $taxonomy.
                    $term_link = get_term_link( $term );
                    $term_id_prefixed = 'collection' .'_'. $term->term_id;
                    // If there was an error, continue to the next term.
                    if ( is_wp_error( $term_link )) {
                        continue;
                    }
                    ?>
                
                        <div class="slide col col-sm-6 p-b-1">
                            <a href="<?php echo $term_link; ?>">
                                <div class="text-col">
                                    <h2 class="text20 serif display-inline vertical-align-middle"><?php echo $term->name ;?></h2><span class="lozenge text70 loose-kern-10 uppercase margin-left">View Collection</span>
    <?php /* ?>

                                    <div class="collection-text p-t-2-em">
                                        <?php echo get_field( 'text', $term_id_prefixed ); ?>
                                    </div>
    <?php */ ?>
                                </div>


                                <div class="collection-image">

                                       

                                    <?php $video = get_sub_field( 'video' ); ?>     

                                    <?php if($video){ ?>


                                        <?php 
                                        //Image/////////////////////////////////////////  
                                        $image_id= ''; // use ID of image instead of ACF 
                                        $imageField = 'vimeo_poster'; // slug of image field
                                        $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                        $imageSize = 'xxl'; //  //
                                        $sizes = '(min-width: 768px) 100vw, 100vw'; // src-set sizes //
                                        $sizesPortrait = '(min-width: 768px) 100vw, 100vw'; // src-set sizes //
                                        $forceRatio = ''; // force image to specific ratio // 
                                        $outerClasses = 'gallery-slide'; // 'imgOuter' additional classes
                                        $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                        $imgClasses = ''; // 'img' additional classes
                                        $dataOnly = true; // add src-set fields to data-src-set for js usage
                                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                        $loading = 'eager'; // lazy or eager
                                        include( locate_template( 'snippets/image.php', false, false ) ); 
                                        ?>                                   


                                        <?php 
                                        $vidSrc = '<iframe frameborder="0" src="https://player.vimeo.com/video/' . $video. '?background=1" loading="eager"></iframe>';
                                        ?>
                                        <div class="item itemVideo embedVideo vidHolder" data-src='<?php echo $vidSrc;?>'>
                                            <?php echo $vidSrc;?>
                                        </div>

                                    <?php } else { ?>    
                                        <?php //$image_id = get_field('image', $term_id_prefixed, false); ?>

                                        <?php 
                                        //Image/////////////////////////////////////////  
                                        $image_id = get_field('image', $term_id_prefixed, false); // use ID of image instead of ACF 
                                        $imageField = 'image'; // slug of image field
                                        $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                        $imageSize = 'xl'; //  //
                                        $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                                        $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                        $forceRatio = '70'; // force image to specific ratio // 
                                        $outerClasses = ''; // 'imgOuter' additional classes
                                        $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                        $imgClasses = ''; // 'img' additional classes
                                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                        $dataOnly = false; // add src-set fields to data-src-set for js usage
                                        $loading = 'lazy'; // lazy or eager
                                        include( locate_template( 'snippets/image.php', false, false ) ); 
                                        ?>  
                                    
                                    <?php } ?>
                                    
                                    
                                    

                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            </a>

                        </div>
                
                

                    <?php 
                    }
                    ?>            
            
        </div><!-- /row -->
        
        
    </div><!-- /container -->
</section>














<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>