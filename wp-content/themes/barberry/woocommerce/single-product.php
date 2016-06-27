<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop');
global $barberry_options;
$product_sidebar = $barberry_options['tdl_spage_sidebar_listing'] ? $barberry_options['tdl_spage_sidebar_listing'] : 'fullwidth';
 ?>

<div class="container headerline"></div>        
<hr class="paddingbottom30" />

<div class="container fullwidth pside_<?php echo $product_sidebar; ?>">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

</div>

    

<?php get_footer('shop'); ?>