<?php /** The Template for displaying all single posts */?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 


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

    <section class="content-section top-space p-b-0-half mob-p-b-2 p-t-3 mob-p-t-0">
        <div class="container-fluid p-t-1-em mob-p-t-0">
            <div class="row">
                
                
                
                    <?php if ( have_rows( 'journal_builder' ) ) : ?>
                        <?php while ( have_rows( 'journal_builder' ) ) : the_row(); ?>
                                
                                
                            <?php $video = get_sub_field( 'video' ); ?>
                           <?php if($video){ ?>
                                <div class="col col-sm-6 col-sm-offset-6 image-block p-b-1">    
                                    <?php 
                                    $vidSrc = '<iframe frameborder="0" src="https://player.vimeo.com/video/' . $video . '" loading="lazy"></iframe>';
                                    ?>
                                    <div class="item itemVideo embedVideo vidHolder" data-src='<?php echo $vidSrc;?>'>
                                        <?php echo $vidSrc;?>
                                    </div>
                                </div>

                            <?php } ?>                
                
                            <?php $image = get_sub_field( 'image' ); ?>
                
                            <?php if ( $image ) : ?>
                
                                <div class="col col-sm-6 col-sm-offset-6 image-block p-b-1">
                                    <?php 
                                    //Image/////////////////////////////////////////  
                                    $image_id= ''; // use ID of image instead of ACF 
                                    $imageField = 'image'; // slug of image field
                                    $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                    $imageSize = 'xl'; //  //
                                    $sizes = '(min-width: 768px) 50vw, 100vw'; // src-set sizes //
                                    $sizesPortrait = '(min-width: 768px) 40vw, 100vw'; // src-set sizes //
                                    $forceRatio = ''; // force image to specific ratio // 
                                    $outerClasses = ''; // 'imgOuter' additional classes
                                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                    $imgClasses = ''; // 'img' additional classes
                                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                    $dataOnly = false; // add src-set fields to data-src-set for js usage
                                    $loading = 'lazy'; // lazy or eager
                                    include( locate_template( 'snippets/image.php', false, false ) ); 
                                    ?>                                                          
                                </div><!-- /col -->
                                                
                                                
                            <?php endif; ?>
                            
                
                            <?php if(get_sub_field( 'text' )){ ?>
                                <div class="col col-sm-5 col-sm-offset-6 p-b-0-half text40 " >
                                    <?php echo get_sub_field( 'text' ); ?>
                                </div><!-- /col -->
                            <?php } ?>
                    
                    
                        <?php endwhile; ?>

                    <?php endif; ?>  
                
                
                
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>