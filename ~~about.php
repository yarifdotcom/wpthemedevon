<?php 
/*
Template Name: About
*/
?>
<?php get_template_part( 'header'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<section id="intro-section" class="text-section p-t-3">
    <div class="container-fluid ">
        <div class="row">
            <div class="col col-sm-8 col-sm-offset-3 text20 serif">
                <?php echo get_field( 'intro_text' ); ?>

            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
</section>


<section id="main-image-section" class="image-section p-t-1">
    <div class="container-fluid full-width">
        <div class="row">
            <div class="col col-sm-11 ">
                <?php 
                //Image/////////////////////////////////////////  
                $image_id= ''; // use ID of image instead of ACF 
                $imageField = 'main_image'; // slug of image field
                $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                $imageSize = 'xl'; //  //
                $sizes = '(min-width: 768px) 80vw, 100vw'; // src-set sizes //
                $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                $forceRatio = ''; // force image to specific ratio // 
                $outerClasses = ''; // 'imgOuter' additional classes
                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                $imgClasses = ''; // 'img' additional classes
                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                $dataOnly = false; // add src-set fields to data-src-set for js usage
                $loading = 'eager'; // lazy or eager
                include( locate_template( 'snippets/image.php', false, false ) ); 
                ?>  

            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
</section>




<section id="second-section" class="text-section p-t-1">
    <div class="container-fluid ">
        <div class="row">
            <div class="col col-sm-8 col-sm-offset-3 p-b-1-col text20 serif">
                <?php echo get_field( 'second_text' ); ?>

            </div><!-- /col -->
        </div><!-- /row -->
        
        
        <div class="row">
            <div class="col col-sm-5 col-sm-offset-6 text40 ">
                <?php echo get_field( 'second_text_small' ); ?>
            </div><!-- /col -->
        </div><!-- /row -->
        
        
    </div><!-- /container -->
</section>


<section id="materials-section" class="text-section p-t-3 mob-p-t-1">
    <div class="container-fluid ">
        <div class="row">
            
            <div class="col col-sm-3 col-sm-offset-1  materials-col">
                <div class="inner p-b-2-em">
                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'image_01'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xl'; //  //
                    $sizes = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $forceRatio = ''; // force image to specific ratio // 
                    $outerClasses = ''; // 'imgOuter' additional classes
                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                    $imgClasses = ''; // 'img' additional classes
                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                    $loading = 'lazy'; // lazy or eager
                    include( locate_template( 'snippets/image.php', false, false ) ); 
                    ?>  
                

                    <div class="text40 p-b-0-half-em p-t-1-em"><?php echo get_field( 'title' ); ?></div>

                    <div class="text50"><?php echo get_field( 'text_01' ); ?></div>
                
            </div>
              

            </div><!-- /col -->
            
            
            <div class="col col-sm-3 col-sm-offset-0-half m-t-2 mob-m-t-1  materials-col">
                <div class="inner p-b-2-em">
                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'image_02'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xl'; //  //
                    $sizes = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $forceRatio = ''; // force image to specific ratio // 
                    $outerClasses = ''; // 'imgOuter' additional classes
                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                    $imgClasses = ''; // 'img' additional classes
                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                    $loading = 'lazy'; // lazy or eager
                    include( locate_template( 'snippets/image.php', false, false ) ); 
                    ?>  
                

                    <div class="text40 p-b-0-half-em p-t-1-em"><?php echo get_field( 'title_02' ); ?></div>

                    <div class="text50"><?php echo get_field( 'text_02' ); ?></div>
                </div>
                

            </div><!-- /col -->
            
            
            
            <div class="col col-sm-3 col-sm-offset-0-half m-t-4 mob-m-t-1 materials-col">
                <div class="inner p-b-2-em">
                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'image_03'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xl'; //  //
                    $sizes = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $forceRatio = ''; // force image to specific ratio // 
                    $outerClasses = ''; // 'imgOuter' additional classes
                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                    $imgClasses = ''; // 'img' additional classes
                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                    $loading = 'lazy'; // lazy or eager
                    include( locate_template( 'snippets/image.php', false, false ) ); 
                    ?>  


                    <div class="text40 p-b-0-half-em p-t-1-em"><?php echo get_field( 'title_03' ); ?></div>

                    <div class="text50"><?php echo get_field( 'text_03' ); ?></div>
                </div>

            </div><!-- /col -->
        </div><!-- /row -->
        

        
        
    </div><!-- /container -->
</section>


<section id="team-section" class="text-section p-t-3 mob-p-t-1 mob-p-b-2">
    <div class="container-fluid ">
        
        <div class="row p-b-1">
            <div class="col col-sm-12 text40 mob-p-b-0-quarter-em">
                <?php echo get_field( 'team_title' ); ?>
            </div><!-- /col -->
            <div class="col col-sm-12 p-b-1-col text20 serif">
                <?php echo get_field( 'team_text' ); ?>
            </div><!-- /col -->
        </div><!-- /row -->
        
        <?php if ( have_rows( 'team_members' ) ) : ?>
            <div class="row">
                <div class="col col-sm-6 col-sm-offset-6 ">
                    <div class="row">     
                        
                        <div class="border-left left-line"></div>
                        <div class="border-left centre-line"></div>
                        <?php while ( have_rows( 'team_members' ) ) : the_row(); ?>

                            <div class="col col-sm-6 p-b-0-half mob-p-b-1">
                                
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $imageField = 'image'; // slug of image field
                                $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 25vw, 100vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 25vw, 100vw'; // src-set sizes //
                                $forceRatio = ''; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>  
                                <?php if(get_sub_field( 'name' )){ ?>
                                    <div class="name text40 p-t-1-em">
                                        <?php echo get_sub_field( 'name' ); ?>
                                    </div>
                                <?php } ?>
                                
                                <?php if(get_sub_field( 'title' )){ ?>
                                    <div class="name text40  p-b-1-em mob-p-b-0-half-em">
                                        <?php echo get_sub_field( 'title' ); ?>
                                    </div>
                                <?php } ?>
                                
                                <?php if(get_sub_field( 'text' )){ ?>
                                    <div class="text text40 p-b-1-em mob-p-b-0-half-em">
                                        <?php echo get_sub_field( 'text' ); ?>
                                    </div>
                                <?php } ?>
                                
                                <?php if(get_sub_field( 'contact' )){ ?>
                                    <div class="contact text50">
                                        <?php echo get_sub_field( 'contact' ); ?>
                                    </div>
                                <?php } ?>
                            </div>


                        <?php endwhile; ?>


                    </div>                
                </div>
            </div>        
        <?php endif; ?>
        
        
        
        
        
    </div><!-- /container -->
</section>


















<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>