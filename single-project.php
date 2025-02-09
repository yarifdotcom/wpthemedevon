<?php /** The Template for displaying all single posts */?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <section class="title-section top-space p-b-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-sm-10 text10">
                    <h1><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    <section class="top-section p-b-1">
        <div class="container-fluid">
            <div class="row">

                <div class="col col-sm-8 text50">
                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'main_image'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xl'; //  //
                    $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $forceRatio = ''; // force image to specific ratio // 
                    $outerClasses = ''; // 'imgOuter' additional classes
                    $holderClasses = 'imgCover '; // 'imgHolder imgSpaced' additional classes
                    $imgClasses = ''; // 'img' additional classes
                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                    $loading = 'lazy'; // lazy or eager
                    include( locate_template( 'snippets/image.php', false, false ) ); 
                    ?>   	
                </div>           
                
                <div class="col col-sm-3">
                    <div class='text50'>
                        <?php echo get_field('text');?>
                    </div>
                </div><!-- /col -->	

            </div><!-- /row -->
        </div><!-- /container -->
    </section>


    <section class="main-section">
        <article>
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-sm-12 text60">

                    </div><!-- /col -->	
                </div><!-- /row -->
            </div><!-- /container -->				
        </article>			
    </section>

<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>