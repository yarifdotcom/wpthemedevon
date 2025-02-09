<?php 
$count = 0;
if(is_array(get_field($carouselField))){
    $count = count(get_field($carouselField));
}
if(is_array(get_sub_field($carouselField))){
    $count = count(get_sub_field($carouselField));
}

if($count > 1){
    $isSlider = 1;
    $type = 'slider ';
}  else {
    $isSlider = 0;
    $type = 'single-image ';
}
if($sliderType){
    $type = $sliderType;
}
?>

<div class="<?php echo $type . $sliderClasses;?> ">

    <?php while ( have_rows( $carouselField ) ) : the_row(); ?>

            
        <div class="slide">

            <?php 
            //Image/////////////////////////////////////////  
            $image_id= ''; // use ID of image instead of ACF 
            $imageField = 'image'; // slug of image field
            $isSub = true; // set to true fo get_sub_field() instead of get_field() //
            $imageSize = 'xxl'; //  //
            $sizes = '(min-width: 768px) 100vw, 100vw'; // src-set sizes //
            $sizesPortrait = '(min-width: 768px) 50vw, 100vw'; // src-set sizes //
            $forceRatio = ''; // force image to specific ratio // 
            $outerClasses = ''; // 'imgOuter' additional classes
            $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
            $imgClasses = ''; // 'img' additional classes
            $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
            $loading = 'lazy'; // lazy or eager
            include( locate_template( 'snippets/image.php', false, false ) ); 
            ?>   

            <?php if(get_sub_field('caption')){?>
                <div class="caption-holder col-inner grey50">
                    <?php echo get_sub_field('caption');?>

                    <?php $post_object = get_sub_field( 'link' ); ?>
                    <?php if ( $post_object ): ?>
                        <?php $post = $post_object; ?>
                        <?php setup_postdata( $post ); ?> 

                            <br>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>    

                </div>
            <?php } ?>

        </div><!-- /slide -->                       





    <?php endwhile; ?>

</div><!-- /slider -->		                    


<?php if($count > 1){?>

    <div class="hover left-hover text40">
        <div class="circle">
            <div class="arrow arrow-left"></div>
        </div>
    </div>
    <div class="hover right-hover text40 ">
        <div class="circle">
            <div class="arrow"></div>
        </div>
    </div>               
<?php /* ?>

    <div  class="slider-count text40 lozenge">
        <p></p>
    </div>   
<?php */ ?>

<?php } 

$sliderClass = '';
?>

