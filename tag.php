<?php /** The template used to display Tag Archive pages */ ?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ): ?>
<section class="titleSection">
	<div class="container">
		<div class="row">
			<div class="col col-sm-12">
				<h1>Tag Archive: <?php echo single_tag_title( '', false ); ?></h1>
			</div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</section>

<section class="contentSection">
	<div class="container">
		<div class="row">
<?php while ( have_posts() ) : the_post(); ?>
			<article class="col col-sm-4">
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php if(get_field('title_control')){echo get_field('title_control');} else { 	echo get_the_title();} ?></a></h2>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php //comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
				<?php the_content(); ?>
			</article><!-- /col -->
<?php endwhile; ?>
		</div><!-- /row -->
	</div><!-- /container -->
</section>

<?php else: ?>
<section class="titleSection">
	<div class="container">
		<div class="row">
			<article class="col col-sm-12">
				<h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
			</article><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</section>
<?php endif; ?>

<?php get_template_part( 'footer'); ?>