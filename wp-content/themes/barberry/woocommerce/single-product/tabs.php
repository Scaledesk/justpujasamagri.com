<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

// Get tabs
ob_start();

do_action('woocommerce_product_tabs');

$tabs = trim( ob_get_clean() );

if ( ! empty( $tabs ) ) : ?>
	

        <div class="woocommerce_tabs">
        	<div class="row">
            <div class="span3 tabs_left">
                <ul class="tabs">
                    <?php echo $tabs; ?>
                </ul>
            </div>
            <div class="span9 tabs_right">
                <?php do_action('woocommerce_product_tab_panels'); ?>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>


<?php endif; ?>