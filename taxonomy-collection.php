<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>


<?php


// Define taxonomy prefix eg category
// Use term for all taxonomies
$taxonomy_prefix = 'collection';

// Define term ID
// Replace NULL with ID of term to be queried eg '123'
//$term_id = $curId;

// Example: Get the term ID in a term archive template
$term_id = get_queried_object_id();

// Define prefixed term ID
$term_id_prefixed = $taxonomy_prefix .'_'. $term_id;


$taxonomy = get_queried_object();

$taxCount = $taxonomy->count
?>

<section class="collection-content collection-top-gallery">
	<div class="container-fluid fullWidth noMax gallery-container">
		<div class="row">

            <div id="main-gallery-col" class="col col-sm-12 main-gallery-col">
                
                 <?php $video = get_field( 'vimeo_number', $term_id_prefixed, false ); ?>     

                    <?php if($video){ ?>


                        <?php 
                        //Image/////////////////////////////////////////  
                        $image_id = get_field('vimeo_poster', $term_id_prefixed, false); // use ID of image instead of ACF 
                        $imageField = 'image'; // slug of image field
                        $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                        $imageSize = 'xl'; //  //
                        $sizes = '(min-width: 768px) 100vw, 100vw'; // src-set sizes //
                        $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                        $forceRatio = '70'; // force image to specific ratio // 
                        $outerClasses = ''; // 'imgOuter' additional classes
                        $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                        $imgClasses = ''; // 'img' additional classes
                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                        $dataOnly = false; // add src-set fields to data-src-set for js usage
                        $loading = 'lazy'; // lazy or eager
                        include( locate_template( 'snippets/image.php', false, false ) ); 
                        ?>                                   


                        <?php 
                        $vidSrc = '<iframe frameborder="0" src="https://player.vimeo.com/video/' . $video. '?background=1" loading="eager"></iframe>';
                        ?>
                        <div class="item itemVideo embedVideo vidHolder" data-src='<?php echo $vidSrc;?>'>
                            <?php echo $vidSrc;?>
                        </div>

                    <?php } else { ?>    
                        <?php //$image_id = get_field('image', $term_id_prefixed, false); ?>

                        <?php 
                        //Image/////////////////////////////////////////  
                        $image_id = get_field('image', $term_id_prefixed, false); // use ID of image instead of ACF 
                        $imageField = 'image'; // slug of image field
                        $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                        $imageSize = 'xl'; //  //
                        $sizes = '(min-width: 768px) 100vw, 100vw'; // src-set sizes //
                        $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                        $forceRatio = '70'; // force image to specific ratio // 
                        $outerClasses = ''; // 'imgOuter' additional classes
                        $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                        $imgClasses = ''; // 'img' additional classes
                        $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                        $dataOnly = false; // add src-set fields to data-src-set for js usage
                        $loading = 'lazy'; // lazy or eager
                        include( locate_template( 'snippets/image.php', false, false ) ); 
                        ?>  

                    <?php } ?>                    

    
            </div>
        </div>
        
    </div>
    
	<div class="container-fluid noMax title-container">
		<div class="row">

            <div class="col col-sm-4-half main-gallery-col">

                <div class="title-holder white-text ">
                    <h1 class="text10 serif display-inline mob-display-block vertical-align-middle mob-p-t-0-half-em"><?php echo  $taxonomy->name; ?><br>Collection</h1><div class="count text50 display-inline-block vertical-align-text-top not-mobile">(<?php echo  $taxCount; ?>)</div>
                    
                    
                    
                </div>            
                
            </div>
        </div>
        
    </div>    
    
</section>


<section class="collection-content collection-text p-b-4-em">
	<div class="container-fluid  noMax">
		<div class="row">
            <div class="col col-sm-4-half title-holder text10 serif">
                <?php echo  $taxonomy->name; ?><br>Collection
            </div>    
            <div class="col col-sm-6 text40  col-sm-offset-1-half main-gallery-col p-t-6-em mob-p-t-1-em">
                <?php echo get_field( 'text', $term_id_prefixed ); ?>
            </div>
        </div>
        
    </div>
    
</section>

<?php if($taxCount < 5){$countStyle = 'small-grid';} else {$countStyle = '';}?>
<section class="content-section tax-grid product-grid mob-p-b-2 <?php echo $countStyle;?>">
	<div class="container-fluid">
		<div class="row">
            
            <div class="border-left left-line"></div>
            <div class="border-left centre-line"></div>
            <div class="border-left right-line"></div>            
            
            
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <article class="col col-sm-3 text60 uppercase p-b-1-col mob-p-b-3-em">
                    <a href="<?php echo get_the_permalink(); ?>" class="product-link">

                        <?php $image_id = get_post_thumbnail_id();?>
                        <?php 
                        //Image/////////////////////////////////////////  
                        //$image_id= ''; // use ID of image instead of ACF 
                        $post_id = '';
                        //$imageField = 'main_image'; // slug of image field
                        $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                        $imageSize = 'xl'; //  //
                        $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
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

                        <div class="caption p-t-0-half-em mob-p-t-1-em"><?php echo get_the_title(); ?></div>
                    </a>
                    
                </article><!-- /col -->


            <?php endwhile; ?>
		</div><!-- /row -->
	</div><!-- /container -->
</section>



<?php if(get_field( 'text_below_products', $term_id_prefixed )){ ?>
    <section class="content-section extra-text p-t-2 mob-p-t-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-sm-6 col-sm-offset-6 text40  p-b-1 mob-p-b-2">
                    <?php echo get_field( 'text_below_products', $term_id_prefixed ); ?>
                </div>
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
<?php } ?>





<?php get_template_part( 'footer'); ?>