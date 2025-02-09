<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 

// die("check uh!");

?>
<section class="title-section top-space p-b-1">
	<div class="container-fluid">
		<div class="row">
            <div class="col col-sm-12 text10">
                <h1><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1>
            </div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</section>

<section class="content-section">
	<div class="container-fluid">
		<div class="row">
            <div class="col col-sm-12">
                <?php the_content(); ?>
            </div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</section>
<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>