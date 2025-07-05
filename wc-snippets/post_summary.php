          



            <div class="main-description text40 p-b-0-half-em">
                <?php echo get_field( 'main_description' ); ?>
            </div>

            <div class="details text50">

                <!-- GAMBAR SPEK --> 
                <?php if (get_field('technical_drawing')){?>
            
                    <div class="p-t-0-half p-b-1-col">
                        <?php 
                        //Image/////////////////////////////////////////  
                        $image_id= ''; // use ID of image instead of ACF 
                        $imageField = 'technical_drawing'; // slug of image field
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
                    </div>

                <?php } ?>
                    

                <?php if ( have_rows( 'details' ) ) : ?>
                    <?php while ( have_rows( 'details' ) ) : the_row(); ?>
                
                        <div class="m-b-1-em">
                            <?php echo get_sub_field( 'heading' ); ?><br>
                            <?php echo get_sub_field( 'text' ); ?>

                            <?php if ( have_rows( 'files' ) ) : ?>
                                <?php while ( have_rows( 'files' ) ) : the_row(); ?>
                                    <?php $file = get_sub_field( 'file' ); ?>
                                    <?php if ( $file ) : ?>
                                        <?php 
                                            $append='';
                                            if ($file['subtype']=='pdf'){
                                                $append = ' (PDF)';
                                            }
                                        ?>
                                        <a href="<?php echo esc_url( $file['url'] ); ?>" class="file-download"><?php echo esc_html( $file['title'] ) . $append; ?></a><br>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                    <?php endwhile; ?>
                
                <?php endif; ?>
                
                
                <?php if ( is_user_logged_in() ) { ?>

                    <?php if ( have_rows( 'specifier_downloads' ) ) : ?>
                
                        <div class="m-b-1-em">
                            Specifier Downloads:<br>
                            <?php while ( have_rows( 'specifier_downloads' ) ) : the_row(); ?>
                                
                                <?php $file = get_sub_field( 'file' ); ?>
                                <?php if ( $file ) : ?>
                                    <a href="<?php echo esc_url( $file['url'] ); ?>"><?php echo get_sub_field( 'file_title' ); ?></a>
                                    <br>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>

                    <?php endif; ?>    

                <?php } else { ?>
                
                    <?php if ( have_rows( 'specifier_downloads' ) ) : ?>
                
                        <div class="m-b-1-em">
                            Specifier Downloads:<br>
                            <?php while ( have_rows( 'specifier_downloads' ) ) : the_row(); ?>
                                
                                <?php $file = get_sub_field( 'file' ); ?>
                                <?php if ( $file ) : ?>
                                    <?php echo get_sub_field( 'file_title' ); ?>
                                    <br>
                                <?php endif; ?>
                            <?php endwhile; ?>
                            
                            <div class="p-t-1-em"><a href="https://devon.co.nz/specifiers/"><?php echo get_field( 'specifier_request_text', 'option' ); ?></a></div>
                            
                        </div>

                    <?php endif; ?>    
                
                <?php }  ?>
               
            </div>



        </div><!--col from post_image -->
    </div><!--row from post_image -->
</section>

<?php if ( have_rows( 'image_array' ) ) : ?>

    <section class="product-content image-array p-t-1">
        <div class="container-fluid noMax">
            
	        <?php while ( have_rows( 'image_array' ) ) : the_row(); ?>
                <div class="row">
                    <div class="col col-sm-6">
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

                    </div>
                </div>

            
            <?php endwhile; ?>            
            
            
        </div>
    </section>


<?php endif; ?>



<?php $in_situ_product_connection = get_field( 'in_situ_product_connection' ); ?>
<?php if ( $in_situ_product_connection ) : ?>


    <section class="in-situ p-t-1">
        <div class="container-fluid noMax no-step">
            
            <div class="row">
                <div class="col col-sm-6">
                    <h4 class="text40 p-b-0-half-em">In Situ</h4>
                </div>
            </div>            
            <div class="row grid-row tax-grid count-<?php echo count($in_situ_product_connection);?>">
                
            <div class="border-left left-line"></div>
            <div class="border-left centre-line"></div>
            <div class="border-left right-line"></div>                
                
                <?php foreach ( $in_situ_product_connection as $post ) :  ?>
                    <div class="col col-sm-3 text50 uppercase p-b-1-col">
                        <?php setup_postdata( $post ); ?>
                            <a href="<?php echo get_the_permalink($post->ID); ?>" >
                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $post_id = $post->ID;
                                $imageField = 'main_image'; // slug of image field
                                $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                $forceRatio = '75'; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>  

                                <div class="caption p-t-0-half-em"><?php echo get_the_title($post->ID); ?></div>
                            </a>
                    </div>
                
                
                
                
                    
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                    
            </div>
        </div>
    </section>


<?php endif; ?>




