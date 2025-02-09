<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( '', 'label' ) ?></span>
        <input type="search" class="search-field text40 weight200"
            placeholder="<?php echo esc_attr_x( 'Type Search', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( '', 'label' ) ?>" />
    </label>
   <input type="submit" class="search-submit lozenge"
        value="<?php echo esc_attr_x( 'SEARCH', 'submit button' ) ?>" />
</form> 