<?php /** Search results page */?>
<?php get_template_part( 'header'); ?>


<section class="titleSection p-t-3 p-b-1">
	<div class="container-fluid ">
		<div class="row">
			<div class="col col-sm-6 col-sm-offset-6  weight200 searchField">
			
                <?php //echo get_search_form(); ?>

                <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                    <label>
                        <span class="screen-reader-text"><?php echo _x( '', 'label' ) ?></span>
                        <input type="search" class="search-field text40 weight200"
                            placeholder="<?php echo esc_attr_x( 'Type Search', 'placeholder' ) ?>"
                            value="<?php echo get_search_query() ?>" name="s"
                            title="<?php echo esc_attr_x( '', 'label' ) ?>" />
                    </label>
                   <input type="submit" class="search-submit lozenge text80 "
                        value="<?php echo esc_attr_x( 'SEARCH', 'submit button' ) ?>" />
                </form>                 
                
                
						
			</div><!-- /col -->
			
		</div><!-- /row -->
	</div><!-- /container -->
</section>

<?php if($wp_query->post_count < 5){$countStyle = 'small-grid';} else {$countStyle = '';}?>
<section class="content-section tax-grid product-grid mob-p-b-2 <?php echo $countStyle; ?>">
	<div class="container-fluid">
		<div class="row">
            
            <?php if ( have_posts() ): ?>
            
            
                <div class="border-left left-line"></div>
                <div class="border-left centre-line"></div>
                <div class="border-left right-line"></div>



                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                    <article class="col col-sm-3 text60 uppercase p-b-1-col mob-p-b-3-em">
                        <a href="<?php echo get_the_permalink(); ?>" class="product-link">

                            <?php $image_id = get_post_thumbnail_id();?>
                            <?php $imageField = '';?>

                            <?php 
                            if(!$image_id){
                                $imageField = 'main_image';
                                
                                $testImage = get_field($imageField);
                                
                                if(!$testImage){
                                    $imageField = 'image';
                                }                                
                                
                                $image_id = '';
                            }
                            ?>
                        
                            

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

                            <div class="caption p-t-0-half-em"><?php echo get_the_title(); ?></div>
                        </a>

                    </article><!-- /col -->


                <?php endwhile; ?>
            
            <?php else: ?>
            
                <article class="col col-sm-5 text40  p-b-1-col">
                    No results. Please try a more general search.


                </article>
            
            
            <?php endif; ?>
            
             <nav class="navigation col col-sm-6  ">

                <p class="text60">

                <?php    
                if ( get_previous_posts_link() ){
                    previous_posts_link( 'Previous page' );
                    // echo '<span class=""> | </span>';
                } else {
                    //echo '<span aria-hidden="true">Previous page</span>';
                }
                if ( get_previous_posts_link() && get_next_posts_link()){
                    echo '<span class=""> | </span>';
                }
                //echo '|';

                if ( get_next_posts_link() ){
                    next_posts_link( 'Next page' );
                } else {
                   // echo '<span aria-hidden="true"></span>';
                }
                    ?> 



                </p>

            </nav>            
                        
            
            
            
            
            
		</div><!-- /row -->
	</div><!-- /container -->
</section>


<?php get_template_part( 'footer'); ?>