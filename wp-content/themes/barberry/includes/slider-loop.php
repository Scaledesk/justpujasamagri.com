<?php get_template_part( 'includes/header','loop' ); ?>

		<script type="text/javascript">
	(function($){
	   $(window).load(function(){
				
				jQuery('.iosSlider').iosSlider({
					snapToChildren: true,
					desktopClickDrag: true,
					keyboardControls: true,
					autoSlide: <?php if (get_post_meta( get_the_ID(), 'tdl_page_slideshow', true ) == 1) {echo "true";} else {echo "false";}?>,
                    autoSlideTimer: <?php echo get_post_meta( get_the_ID(), 'tdl_page_slideshowSpeed', true ); ?>,
					navNextSelector: jQuery('.next'),
					navPrevSelector: jQuery('.prev'),
					navSlideSelector: jQuery('#selectors .item'),
					onSlideChange: slideChange,
					onSlideComplete: slideContentComplete,
					onSliderLoaded: slideContentLoaded,
				
				});
				
					
				
			function slideChange(args) {
				
				currentSlide = args.currentSlideNumber;		
				
				jQuery('#selectors .item').removeClass('selected');
				jQuery('#selectors .item:eq(' + (currentSlide - 1) + ')').addClass('selected');

				var obj = args.currentSlideObject;
                var slideNumber = obj.attr('data-img');
				jQuery('#header, #selectors').removeClass();
				jQuery('#header').addClass(slideNumber);
				jQuery('#selectors').addClass(slideNumber);

				
		function checkWidth() {
		var $window = $(window);
        var windowsize = $window.width();
        if (windowsize < 978) {
            //if the window is greater than 440px wide then turn on jScrollPane..
            jQuery('#header').removeClass();
			jQuery('#page_wrapper').removeClass('fullslider');


        }
		else {
            //if the window is greater than 440px wide then turn on jScrollPane..

			jQuery('#header').removeClass();
            jQuery('#header').addClass(slideNumber);
			jQuery('#page_wrapper').addClass('fullslider');
        }

    }
    // Execute on load
    checkWidth();

    // Bind event listener
    $(window).resize(checkWidth);
			
		
			}		
				function slideContentComplete(args) {
					
					if(!args.slideChanged) return false;					
					jQuery(args.sliderObject).find('.center .iostitle, .center .iostext, .right .iostitle, .left .iostitle, .right .iostext, .left .iostext').attr('style', '');					
					jQuery(args.currentSlideObject).find('.right .iostitle').animate({
						marginRight: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.left .iostitle').animate({
						marginLeft: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.center .iostitle').animate({
						opacity: '1'
					}, 400, 'easeOutQuint');										
					jQuery(args.currentSlideObject).find('.right .iostext').delay(300).animate({
						marginRight: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.left .iostext').delay(300).animate({
						marginLeft: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.center .iostext').delay(300).animate({
						opacity: '1'
					}, 400, 'easeOutQuint');					

				}
				
				function slideContentLoaded(args) {
					
					jQuery(args.sliderObject).find('.center .iostitle, .center .iostext, .right .iostitle, .left .iostitle, .right .iostext, .left .iostext').attr('style', '');					
					jQuery(args.currentSlideObject).find('.right .iostitle').animate({
						marginRight: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.left .iostitle').animate({
						marginLeft: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.center .iostitle').animate({
						opacity: '1'
					}, 400, 'easeOutQuint');										
					jQuery(args.currentSlideObject).find('.right .iostext').delay(300).animate({
						marginRight: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.left .iostext').delay(300).animate({
						marginLeft: '30px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					jQuery(args.currentSlideObject).find('.center .iostext').delay(300).animate({
						opacity: '1'
					}, 400, 'easeOutQuint');				
																		
					
					slideChange(args);
					
				}
				
		// Optimalisation: Store the references outside the event handler:

		})
	})(jQuery);
			

		</script> 
     
<div class="slidercontainer full-slider">
<div class="iosSlider">

<?php
$slideritems = is_numeric( get_post_meta(get_the_ID(), 'tdl_page_lslider_items', true) ) ? ceil( get_post_meta(get_the_ID(), 'tdl_page_lslider_items', true)) : 6 ;
$slidercats = wp_get_object_terms( get_the_ID(), 'slider-group' );
$slidercatlist = array();
$args = array( 'post_type' => 'slider', 'posts_per_page' => $slideritems );
if( count( $slidercats ) > 0 ) {
    foreach ( $slidercats as $slidercat) {
            $slidercatlist[] = $slidercat->slug;
            }
                    
$args['tax_query'] = array( array( 'taxonomy' => 'slider-group', 'field' => 'slug', 'terms' => $slidercatlist ) );}
$args['order'] = get_post_meta(get_the_ID(), 'tdl_page_lslider_order', true) ? get_post_meta(get_the_ID(), 'tdl_page_lslider_order', true) : 'DESC';
$args['orderby'] = get_post_meta(get_the_ID(), 'tdl_page_lslider_orderby', true) ? get_post_meta(get_the_ID(), 'tdl_page_lslider_orderby', true) : 'date';
                
$homeslider = new WP_Query( $args );
if( $homeslider->have_posts() ):
?>
  
	<!-- slider -->
	<div class="slider">
  
			<?php 
		    while ( $homeslider->have_posts() ) : $homeslider->the_post();
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			$thumb = tdl_resize( $thumb[0], 1600, 700, true, false );
			$thumbcolor = get_post_meta(get_the_ID(), 'tdl_slider_slide_style', true);
            $slideurl = get_post_meta(get_the_ID(), 'tdl_slider_button_url', true);
			$slideposition = get_post_meta(get_the_ID(), 'tdl_slider_caption_position', true);
			$slidecaption = strip_tags( get_post_meta(get_the_ID(), 'tdl_slider_caption', true) );					   
		   ?>           
  
			<div class="item" data-img="<?php echo $thumbcolor; ?>" style="background:url(<?php echo $thumb[0]; ?>) center center">
			<img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt=""/>
                
                    <div class="caption <?php echo $thumbcolor; ?> <?php echo $slideposition; ?>">
                    <div class="container navcont">
                        <h1 class="iostitle"><a href="<?php echo $slideurl; ?>"><?php echo the_title(); ?></a></h1>
                        <div class="clearfix"></div>
                        <div class="iostext"><?php echo $slidecaption; ?></div>

                    </div>
                </div>
            </div>          
           
 			<?php endwhile; ?> 
             
</div>            

                    
    <div class="selectorsBlock">

        <div id="selectors">
        	<div class="prev"></div>
                <?php 
				$i = 0; 
                while ( $homeslider->have_posts() ) : $homeslider->the_post();  
				if ( $i == 0 ) { $slide_num = 'first selected'; } else { $slide_num = ''; } 				 
               ?>                   
    
                <div class="item <?php echo $slide_num; ?>"></div>
                <?php $i++; endwhile; ?>
                <div class="next"></div>
        </div>
        
     

    </div>
</div>

</div>




<?php $i = 0; while ( $homeslider->have_posts() ) : $homeslider->the_post();  
	 if ( $i == 0 ) { $thumbcolor2 = get_post_meta(get_the_ID(), 'tdl_slider_slide_style', true); }  
               ?> <?php $i++; endwhile; ?>
			   
<?php endif; wp_reset_postdata(); ?> 