<?php
global $woo_options;
global $woocommerce;
global $barberry_options;
?>

<?php if ( $barberry_options['tdl_sticky_menu'] ) { ?>
<div id="sticky-menu" class="clearfix">
    <div class="container clearfix">
                <div class="nav" id="navigation">
                     <?php navigation(); ?>
                </div>
                
<?php if ( !$barberry_options['tdl_catalog_mode'] ) { ?>     
       <?php 
			/**
			* Check if WooCommerce is active
			**/
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		?>          
 <div class="header_shopbag_container">               
	<div class="header_shopbag">
            	<span class="icon"></span>
            	<div class="overview">
					<?php echo $woocommerce->cart->get_cart_total(); ?>
					<span class="minicart_items"><?php echo $woocommerce->cart->cart_contents_count; ?> <?php echo sprintf(_n('item', 'items', $woocommerce->cart->cart_contents_count, 'tdl_framework'), $woocommerce->cart->cart_contents_count); ?></span>
				</div>
                
				<div class="tdl_minicart_wrapper">
                     <div class="tdl_minicart">
                     
                     <?php if (sizeof($woocommerce->cart->cart_contents)>0) :?>
                     	<div class="bag-items"><?php echo sprintf(_n('%d item in the shopping cart', '%d items in the shopping cart', $woocommerce->cart->cart_contents_count, 'tdl_framework'), $woocommerce->cart->cart_contents_count); ?></div>
                     <?php endif; ?>                                    
                                    
                                <?php                                    
                                echo '<ul class="cart_list">';                                        
                                    if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
                                    
                                        $_product = $cart_item['data'];                                            
                                        if ($_product->exists() && $cart_item['quantity']>0) :                                            
                                            echo '<li class="cart_list_product">';                                                
                                                echo '<a class="cart_list_product_img" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image().'</a>';                                                    
                                                echo '<div class="cart_list_product_title">';
                                                    $product_title = $_product->get_title();
                                                    //$short_product_title = (strlen($product_title) > 28) ? substr($product_title, 0, 25) . '...' : $product_title;
                                                    echo '<a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a>';
                                                    echo '<div class="cart_list_product_quantity">'.__('Quantity', 'woocommerce').': '.$cart_item['quantity'].'</div>';
                                                echo '</div>';
                                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
                                                echo '<div class="cart_list_product_price">'.woocommerce_price($_product->get_price()).'</div>';
                                                echo '<div class="clearfix"></div>';                                                
                                            echo '</li>';       
                                        endif;                                        
                                    endforeach;
									echo '</ul>';
                                    ?>
                                            
                                    <div class="minicart_total_checkout">                                        
                                        <?php _e('Cart Subtotal', 'woocommerce'); ?><span><?php echo $woocommerce->cart->get_cart_total(); ?></span>                                    </div>
                                    
                                    <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="button minicart_cart_but"><?php _e('View Cart', 'woocommerce'); ?></a>   
                                    
                                    <a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="button minicart_checkout_but"><?php _e('Checkout', 'woocommerce'); ?></a>
                                    <div class="clearfix"></div>
                                    <?php  
									echo '<ul>';                                    
                                    else: echo '<li class="empty">'.__('No products in the cart.','woocommerce').'</li>'; endif;                                  	echo '</ul>';                                    
                                ?>                                                                        
                
                                </div>
                            </div>                
              		</div> 
                
            </div>
            
                     <script type="text/javascript">// <![CDATA[
					jQuery(function(){
					  jQuery(".cart_list_product_title a").each(function(i){
						len=jQuery(this).text().length;
						if(len>35)
						{
						  jQuery(this).text(jQuery(this).text().substr(0,35)+'...');
						}
					  });
					});
					// ]]></script>           
            
            
 <?php } ?>                
<?php } ?>                 
                <div class="sticky-search-trigger">                
                    <a href="#"></a>                
                </div> 
                 
                <div class="sticky-search-area"> 

						<?php get_search_form( ); ?>
    
                    <div class="sticky-search-area-close">                    
                        <a href="#"></a>                    
                    </div>                
                </div>  
    </div>
