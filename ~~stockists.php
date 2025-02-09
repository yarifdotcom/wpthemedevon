<?php 
/*
Template Name: Stockists/Showroom
*/
?>
<?php get_template_part( 'header'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


    <section class="title-section top-space p-b-0-half p-t-3">
        <div class="container-fluid no-max">
            <div class="row">
                <div class="col col-sm-8-half col-sm-offset-3 text20 serif">
                    <h1><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    <section class="top-section p-b-0-half mob-p-b-1"> 
        <div class="container-fluid no-max full-width">
            <div class="row">

                <div class="col col-sm-11 "> 
                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'image'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xxl'; //  //
                    $sizes = '(min-width: 768px) 100vw, 100vw'; // src-set sizes //
                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $forceRatio = ''; // force image to specific ratio // 
                    $outerClasses = ''; // 'imgOuter' additional classes
                    $holderClasses = 'imgCover '; // 'imgHolder imgSpaced' additional classes
                    $imgClasses = ''; // 'img' additional classes
                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                    $loading = 'eager'; // lazy or eager
                    include( locate_template( 'snippets/image.php', false, false ) ); 
                    ?>   	
                </div>           

            </div><!-- /row -->
        </div><!-- /container -->
    </section>


    <section class="showroom-section p-b-1"> 
        <div class="container-fluid no-max ">
            <div class="row">

                <div class="col col-sm-8 mob-p-b-1-em"> 
                    <h3 class="text20 serif">
                        <?php echo get_field( 'showroom_heading' ); ?>
                    </h3>
                    <div class="text50x p-t-1-em">
                        <?php echo get_field( 'showroom_text' ); ?>
                    </div>
                </div>     
                
                <div class="col col-sm-3 map-col greyscale multiply"> 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.600609013986!2d174.77969091615523!3d-36.85204017993809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d0d4f4d3835300f%3A0xd7d6f34274720abc!2sDevon%20Furniture!5e0!3m2!1sen!2snz!4v1665101435617!5m2!1sen!2snz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>     

            </div><!-- /row -->
        </div><!-- /container -->
    </section>


    <section class="stockists-section p-b-1 mob-p-b-2"> 
        <div class="container-fluid no-max ">
            <div class="row">

                <div class="col col-sm-8 p-b-2-em"> 
                    <h3 class="text20 serif">
                        <?php echo get_field( 'stockists_heading' ); ?>
                    </h3>
                </div>     


            </div><!-- /row -->
            
            
            <div class="row">
                
            <div class="border-left left-line"></div>
            <div class="border-left right-line"></div>
            <div class="border-left centre-line"></div>
                
                <?php if ( have_rows( 'stockists' ) ) : ?>
                    <?php while ( have_rows( 'stockists' ) ) : the_row(); ?>
                        <div class="col col-sm-3 p-b-0-half"> 
                            <div class="inner text50">
                                <div class="location p-b-1-em">
                                    <?php echo get_sub_field( 'location' ); ?>
                                </div>
                                <?php echo get_sub_field( 'text' ); ?>
                                <div class="map-link ">
                                    <a href="<?php echo get_sub_field( 'map_link' ); ?>" target="_blank">Map</a>
                                </div>
                            </div>
                        </div>     
                    <?php endwhile; ?>
                <?php endif; ?>
                

            </div><!-- /row -->            
            
            
            
            
        </div><!-- /container -->
    </section>



 		






<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>