<?php $collection = get_field( 'collection' ); ?>
<?php if ( $collection ) : ?>

            <?php $get_terms_args = array(
                'taxonomy' => 'collection',
                'hide_empty' => 0,
                'include' => $collection,
            ); ?>
            <?php $terms = get_terms( $get_terms_args ); ?>
            <?php if ( $terms ) : ?>
            
                    <?php foreach ( $terms as $term ) : ?>

                            <?php
                            // Define taxonomy prefix eg category
                            // Use term for all taxonomies
                            $taxonomy_prefix = 'collection';

                            // Define term ID
                            // Replace NULL with ID of term to be queried eg '123'
                            $term_id = $term->term_id;
                            
                            // Example: Get the term ID in a term archive template
                            // $term_id = get_queried_object_id();

                            // Define prefixed term ID
                            $term_id_prefixed = $taxonomy_prefix .'_'. $term_id;
                            ?>

<?php if ( get_field( 'show_this_collection_in_menu_and_home_page', $term_id_prefixed ) == 1   ) { ?>
                    
    <section class="collection p-t-1">
        <div class="container-fluid noMax">
            
            <div class="row">
                <div class="col col-sm-6 col-sm-offset-6">
                    <h4 class="text40 p-b-0-half-em">More from the Collection</h4>
                </div>
            </div>                        
                <div class="row grid-row extend-border">
                    
                    
                    
                        <div class="col col-sm-6 col-sm-offset-6 text50 uppercase p-b-1-col">
                            


                            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" >

                                <?php 
                                //Image/////////////////////////////////////////  
                                $image_id= ''; // use ID of image instead of ACF 
                                $post_id = $term_id_prefixed ;
                                $imageField = 'image'; // slug of image field
                                $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                $forceRatio = '75'; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>                              
                            
                                <div class="caption p-t-0-half-em"><?php echo esc_html( $term->name ); ?></div>
                            </a>
                            
                        </div>
                </div>
                    

        </div>
    </section>                    
                    
                    
              <?php } ?>      
                    
                    
                    <?php endforeach; ?>
                

            <?php endif; ?>


<?php endif; ?>

















    



    <?php //////// find term slugs for all chosen terms ;?>
    <?php $chosen_cats = ''; ?>
    <?php $chosen_cat_names = ''; ?>
    <?php $first_cat_id = ''; ?>

    <?php $category = get_field( 'category' ); ?>
    <?php if ( $category ) : ?>
        <?php $get_terms_args = array(
            'taxonomy' => 'product_cat',
            'hide_empty' => 0,
            'include' => $category,
        ); ?>
        <?php $terms = get_terms( $get_terms_args ); ?>
        <?php if ( $terms ) : ?>
            <?php foreach ( $terms as $term ) : ?>
                <?php $chosen_cats .= $term->slug . ', '; ?>
                <?php $chosen_cat_names .= $term->name . '<span> and </span>'; ?>

                <?php 
                if(!$first_cat_id){
                    $first_cat_id = $term->term_id;

                }
                ?>

            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php //////// ;?>
    <?php 
    global $post; // used below also
    $curId = $post->ID; // used below also


    $args = array(
        'numberposts'	=> 4,
        'post_type' => array('product'),
        'product_cat' => $chosen_cats,
        'exclude' => $curId
    );
    $related = get_posts( $args );?> 

    <?php if($related){?>

    <section class="category p-t-1 mob-m-b-2">
        <div class="container-fluid noMax">
            
            <div class="row">
                <div class="col col-xs-8 col-sm-6">
                    <h4 class="text40 p-b-0-half-em">More <?php echo $chosen_cat_names;?></h4>
                </div>
                
                <div class="col col-xs-4 col-sm-6 align-right text40">
                    <a href="<?php echo get_category_link($first_cat_id);?>">View all</a>
                </div>                
            </div>            
            <div class="row grid-row tax-grid no-step count-<?php echo count($related);?>">
            
                <div class="border-left left-line"></div>
                <div class="border-left centre-line"></div>
                <div class="border-left right-line"></div>       
                
                
                <?php foreach ( $related as $post ):  ?>
                    <?php setup_postdata ( $post ); ?>
                
                        <div class="col col-xs-6 col-sm-3 text60 uppercase p-b-1-col">
                            <a href="<?php echo get_the_permalink($post->ID); ?>" class="product-link">
                                
                                <?php $image_id = get_post_thumbnail_id($post->ID);?>
                                <?php 
                                //Image/////////////////////////////////////////  
                                //$image_id= ''; // use ID of image instead of ACF 
                                $post_id = '';
                                //$imageField = 'main_image'; // slug of image field
                                $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                                $imageSize = 'xl'; //  //
                                $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                                $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                                $forceRatio = '75'; // force image to specific ratio // 
                                $outerClasses = ''; // 'imgOuter' additional classes
                                $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                                $imgClasses = ''; // 'img' additional classes
                                $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                                $dataOnly = false; // add src-set fields to data-src-set for js usage
                                $loading = 'lazy'; // lazy or eager
                                include( locate_template( 'snippets/image.php', false, false ) ); 
                                ?>  
                            
                            
                                <div class="caption p-t-0-half-em"><?php echo get_the_title($post->ID); ?></div>
                            </a>
                        </div>                            
                            
                <?php endforeach; ?>          
                <?php wp_reset_postdata(); ?>
                
                
            </div>
        </div>
    </section>   

                












    <?php } ?>


                





