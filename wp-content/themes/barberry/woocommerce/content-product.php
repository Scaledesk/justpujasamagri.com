<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop, $barberry_options;

$attachment_ids = $product->get_gallery_attachment_ids();

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

?>

	
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

        <li class="product_item <?php if ($barberry_options['tdl_product_animation']) { ?><?php echo $barberry_options['tdl_productanim_type']; ?> <?php } ?>">
			<div class="image_container">
        	<?php
			
			if ($product->is_on_sale()) {				
				woocommerce_get_template( 'loop/sale-flash.php' );		
			} 
				
				if ($barberry_options['tdl_newbadge']) {
			
					$postdate 		= get_the_time( 'Y-m-d' );			// Post date
					$postdatestamp 	= strtotime( $postdate );			// Timestamped post date
					$newness 		= $barberry_options['tdl_newbadge_date']; 	// Newness in days
		
				if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
						if ($product->is_on_sale()) {
							echo '<div class="newbadge_sale">' . __( 'New', 'tdl_framework' ) . '</div>';
						}
						else echo '<div class="newbadge">' . __( 'New', 'tdl_framework' ) . '</div>';
					}				
				}

			
			if (is_out_of_stock()) {
				echo '<div class="outstock">' . __( 'Out of Stock', 'tdl_framework' ) . '</div>';
			}

		?>
        
        <?php if( $barberry_options['tdl_star_listing']): ?>
			<?php woocommerce_get_template( 'loop/rating.php' );?>					
		<?php endif; ?> 
        
        
                <a class="prodimglink" href="<?php the_permalink(); ?>">

                    <div class="loop_product front"><?php echo get_the_post_thumbnail( $post->ID, 'shop_catalog') ?></div>
                    <?php if ($barberry_options['tdl_product_animation']) { ?>
                    
					<?php

						if ( $attachment_ids ) {
					
							$loop = 0;				
							
							foreach ( $attachment_ids as $attachment_id ) {
					
								$image_link = wp_get_attachment_url( $attachment_id );
					
								if ( ! $image_link )
									continue;
								
								$loop++;
								
								printf( '<div class="loop_products back">%s</div>', wp_get_attachment_image( $attachment_id, 'shop_catalog' ) );
								
								if ($loop == 1) break;
							
							}
					
						} else {
						?>
                        
                        <div class="loop_products back"><?php echo get_the_post_thumbnail( $post->ID, 'shop_catalog') ?></div>
                        
                        <?php
							
						}
					?>
                    
                    <?php } ?>
                    
                </a>
                
                <div class="clearfix"></div>
                
				<?php if ( in_array( 'jck_woo_quickview/jck_woo_quickview.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )  ) ) ) { ?> 
                    <div class="product_button_cont">
                        <div class="product_button">
<a class="button product_type_variable jck_quickview_button jckqvBtn" data-jckqvpid="<?php echo$post->ID; ?>"><?php _e('Quick View', 'tdl_framework');?></a>					
						</div>
                    </div>                   
                <?php } else { ?> 
					<?php if ( !$barberry_options['tdl_catalog_mode'] ) { ?> 
                    <div class="product_button_cont">
                        <div class="product_button"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
                    </div>
                    <?php } ?>                   
                <?php } ?>            

            </div>
            
            <div class="clearfix"></div>
            
            <div class="product_details">
             <?php if ( $barberry_options['tdl_category_listing']) { ?>
             <?php if ( $barberry_options['tdl_category_listing_first']) { ?>
	            <?php $product_cats = strip_tags($product->get_categories('|||', '', '')); //Categories without links separeted by ||| ?>
	            <p class="category"><a href="<?php the_permalink(); ?>"><?php list($firstpart) = explode('|||', $product_cats); echo $firstpart; ?></a></p>
             <?php } else { ?>
             	<?php
                $size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
                echo $product->get_categories( ', ', '<p class="category">' . _n( '', '', $size, 'woocommerce' ) . ' ', '</p>' );
                ?>
             <?php } ?>



            <?php } ?>
            
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            
            <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_price - 10
                 */
                 
                do_action( 'woocommerce_after_shop_loop_item_title' );
  
            ?>

                
            <div class="clearfix"></div>
            
	<?php if (in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>            
                <div class="product-actions"> 
                 <?php if (in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  { ?> 
                        <div class="action wishlist">
                            <?php
                                echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                            ?> 
                        </div>
                <?php } ?> 
                <?php if (in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  { ?> 
                        <div class="action compare">
                             <?php
                                echo do_shortcode('[yith_compare_button]');  
                             ?>                
                        </div> 
                <?php } ?>               
     
                    <div class="clearfix"></div>               
                       
                </div>               
    <?php endif; ?> 
 
           </div>
        </li>
