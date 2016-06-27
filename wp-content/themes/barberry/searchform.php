<form id="search" method="get" action="<?php echo home_url(); ?>">
      <input id="search-input" type="text" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php _e( 'Type &amp; Hit Enter', 'tdl_framework' ); ?>" name="s" />
      <?php 
      /**
      * Check if WooCommerce is active
      **/
      if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
      ?>
      <input type="hidden" name="post_type" value="product">
      <?php } ?>
</form> 


