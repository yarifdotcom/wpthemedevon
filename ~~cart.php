<?php 
/*
Template Name: Cart Custom
*/
?>

<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 

//die(__FILE__);

?>

     <section class="title-section ">
        <div class="container-fluid no-max">
            <div class="row justify-content-center text-center">
                <div class="col col-sm-12 text20 serif text-center pt-25em pb-15em">
                    <h1><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    <section class="content-section ">
        <div class="container-fluid ">
            <div class="d-flex justify-content-center">
                <div class="row">
                                
                        <div class="col col-sm-12 text40 " >
                            <?php echo get_field( 'text' ); ?>
                            <?php the_content( ); ?>
                            
                            
                            
                        </div><!-- /col -->
    
    
                    
                    
                    
                </div><!-- /row -->
            </div>
            
        </div><!-- /container -->
    </section>


<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>

