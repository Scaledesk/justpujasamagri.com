<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 ) return;

$args = array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'posts_per_page' 		=> 12,
	'no_found_rows' 		=> 1,
	'orderby' 				=> 'rand',
	'post__in' 				=> $upsells
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>    
    
    <?php $sliderrandomid = rand() ?>
    
    <script>
	(function($){
		$(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			scrollbar: false,
			scrollbarHide: true,
			scrollbarLocation: 'bottom',
			scrollbarHeight: '2px',
			scrollbarBackground: '#ccc',
			scrollbarBorder: '0',
			scrollbarMargin: '0',
			scrollbarOpacity: '1',
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
    
    <div class="four_side">
    
        <div class="items_slider_id_<?php echo $sliderrandomid ?>">
            
            <div class="items_sliders_header">
                <div class="items_sliders_title">
                    <div class="featured_section_title"><span><?php _e('You may also like&hellip;', 'tdl_framework') ?></span></div><div class="clearfix"></div>
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

wp_reset_postdata();