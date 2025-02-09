<?php /** The Template for displaying all single posts */?>
<?php get_template_part( 'header'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <section class="title-section top-space p-b-0-half p-t-3">
        <div class="container-fluid no-max">
            <div class="row">
                <div class="col col-sm-5 text10 serif">
                    <h1><?php if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?></h1>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    <section class="top-section p-b-0-half"> 
        <div class="container-fluid no-max">
            <div class="row">

                <div class="col col-sm-12 text50"> 
                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'main_image'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xl'; //  //
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


    <section class="main-section p-b-1-half ">
        <article>
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-sm-5 col-sm-offset-6" >
                        <div class='text40'>
                            <?php echo get_field('text');?>
                        </div>
                    </div><!-- /col -->	
                </div><!-- /row -->
            </div><!-- /container -->				
        </article>			
    </section>




<?php if ( have_rows( 'content' ) ): ?>
	<?php while ( have_rows( 'content' ) ) : the_row(); ?>


		<?php if ( get_row_layout() == 'one_image' ) : ///////////////////?>



            <section class="content-section p-b-1 mob-p-b-2-em">
                <article>
                    <div class="container-fluid no-max">
                        <div class="row">
                            <div class="col col-sm-10 col-sm-offset-1" >
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $imageField = 'image'; // slug of image field
                                $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
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
                                

                            </div><!-- /col -->	
                        </div><!-- /row -->
                    </div><!-- /container -->				
                </article>			
            </section>




		<?php elseif ( get_row_layout() == 'two_images' ) : //////////////////////?>

            <section class="content-section p-b-1 mob-p-b-2-em">
                <article>
                    <div class="container-fluid no-max">
                        <div class="row">
                            <div class="col col-sm-6 mob-p-b-2-em" >
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $imageField = 'image'; // slug of image field
                                $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 50vw, 100vw'; // src-set sizes //
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
                                

                            </div><!-- /col -->	
                            
                            <div class="col col-sm-6" >
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $imageField = 'image_02'; // slug of image field
                                $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 50vw, 100vw'; // src-set sizes //
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
                                

                            </div><!-- /col -->	                            
                            
                        </div><!-- /row -->
                    </div><!-- /container -->				
                </article>			
            </section>


		<?php endif; ///////////////////////////////?>
	<?php endwhile; ?>

<?php endif; ?>




<section class="products-section tax-grid product-grid right-grid mob-p-b-2 mob-p-t-1">
	<div class="container-fluid">
		<div class="row">
                <div class="col col-sm-6 col-sm-offset-6">
                    
                    <h3 class="p-b-0-half-em">Featured Products</h3>
            
            <?php $in_situ_product_connection = get_field( 'in_situ_product_connection' ); ?>
            <?php if ( $in_situ_product_connection ) : ?>
                    
        <div class="row">
    
            <div class="border-left left-line"></div>
            <div class="border-left centre-line"></div>
    
    
    
                <?php foreach ( $in_situ_product_connection as $post ) :  ?> 
                    <?php setup_postdata( $post ); ?>
   
            
                <article class="col col-xs-6 col-sm-6 text50 uppercase p-b-1-col">
                    <a href="<?php echo get_the_permalink(); ?>" class="product-link" >
                        <?php $image_id = get_post_thumbnail_id();?>
                        <?php  
                        //Image/////////////////////////////////////////  
                        //$image_id= ''; // use ID of image instead of ACF 
                        $post_id = '';
                        //$imageField = 'main_image'; // slug of image field
                        $isSub = true; // set to true fo get_sub_field() instead of get_field() //
                        $imageSize = 'xl'; //  //
                        $sizes = '(min-width: 768px) 25vw, 100vw'; // src-set sizes //
                        $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                        $forceRatio = '100'; // force image to specific ratio // 
                        $outerClasses = ''; // 'imgOuter' additional classes
                        $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                        $imgClasses = ''; // 'img' additional classes
                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                        $dataOnly = false; // add src-set fields to data-src-set for js usage
                        $loading = 'lazy'; // lazy or eager
                        include( locate_template( 'snippets/image.php', false, false ) ); 
                        ?>  

                        <div class="caption p-t-0-half-em"><?php echo get_the_title(); ?></div>
                    </a>
                    
                </article><!-- /col -->

             <?php endforeach; ?>
    
                    </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>            
            
            </div>
            
		</div><!-- /row -->
	</div><!-- /container -->
</section>









<?php endwhile; ?>

<?php get_template_part( 'footer'); ?>