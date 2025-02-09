<?php /** The template for displaying Category Archive pages */ ?>
<?php get_template_part( 'header'); ?>

<section class="title-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col col-sm-10 text10">
				<h1>Category: <?php echo single_cat_title( '', false ); ?></h1>
			</div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</section>

<?php get_template_part( 'snippets/blog-loop'); ?>

<?php get_template_part( 'footer'); ?>