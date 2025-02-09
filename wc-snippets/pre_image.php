<section class="product-content product-top-gallery">
	<div class="container-fluid fullWidth noMax gallery-container">
		<div class="row">

            <div class="col col-sm-12 main-gallery-col">
                
                <?php //-------------------------------Carousel  ?>
                <?php //---------------------------------------  ?>
                <?php $carouselField = 'main_gallery'; // slug of gallery repeater field ?>
                <?php $sliderClasses = ''; // add additional classes to slider ?>
                <?php $sliderType = ''; // override type to allow different JS slider init ?>
                <?php include( locate_template( 'snippets/carousel.php', false, false ) ); ?>
    
            </div>
        </div>
        
    </div>
    
	<div class="container-fluid noMax title-container">
		<div class="row">



                        <?php //if(get_field('title_control')){echo get_field('title_control');} else { echo get_the_title();} ?>
                        
                        <?php 
                        if(get_field( 'secondary_title_text' ) && get_field( 'title_control' )){?>
                        <div class="col col-sm-4-half main-gallery-col serif">
                            <div class="title-holder" id="pin-main">
                                <h1>                      
                                    <div class="text10 mob-p-t-0-half-em"><?php echo get_field( 'title_control' ); ?></div>
                                </h1>
                            </div>    
                        </div>
            
                        <div class="col col-sm-12 secondary-gallery-col serif">
                            <div class="title-secondary " id="pin-secondary">
                                <h1>      
                                    <div class="text20"><?php echo get_field( 'secondary_title_text' ); ?></div>
                                </h1>
                            </div>  
                        </div>
                
                        <?php
                        } else if(get_field('title_control')){
                        ?>
                        <div class="col col-sm-4-half main-gallery-col serif">
                            
                            <div class="title-holder" id="pin-main">
                                <h1>        
                                    <div class="text10 mob-p-t-0-half-em"><?php echo get_field( 'title_control' ); ?></div>
                                </h1>
                            </div>  
                        </div>
                
                        <?php
                        } else {
                        ?> 
                        <div class="col col-sm-4-half main-gallery-col serif">
                            <div class="title-holder" id="pin-main">
                                <h1>                      
                                    <div class="text10 mob-p-t-0-half-em"><?php the_title(); ?></div>
                                </h1>
                            </div>     
                        </div>
                
                        <?php
                        } 
                        ?>                            
                        

                
                
                
                
                
                
                
        </div>
        
    </div>    
    
    
</section>
            
            
<section class="product-content product-main">
	<div class="container-fluid  noMax">            
            
		<div class="row">
            
            
            <?php 
            if(get_field('alt_image')){
                $galleryClasses="has-alt";
            }?>
            <div class="col col-sm-3 col-sm-offset-0-half woo-gallery-col <?php echo $galleryClasses;?>">
            <?php 
            if(get_field('alt_image')){?>
                
                <?php 
                //Image/////////////////////////////////////////  
                $image_id= ''; // use ID of image instead of ACF 
                $imageField = 'alt_image'; // slug of image field
                $isSub = false; // set to true fo get_sub_field() instead of get_field() //
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
                
            <?php } ?>
                
                