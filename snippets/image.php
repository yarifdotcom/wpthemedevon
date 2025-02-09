<?php 
if(!$post_id){
  $post_id = false;  
}

if(!$image_id){
    if($isSub === true){
        $image_id = get_sub_field($imageField, $post_id, false);
    } else {
        $image_id = get_field($imageField, $post_id, false);
    } 
}
$image = wp_get_attachment_image_src($image_id, $imageSize);

if($image){
    if($forceRatio > 0){
        $imgRatio = $forceRatio;
    } else {
        $imgwidth = $image[1];
        $imgheight = $image[2];
        
        $imgRatio = $imgheight / $imgwidth * 100;
        $imgRatio = floor($imgRatio * 10) / 10 ;  
        
        if($imgRatio > 100){
            $outerClasses .= ' portrait';
            $sizes = $sizesPortrait;
        }        
    }
?>
    <div class="img-outer <?php echo $outerClasses;?>">
       <div class="img-holder img-spaced <?php echo $holderClasses;?>" style="padding-bottom:<?php echo $imgRatio;?>%;" >
            <?php
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            $image_tag = '<img src="'.$image[0].'" width="'.$image[1].
                       '" height="'.$image[2].'" alt="'.$image_alt.
                       '" class="size-'.$imageSize.' wp-image-'.$image_id. ' ' . $imgClasses .' img-responsive" loading="' . $loading . '" sizes="' . $sizes . '"/>';
            $image_tag = wp_image_add_srcset_and_sizes($image_tag,wp_get_attachment_metadata($image_id), $image_id);
                           
            if($dataOnly == true){$image_tag = str_replace("src", "data-src", $image_tag);}
                           
            echo $image_tag;
            ?>
        </div><!-- /imgHolder -->
    </div>
<?php                           
} // if image_id
$post_id = '';
?>
