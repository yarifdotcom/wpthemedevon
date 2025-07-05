<?php 
/*
Template Name: Account Custom
*/
?>

<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 

//die(__FILE__);

?>

     <section class="title-section">
        <div class="container-fluid no-max">
            <div class="row justify-content-center text-center">
                <div class="col col-sm-12 text20 serif text-center pt-25em pb-15em fs-13vw pb-mobile-3">
                    <h1><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    <section class="content-section mob-spaceBelowDouble mob-p-b-2">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-center">    
                <div class="col col-sm-12 text40 wc-my-account" >
                    <?php echo get_field( 'text' ); ?>
                    <?php the_content( ); ?>
                    
                    
                    
                </div><!-- /col -->
            </div>
            
        </div><!-- /container -->
    </section>


<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>

