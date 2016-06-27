<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
?>

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
            
            
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && get_option( 'woocommerce_enable_sku' ) == 'yes' && $product->get_sku() ) : ?>
		<span itemprop="productID" class="sku_wrapper"><strong><?php _e( 'SKU:', 'tdl_framework' ); ?></strong>&nbsp;&nbsp;<span class="sku"><?php echo $product->get_sku(); ?></span></span>
	<?php endif; ?>

	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
		echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $size, 'tdl_framework' ) . '&nbsp;&nbsp;', '.</span>' );
	?>
    
    <?php if(($term_id = get_brands_term_by_product_id($product->id)) > 0): $term = get_term($term_id,'brands');?>
    <span class="brand"><strong><?php _e( 'Brand:', 'tdl_framework' ); ?></strong> <a href="<?php echo get_term_link($term_id,'brands');?>"><?php echo $term->name?></a></span>
    <?php endif; ?>

	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
		echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $size, 'tdl_framework' ) . '&nbsp;&nbsp;', '.</span>' );
	?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<div class="clearfix"></div>
    <div class="product_share"> 
        <span><?php _e('Share:', 'tdl_framework'); ?></span>   
                    <ul>    
                        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
			      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  class="product_share_facebook" target="_blank" title="<?php _e('Share on Facebook', 'tdl_framework'); ?>"></a></li>
                        <li><a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" onclick="javascript:window.open(this.href,
			      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  class="product_share_twitter" title="<?php _e('Tweet this item', 'tdl_framework'); ?>"></a></li> 
                         <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="product_share_google" onclick="javascript:window.open(this.href,
						      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php _e('Share on Google+', 'tdl_framework'); ?>"></a></li> 
                              
                         <li><a href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $src[0]; ?>&description=<?php the_title(); ?>" onclick="javascript:window.open(this.href,
			      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="product_share_pinterest"></a></li>                           

                        <li><a href="mailto:enteryour@addresshere.com?subject=<?php strip_tags(the_title()); ?>&body=<?php echo strip_tags(apply_filters( 'woocommerce_short_description', $post->post_excerpt )); ?> <?php the_permalink(); ?>" class="product_share_email"  title="<?php _e('Email a Friend', 'tdl_framework'); ?>"></a></li>
                  </ul>
        <div class="clearfix"></div>        
    </div>