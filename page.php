<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 

//die(__FILE__);

?>

     <section class="title-section top-space p-b-0-half p-t-3">
        <div class="container-fluid no-max">
            <div class="row">
                <div class="col col-sm-5 text20 serif">
                    <h1><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    <section class="content-section top-space p-b-0-half p-t-3">
        <div class="container-fluid p-t-1-em ">
            <div class="row">
                

                
                    <div class="col col-sm-5 col-sm-offset-6 p-b-0-half text40 " >
                        <?php echo get_field( 'text' ); ?>
                        <?php the_content( ); ?>
                        
                        
                        
                    </div><!-- /col -->


                
                
                
            </div><!-- /row -->
        </div><!-- /container -->
    </section>


<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>