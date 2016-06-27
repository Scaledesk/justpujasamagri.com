<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */

global $product, $barberry_options, $wp_query;
 
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
$term_id = get_brands_term_by_product_id($product->id);
$attach_id = barberry_brands_thumbnail_id($term_id);
$image = wp_get_attachment_url($attach_id);
$term = get_term($term_id,'brands');


if ( ! empty( $tabs ) ) : ?>


        <div class="woocommerce-tabs <?php echo $barberry_options['tdl_product_info_style']; ?>">
        	<div class="row">
            <div class="span3 tabs_left">
                <ul class="tabs">
                    <?php foreach ( $tabs as $key => $tab ) : ?>        
                        <li class="<?php echo $key ?>_tab">
                            <a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
                        </li>        
                    <?php endforeach; ?>
                    
					<?php if(($term_id = get_brands_term_by_product_id($product->id)) > 0): ?>
					<li class="brand">
						<a href="#tab-brand"><?php _e( 'About', 'tdl_framework' ); ?> <?php echo $term->name;?></a>
					</li>
					<?php endif; ?>
                                    
				 <?php if($barberry_options['tdl_custom_tab'] == '1' ) : ?>
					<li class="custom_tab">
						<a href="#tab-custom"><?php echo $barberry_options['tdl_custom_tab_title']?></a>
					</li>
                <?php endif; ?>
                                   
                </ul>
            </div>
            <div class="span9 tabs_right">
				<?php foreach ( $tabs as $key => $tab ) : ?>        
                    <div class="panel entry-content" id="tab-<?php echo $key ?>">
                        <?php call_user_func( $tab['callback'], $key, $tab ) ?>
                    </div>        
                <?php endforeach; ?>
                
            	 <?php if(($term_id = get_brands_term_by_product_id($product->id)) > 0): ?>
                    <div class="panel entry-content brand-panel" id="tab-brand">
                    	<h2><?php _e( 'About', 'tdl_framework' ); ?> <?php echo $term->name;?></h2>
                        <div class="brand_logo"><img title="<?php echo $term->name?>" src="<?php echo $image?>"></div>
                    	<div class="brand_description">
                        <?php if($term->description) : ?>
							<p><?php echo $term->description; ?></p>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                        <a href="<?php echo get_term_link($term_id,'brands');?>" class="tdl-button medium"><?php _e( 'Show products', 'tdl_framework' ); ?> </a></div><div class="clearfix"></div>                        
                    </div>
                 <?php endif; ?>
             
                
				 <?php if($barberry_options['tdl_custom_tab'] == '1' ) : ?>                
                    <div class="panel entry-content" id="tab-custom">
                        <?php echo $barberry_options['tdl_custom_tab_content']; ?>
                    </div>
                <?php endif; ?>               
                
            </div>
          </div>

        </div>
<div class="clearfix"></div>

<?php endif; ?>