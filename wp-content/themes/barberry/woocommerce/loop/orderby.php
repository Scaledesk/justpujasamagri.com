<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() )
	return;
?>


	<div class="perpage_cont">

			<?php
            $total   = $wp_query->found_posts;
			$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
			
			if (is_tax('product_cat')) {
				$product_category = $wp_query->query_vars['product_cat'];
				$product_category_link = get_term_link( $product_category, 'product_cat' );
				
				if ($product_category_link != "") {
				$shop_page_url = $product_category_link;
				} else {
				$shop_page_url = "";
				}
			}
			if ( ! woocommerce_products_will_display() )
			return;
            ?>

        	<span class="woocommerce-show-products"><?php echo _e("View", "tdl_framework"); ?></span>
            <ul>
                <li><a href="<?php echo $shop_page_url ?>?show_products=24">24</a></li>
                <li><a href="<?php echo $shop_page_url ?>?show_products=48">48</a></li>
                <li><a href="<?php echo $shop_page_url ?>?show_products=<?php echo $total;?>"><?php echo _e("All", "tdl_framework"); ?></a></li>
            </ul>
	</div>
 


    <form class="woocommerce-ordering" method="get">    
        <select name="orderby" class="orderby">
            <?php
                $catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
                    'menu_order' => __( 'Default sorting', 'tdl_framework' ),
                    'popularity' => __( 'Sort by popularity', 'tdl_framework' ),
                    'rating'     => __( 'Sort by average rating', 'tdl_framework' ),
                    'date'       => __( 'Sort by newness', 'tdl_framework' ),
                    'price'      => __( 'Sort by price: low to high', 'tdl_framework' ),
                    'price-desc' => __( 'Sort by price: high to low', 'tdl_framework' )
                ) );
    
                if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
                    unset( $catalog_orderby['rating'] );
    
                foreach ( $catalog_orderby as $id => $name )
                    echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
            ?>
        </select>
        <?php
            // Keep query string vars intact
            foreach ( $_GET as $key => $val ) {
                if ( 'orderby' == $key )
                    continue;
                echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
            }
        ?>
    </form>
