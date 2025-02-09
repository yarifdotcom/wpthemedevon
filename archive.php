<?php /* The template for displaying Archive pages. */?>
<?php get_template_part( 'header'); ?>

<section class="title-section top-space p-b-1">
	<div class="container-fluid">
		<div class="row">
			<div class="col col-sm-10 text10">
				<?php if ( is_day() ) : ?>
				<h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h1>							
				<?php elseif ( is_month() ) : ?>
				<h1>Archive: <?php echo  get_the_date( 'M Y' ); ?></h1>	
				<?php elseif ( is_year() ) : ?>
				<h1>Archive: <?php echo  get_the_date( 'Y' ); ?></h1>								
				<?php else : ?>
				<h1>Archive</h1>	
				<?php endif; ?>
			</div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</section>

<?php if ( have_posts() ): 
    
    die("check oh!");
    
    ?>

    <section class="content-section">
        <div class="container-fluid">
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="col col-sm-12">
                        <h2 class="text30"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <time  class="text60" datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php //comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>

                        <div class="col col-sm-8 text60">
                            <?php 
                            //Image/////////////////////////////////////////  
                            $image_id= ''; // use ID of image instead of ACF 
                            $imageField = 'image'; // slug of image field
                            $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                            $imageSize = 'xl'; //  //
                            $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                            $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                            $forceRatio = ''; // force image to specific ratio // 
                            $outerClasses = ''; // 'imgOuter' additional classes
                            $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                            $imgClasses = ''; // 'img' additional classes
                            $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                            $loading = 'lazy'; // lazy or eager
                            include( locate_template( 'snippets/image.php', false, false ) ); 
                            ?>   
                        </div>

                    </article><!-- /col -->
                <?php endwhile; ?>
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

<?php get_template_part( 'footer'); ?>