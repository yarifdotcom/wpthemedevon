<?php 
/*
Template Name: Home Page Template
*/
?>
<?php get_template_part( 'header'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section id="gallery-section" class="title-section p-b-3 mob-p-b-3-em">
	<div class="container-fluid full-width no-max">
		<div class="row">
            <div class="col col-sm-12 text10">

                

                
                    <?php if ( have_rows( 'landing_image' ) ) : ?>
                        <?php while ( have_rows( 'landing_image' ) ) : the_row(); ?>
                
                
                            <?php $video = get_sub_field( 'video' ); ?>     
                            <?php if($video){$vidClasses = 'vid-item';}?>   
                
                            <div class="gallery-item <?php echo $vidClasses;?>">
                    
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $imageField = 'image'; // slug of image field
                                $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xxl'; //  //
                                $sizes = '(min-width: 768px) 100vw, 50vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 100vw, 50vw'; // src-set sizes //
                                $forceRatio = ''; // force image to specific ratio // 
                                $outerClasses = 'gallery-slide'; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $dataOnly = true; // add src-set fields to data-src-set for js usage
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $loading = 'eager'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>   
                
                

                                <?php if($video){ ?> 

                                    <?php 
                                    $vidSrc = '<iframe frameborder="0" src="https://player.vimeo.com/video/' . $video. '?background=1" loading="lazy"></iframe>';
                                    //$vidSrc = '<iframe frameborder="0" src="https://player.vimeo.com/video/' . $video. '?background=1" ></iframe>';
                                    ?>
                                    <div class="item itemVideo embedVideo vidHolder" data-src='<?php echo $vidSrc;?>'>
                                        <?php //echo $vidSrc;?>
                                    </div>

                                <?php } ?>

                                
                            </div>
                
                
                
                        <?php endwhile; ?>
                    <?php endif; ?>    
                    
                    
                

                
            </div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</section>


<section id="intro-section" class="text-section p-b-3 mob-p-b-2">         
    <div class="container-fluid ">
        <div class="row">
            <div class="col col-sm-6 col-sm-offset-6">
                <h1 class="text20 serif"><?php echo get_field( 'intro_text' ); ?></h1>

                <?php $intro_link = get_field( 'intro_link' ); ?>
                <?php if ( $intro_link ) : ?>
                    <a href="<?php echo esc_url( $intro_link); ?>" class="lozenge text70 mob-text80 loose-kern-10 uppercase margin-left mob-m-t-2-em mob-inline-block"><?php echo get_field( 'link_text' ); ?></a>
                <?php endif; ?>

            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
</section>



<section id="collections-section" class="p-b-2 ">
    <div class="container-fluid p-b-0-half-em ">
        <div class="row">
            <div class="col col-sm-10 collections-col">
                <h2 class="text10 mob-text20 serif">Collections:</h2>
            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
        
        
    <div class="container-fluid full-width no-max ">
        <div class="row slider-outer">
            
            <div class="col col-xs-12 col-sm-11 col-sm-offset-1 slider collections-slider">
               <?php 
                $terms = get_terms( 'collection' );
                foreach ( $terms as $term ) {
                    // The $term is an object, so we don't need to specify the $taxonomy.
                    $term_link = get_term_link( $term );
                    $term_id_prefixed = 'collection' .'_'. $term->term_id;
                    // If there was an error, continue to the next term.
                    if ( is_wp_error( $term_link )  ) {
                        continue;
                    }
                    
                    if ( get_field( 'show_this_collection_in_menu_and_home_page', $term_id_prefixed ) == 1   ) {

                    ?>
                
                        <div class="slide row sub-row">

                            <div class="col col-sm-5-half text-col">
                                <h2 class="text10 serif col-sm-offset-1-half display-inline mob-block vertical-align-middle mob-p-t-0-third-em"><?php echo $term->name ;?></h2> <a href="<?php echo $term_link; ?>" class="lozenge text70 loose-kern-10 uppercase margin-left mob-m-t-1em mob-inline-block mob-text80">View&nbsp;Collection</a>
                                <div class="collection-text p-t-2-em">
                                    <?php echo get_field( 'text', $term_id_prefixed ); ?>
                                </div>
                            </div>


                            <div class="collection-image col col-sm-5-half col-sm-offset-1">

                                <?php //$image_id = get_field('image', $term_id_prefixed, false); ?>

                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id = get_field('vertical_image', $term_id_prefixed, false); // use ID of image instead of ACF 
                        
                                if(!$image_id){$image_id = get_field('image', $term_id_prefixed, false);} // use ID of image instead of ACF 
                        
                                $imageField = 'image'; // slug of image field
                                $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                $forceRatio = '115'; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>  
                            </div>

                        </div>
                    <?php
                    }
                    ?>                

                <?php 
                }
                ?>            
            
            </div><!-- /col -->
        </div><!-- /row -->
        
        
    </div><!-- /container -->
</section>





<section id="featured-small-section" class="p-b-2 tax-grid product-grid ">
    <div class="container-fluid  no-max">
        <div class="row sm-row extend-border">


                <?php $featured_small_gallery = get_field( 'featured_small_gallery' ); ?>
                <?php if ( $featured_small_gallery ) : ?>
                
                    
                    <?php foreach ( $featured_small_gallery as $post ) :  ?>
                        <?php setup_postdata( $post ); ?>
                
                            <article class="col col-sm-3 text50 uppercase p-b-1-col">
                                <a href="<?php echo get_the_permalink(); ?>" class="product-link">

                                    <?php $image_id = get_post_thumbnail_id();?>
                                    <?php 
                                    //Image/////////////////////////////////////////  
                                    //$image_id= ''; // use ID of image instead of ACF 
                                    $post_id = '';
                                    //$imageField = 'main_image'; // slug of image field
                                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                    $imageSize = 'xl'; //  //
                                    $sizes = '(min-width: 768px) 25vw, 60vw'; // src-set sizes //
                                    $sizesPortrait = '(min-width: 768px) 25vw, 60vw'; // src-set sizes //
                                    $forceRatio = '100'; // force image to specific ratio // 
                                    $outerClasses = ''; // 'imgOuter' additional classes
                                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                    $imgClasses = ''; // 'img' additional classes
                                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                                    $loading = 'lazy'; // lazy or eager
                                    include( locate_template( 'snippets/image.php', false, false ) ); 
                                    ?>  

                                    <div class="caption p-t-0-half-em"><?php echo get_the_title(); ?></div>
                                </a>

                            </article><!-- /col -->
                    
                    
                    
                    
                    
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                
                
                
                
                <?php endif; ?>



        </div><!-- /row -->        
        
        
    </div><!-- /container -->
    
</section>





<section id="featured-section" class="p-b-1 m-b-2 mob-p-b-0">
    <div class="container-fluid ">
        <div class="row p-b-0-half-em">
            <div class="col col-sm-12">
                <h2 class="text10 mob-text20 serif">Featured:</h2>
            </div><!-- /col -->
        </div><!-- /row -->
        
        <div class="row product-grid">
            <div class="col col-sm-12 slider featured-slider">
                
                <?php if ( have_rows( 'featured_large_gallery' ) ) : ?>
                    <?php while ( have_rows( 'featured_large_gallery' ) ) : the_row(); ?>
                        <div class="slide mob-p-t-1-em">
                
                            <?php $product = get_sub_field( 'product' ); ?>
                            
                            
                            <?php if ( $product ) : ?>
                                <?php $post = $product; ?>
                                <?php setup_postdata( $post ); ?> 
                                    <div class="text30 featured-header p-b-0-half-em">
                                        <a href="<?php the_permalink(); ?>" class="product-link mob-text40"><?php the_title(); ?></a><br>
                                        
                                        <a href="<?php the_permalink(); ?>" class="lozenge text70 mob-text80 loose-kern-10 uppercase featured-button product-link">View</a>
                                        
                                    </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                            
                            <?php 
                            $image_id = get_sub_field('large_image', false, false);
                            $image = wp_get_attachment_image_src($image_id, 'xl');

                            if($image){
                                $imgwidth = $image[1];
                                $imgheight = $image[2];

                                $imgRatio = $imgheight / $imgwidth * 100;
                                $imgRatio = floor($imgRatio * 10) / 10 ;  
                                $isPortrait = '';
                                if($imgRatio > 100){
                                    $isPortrait = 'portrait ';
                                } 
                            }   
                            ?>
                            <div class="featured-image large-image <?php echo $isPortrait;?>">
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $imageField = 'large_image'; // slug of image field
                                $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 40vw, 40vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 40vw, 40vw'; // src-set sizes //
                                $forceRatio = ''; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?> 
                            </div>
                            
                            
                             <?php 
                            $image_id = get_sub_field('small_image', false, false);
                            $image = wp_get_attachment_image_src($image_id, 'xl');

                            if($image){
                                $imgwidth = $image[1];
                                $imgheight = $image[2];

                                $imgRatio = $imgheight / $imgwidth * 100;
                                $imgRatio = floor($imgRatio * 10) / 10 ;  
                                $isPortrait = '';
                                if($imgRatio > 100){
                                    $isPortrait = 'portrait ';
                                } 
                            }   
                            ?>                                   
                            <div class="featured-image small-image <?php echo $isPortrait;?>">
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $imageField = 'small_image'; // slug of image field
                                $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 25vw, 25vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 25vw, 25vw'; // src-set sizes //
                                $forceRatio = ''; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>  
                            </div>
                            
                            
                            
                            
                            
                            
                        </div>

                    <?php endwhile; ?>
                
                <?php endif; ?>
                
                
            </div><!-- /col -->
        </div><!-- /row -->        
        
        
    </div><!-- /container -->
    
</section>








<section id="insitu-section" class="p-b-1">
    <div class="container-fluid full-width no-max">
        <div class="row ">
                <?php $featured_in_situ = get_field( 'featured_in_situ' ); ?>
                <?php if ( $featured_in_situ ) : ?>
                    <?php $post = $featured_in_situ; ?>
                    <?php setup_postdata( $post ); ?> 
                    <div class="col col-sm-11">
                        <?php 
                        //Image/////////////////////////////////////////  
                        $image_id= ''; // use ID of image instead of ACF 
                        $imageField = 'main_image'; // slug of image field
                        $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                        $imageSize = 'xl'; //  //
                        $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                        $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                        $forceRatio = ''; // force image to specific ratio // 
                        $outerClasses = ''; // 'imgOuter' additional classes
                        $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                        $imgClasses = ''; // 'img' additional classes
                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                        $dataOnly = false; // add src-set fields to data-src-set for js usage
                        $loading = 'lazy'; // lazy or eager
                        include( locate_template( 'snippets/image.php', false, false ) ); 
                        ?>  
                    </div><!-- /col -->
            
                    <div class="col col-sm-4 col-sm-offset-6 p-t-0-third text-col">
                        <div class="m-b-0-half-em">
                            Featured In Situ
                        </div>
                        
                        <span class="text10 serif vertical-align-middle">
                            <?php the_title(); ?>
                        </span>
                        <a  class="lozenge text70 mob-text80 loose-kern-10 uppercase margin-left" href="<?php the_permalink(); ?>">View</a>
                    </div>
                    <div class="col col-sm-3 col-sm-offset-6 p-t-2-em  text-col">
                        <?php echo get_field('excerpt'); ?>
                    </div>            
            
            
            
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>


        </div><!-- /row -->        
        
        
    </div><!-- /container -->
    
</section>










<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>