<?php /** * The main template file */?>
<?php get_template_part( 'header'); ?>


<section class="title-section p-t-3 p-b-1">
	<div class="container-fluid  noMax">
		<div class="row">
            <div class="col col-sm-5-half col-sm-offset-6 ">
                <h1 class="text10 serif display-inline vertical-align-middle">Journal</h1>
            </div>    
        </div>
        
    </div>
    
</section>


<?php if($wp_query->post_count < 5){$countStyle = 'small-grid';} else {$countStyle = '';}?>


<section class="content-section tax-grid mob-p-b-2 <?php echo $countStyle; ?>">
	<div class="container-fluid">
		<div class="row count-<?php echo $wp_query->post_count;?>">
            
            <div class="border-left left-line"></div>
            <div class="border-left centre-line"></div>
            <div class="border-left right-line"></div>
            
            
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <article class="col col-sm-3 text60 uppercase p-b-1-col mob-p-b-3-em">
                    <a href="<?php echo get_the_permalink(); ?>" >

                        <?php 
                        //Image/////////////////////////////////////////  
                        $image_id= ''; // use ID of image instead of ACF 
                        $post_id = '';
                        $imageField = 'main_image'; // slug of image field
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
            
            
            
                 <nav class="navigation col col-sm-12 m-t-1 ">

                    <p class="text60"><?php // posts_nav_link(); ?>

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





<?php // get_template_part( 'snippets/blog-loop'); ?>

<?php get_template_part( 'footer'); ?>