</div>
<?php } ?>

    <div id="header">
    	<div class="container">
    	 <div class="header_box">
        	<div class="header_container">
            
            <?php if($barberry_options['tdl_topbar_text']) { ?>
            <div class="custominfo"><?php echo $barberry_options['tdl_topbar_text']; ?></div>
            <?php } ?>
            
            <div class="rightnav">
            
            

            <?php if (function_exists('icl_get_languages')) { ?>
				<div class="header-switch language-switch">
                <?php languages_list(); ?>
                </div>
			<?php } ?>



			<?php if ( has_nav_menu( 'secondary' ) ) : ?>
          		 <div class="header-switch nav-switch">		
                 <span class="current"><?php $title = $barberry_options['tdl_header_drop_title']; echo $title ?></span>
                 	<div class="header-dropdown">
                 		<ul>		
							<?php 
                            wp_nav_menu(array(
                                'theme_location' => 'secondary',
                                'container' =>false,
                                'menu_class' => '',
                                'echo' => true,
                                'items_wrap'      => '%3$s',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'depth' => 0,
                                'fallback_cb' => false,
								'walker' => new TDL_Menu_Right()
                            ));
                            ?>
                            
 <?php if ( is_user_logged_in() ) { ?>
						<li><a href="<?php echo get_site_url(); ?>/?<?php echo get_option('woocommerce_logout_endpoint'); ?>=true" class="logout_link"><?php _e('Logout', 'tdl_framework'); ?></a></li>
					<?php } ?>                           

                 		</ul></div>
                 </div>
			<?php endif; ?>
		</div>
            
            
 <?php if ( !$barberry_options['tdl_catalog_mode'] ) { ?>
       <?php 
			/**
			* Check if WooCommerce is active
			**/
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		?> 
 <div class="header_shopbag_container">               
	<div class="header_shopbag">
            	<span class="icon"></span>
            	<div class="overview">
					<?php echo $woocommerce->cart->get_cart_total(); ?>
					<span class="minicart_items"><?php echo $woocommerce->cart->cart_contents_count; ?> <?php echo sprintf(_n('item', 'items', $woocommerce->cart->cart_contents_count, 'tdl_framework'), $woocommerce->cart->cart_contents_count); ?></span>
				</div>
                
				<div class="tdl_minicart_wrapper">
                     <div class="tdl_minicart">
                     
                     <?php if (sizeof($woocommerce->cart->cart_contents)>0) :?>
                     	<div class="bag-items"><?php echo sprintf(_n('%d item in the shopping cart', '%d items in the shopping cart', $woocommerce->cart->cart_contents_count, 'tdl_framework'), $woocommerce->cart->cart_contents_count); ?></div>
                     <?php endif; ?>                                    
                                    
                                <?php                                    
                                echo '<ul class="cart_list">';                                        
                                    if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
                                    
                                        $_product = $cart_item['data'];                                            
                                        if ($_product->exists() && $cart_item['quantity']>0) :                                            
                                            echo '<li class="cart_list_product">';                                                
                                                echo '<a class="cart_list_product_img" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image().'</a>';                                                    
                                                echo '<div class="cart_list_product_title">';
                                                    $product_title = $_product->get_title();
                                                    //$short_product_title = (strlen($product_title) > 28) ? substr($product_title, 0, 25) . '...' : $product_title;
                                                    echo '<a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a>';
                                                    echo '<div class="cart_list_product_quantity">'.__('Quantity', 'woocommerce').': '.$cart_item['quantity'].'</div>';
                                                echo '</div>';
                                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
                                                echo '<div class="cart_list_product_price">'.woocommerce_price($_product->get_price()).'</div>';
                                                echo '<div class="clearfix"></div>';                                                
                                            echo '</li>';       
                                        endif;                                        
                                    endforeach;
									echo '</ul>';
                                    ?>
                                            
                                    <div class="minicart_total_checkout">                                        
                                        <?php _e('Cart Subtotal', 'woocommerce'); ?><span><?php echo $woocommerce->cart->get_cart_total(); ?></span>                                    </div>
                                    
                                    <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="button minicart_cart_but"><?php _e('View Cart', 'woocommerce'); ?></a>   
                                    
                                    <a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="button minicart_checkout_but"><?php _e('Checkout', 'woocommerce'); ?></a>
                                    <div class="clearfix"></div>
                                    <?php  
									echo '<ul>';                                    
                                    else: echo '<li class="empty">'.__('No products in the cart.','woocommerce').'</li>'; endif;                                  	echo '</ul>';                                    
                                ?>                                                                        
                
                                </div>
                            </div>                
              		</div> 
                
            </div>
                
                     <script type="text/javascript">// <![CDATA[
					jQuery(function(){
					  jQuery(".cart_list_product_title a").each(function(i){
						len=jQuery(this).text().length;
						if(len>35)
						{
						  jQuery(this).text(jQuery(this).text().substr(0,35)+'...');
						}
					  });
					});
					// ]]></script>               
                
            
 <?php } ?>           
 <?php } ?>           
            	<div class="header_search">
                    <div class="search-trigger">                
                        <a href="#"></a>                
                    </div>
                
                    <div class="search-area">
                    <?php get_search_form( ); ?>
                      
                        <div class="search-area-close">                    
                            <a href="#"></a>                    
                        </div>                
                    </div>
                </div>
            
            	            	
                <a href="<?php echo home_url(); ?>" class="logo"></a>
                
                <div class="mobile_navbox">
                <div class="nav" id="navigation">
                     <?php navigation(); ?>
                </div> 
                </div>
                
               <div class="clearfix"></div>
                
                
                
            </div>
        </div>
    </div>
  </div>