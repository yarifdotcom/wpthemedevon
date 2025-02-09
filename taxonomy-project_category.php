<?php /** The template for displaying all pages. */?>
<?php get_template_part( 'header'); ?>


<section class="title-section top-space p-b-1">
	<div class="container-fluid">
		<div class="row">
            <div class="col col-sm-10 text10">
                <?php 
                $tax = $wp_query->get_queried_object();
                $curTax = $tax->slug;
                // echo ''. $tax->name . '';
                ?>
                <h1>Projects</h1>
            </div><!-- /col -->

            <div class="col col-sm-6 cat-list text50">

                <?php $terms = get_terms( 'project_category' );

                echo '<ul>';

                echo '<li class="allwork"><a href="' . get_home_url()   . '/project/">All Work</a></li>';

                foreach ( $terms as $term ) {

                    if($term->slug === $curTax){$thisTax = 'curTax';} else {$thisTax = '';} 

                    // The $term is an object, so we don't need to specify the $taxonomy.
                    $term_link = get_term_link( $term );

                    // If there was an error, continue to the next term.
                    if ( is_wp_error( $term_link ) ) {
                        continue;
                    }

                    // We successfully got a link. Print it out.
                    echo '<li class="'. $thisTax . '"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
                }

                echo '</ul>';
                ?>

            </div><!-- /col -->
			
		</div><!-- /row -->
	</div><!-- /container -->
</section>

<?php $projectCount = 1;?>

<section class="content-section">
	<div class="container-fluid">
		<div class="row">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <article class="col col-sm-4 project<?php echo $projectCount++;?>">
                    <h2 class="text40"><a href="<?php esc_url( the_permalink() );?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                    <?php 
                    //Image/////////////////////////////////////////  
                    $image_id= ''; // use ID of image instead of ACF 
                    $imageField = 'image'; // slug of image field
                    $isSub = false; // set to true fo get_sub_field() instead of get_field() //
                    $imageSize = 'xl'; //  //
                    $sizes = '(min-width: 768px) 75vw, 100vw'; // src-set sizes //
                    $sizesPortrait = '(min-width: 768px) 33vw, 100vw'; // src-set sizes //
                    $forceRatio = ''; // force image to specific ratio // 
                    $outerClasses = ''; // 'imgOuter' additional classes
                    $holderClasses = 'img-cover '; // 'imgHolder imgSpaced' additional classes
                    $imgClasses = ''; // 'img' additional classes
                    $imgSpaced = true; // add padding, and img is position:aboslute to prevent layout shift
                    $loading = 'lazy'; // lazy or eager
                    include( locate_template( 'snippets/image.php', false, false ) ); 
                    ?>   

                </article><!-- /col -->

            <?php endwhile; ?>
		</div><!-- /row -->
	</div><!-- /container -->
</section>
<?php get_template_part( 'footer'); ?>