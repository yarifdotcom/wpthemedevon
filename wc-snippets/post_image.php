
<div id="enlarge-svg">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" ><polygon points="1.9,0 1.9,0.5 1.9,0.5 1.9,0.5 1.9,0.9 2.4,0.9 38.4,0.9 20.4,19 0,39.3 0.7,40 21,19.6 39.1,1.6 39.1,37.6 39.1,38.1 39.5,38.1 39.5,38.1 39.5,38.1 40,38.1 40,0 "/></svg>
</div>


<div id="enlarge-holder"> 
    
</div>

 
</div><!--/col-->
            
            <div class="col col-sm-4-half quote-col">
                <div class="title-holder text10 serif p-b-0-half">

                    <?php 
                    if(get_field( 'secondary_title_text' ) && get_field( 'title_control' )){?>
                        <div class="text10"><?php the_field( 'title_control' ); ?></div>
                        <div class="text20 secondary-placeholder"><?php the_field( 'secondary_title_text' ); ?></div>
                    <?php
                    } else if(get_field('title_control')){
                    ?>
                        <div class="text10"><?php the_field( 'title_control' ); ?></div>
                    <?php
                    } else {
                    ?> 
                        <div class="text10"><?php the_title(); ?></div>
                    <?php
                    } 
                    ?>                            
                
                </div>                      



       
 
    