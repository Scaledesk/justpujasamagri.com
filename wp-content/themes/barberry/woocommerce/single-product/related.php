<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop, $carouselID, $barberry_options;

if ($barberry_options['tdl_product_related']) { 

$related = $product->get_related(12);

if ( sizeof($related) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> 12,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related,
	'post__not_in'			=> array($product->id)
) );

$products = new WP_Query( $args );

//$woocommerce_loop['columns'] = $columns;
$woocommerce_loop['columns'] = 4;

if ($carouselID == "") {
$carouselID = 1;
} else {
$carouselID++;
}

if ( $products->have_posts() ) : ?>

	<?php $sliderrandomid = rand() ?>
    
    <script>
	(function($){
		$(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: items_slider_UpdateSliderHeight,
			onSlideChange: items_slider_UpdateSliderHeight,
			onSliderResize: items_slider_UpdateSliderHeight
		});
		
		function items_slider_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

				setTimeout(function() {
					var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .product_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
					$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+20 }, 300);
				},300);
				
			}
		
		})
	})(jQuery);
	</script>
    
    <div class="<?php echo $barberry_options['tdl_product_related_no'] ?>">
    
        <div class="prod_slider items_slider_id_<?php echo $sliderrandomid ?>" data-columns="<?php echo $woocommerce_loop['columns']; ?>">
            
            <div class="items_sliders_header">
                <div class="items_sliders_title">
                    <div class="featured_section_title"><span><?php _e('Related Products', 'tdl_framework'); ?></span></div>
                    <div class="clearfix"></div>
                </div>
                <div class="items_sliders_nav">                        
                    <a class='big_arrow_right'></a>
                    <a class='big_arrow_left'></a>
                    <div class='clearfix'></div>
                </div>
            </div>
        
            <div class="items_slider_wrapper">
                <div class="items_slider">
                    <ul class="slider">
                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
        
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
            
                        <?php endwhile; // end of the loop. ?>
                    </ul>     
                </div>
            </div>
        
        </div>
    
    </div>

<?php endif; 
}
wp_reset_postdata();
