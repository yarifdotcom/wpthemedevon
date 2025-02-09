<?php if ( have_posts() ): 
    
die(__FILE__);    
    
?>

<section class="content-section">
	<div class="container-fluid">
		<div class="row archive-row">
            <?php while ( have_posts() ) : the_post(); ?>

                <article class="col col-sm-4 p-b-1 three-across">
                    <a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark">
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
                        $holderClasses = 'imgCover '; // 'imgHolder imgSpaced' additional classes
                        $imgClasses = ''; // 'img' additional classes
                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                        $loading = 'lazy'; // lazy or eager
                        include( locate_template( 'snippets/image.php', false, false ) ); 
                        ?>   
                        <h2 class="text50"><?php the_title(); ?></h2>
                        <?php /* ?><time class="text60" datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?><?php the_time(); ?></time><?php */ ?>                
                    </a>
                </article><!-- /col -->

            <?php endwhile; ?>

            <nav class="navigation">
                <p><?php posts_nav_link(); ?></p>
            </nav>                   
            
		</div><!-- /row -->
	</div><!-- /container -->
</section>


<?php else: ?>
    <section class="content-section">
        <div class="container-fluid">
            <div class="row">
                <article class="col col-sm-12 text30">
                    <h2>No posts to display</h2>
                </article><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>	
<?php endif; ?>


