</div>

 <?php 
 global $barberry_options;
 $footer_logos = $barberry_options['tdl_footer_logos_off'];
 $number_of_widgets = $barberry_options['tdl_footer_layout'];
				
		if ( $number_of_widgets == 4 ) {
			$grid_class = "span3";
		} 
		else if ( $number_of_widgets == 3 ) {
			$grid_class = "span4";
		}
		else if ( $number_of_widgets == 2 ) {
			$grid_class = "span6";
		}		
		else if ( $number_of_widgets == 1 ) {
			$grid_class = "span12";
		}
	
?>

<footer id="copyright">
	<div class="container">

	<?php if( $number_of_widgets !== 'layout-off' ) { ?>
    <div class="footer_container"><div class="container widget_area"><div class="row">
    
    <?php if ( is_numeric($number_of_widgets) ): ?>
    <?php for ( $i = 1; $i <= $number_of_widgets; $i++ ) { ?>
    <section class="<?php echo $grid_class;?>">
    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer ' . $i ) ) ?>
    </section>
    <?php } // end foreach ?>
    <?php endif; ?>
    
    <?php if ( $number_of_widgets == 'footer-widgets-1-1-2' ) : ?>
    
    <section class="span3"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 1' ) ) ?></section>
    <section class="span3"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 2' ) ) ?></section>
    <section class="span6"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 3' ) ) ?></section>
    
    <?php endif; ?>
    
    <?php if ( $number_of_widgets == 'footer-widgets-1-2-1' ) : ?>
    
    <section class="span3"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 1' ) ) ?></section>
    <section class="span6"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 2' ) ) ?></section>
    <section class="span3"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 3' ) ) ?></section>
    
    <?php endif; ?>
    
    <?php if ( $number_of_widgets == 'footer-widgets-2-1-1' ) : ?>
    
    <section class="span6"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 1' ) ) ?></section>
    <section class="span3"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 2' ) ) ?></section>
    <section class="span3"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 3' ) ) ?></section>
    
    <?php endif; ?>
    
    </div></div></div>
    
    <?php } ?> 
 
 	<div class="footer_copyright">
        <div class="container"><div class="row"> 
            <?php if ( $footer_logos == '1' ) : ?>
                   <div class="span6 copytxt"><p><?php echo "Copyright © 2016 Justpujasamagri.com. All rights reserved."; ?></p></div>
		         
            <div class="span6 cards">
			<img src="<?php if ( !$barberry_options['tdl_footer_logos'] ) { ?><?php echo get_template_directory_uri(); ?>/images/payment_cards.png
                <?php } else echo $barberry_options['tdl_footer_logos']; ?>" alt="Payment Cards" />
            </div>
    		<?php else: ?>
          <div class="span6 copytxt"><p><?php echo "Copyright © 2016 Justpujasamagri.com. All rights reserved."; ?></p></div>     
            <?php endif; ?>
            
            
    	</div></div>
    </div>
 </div>	
</footer>
<div class="clearfix"></div>

<?php if ($barberry_options['tdl_totop']) { ?>
	<a class="go-top"></a>
<?php } ?>

</div>

    <div id="review_form_wrapper_overlay">
    	<div id="review_form_wrapper_overlay_close"><i class="fa fa-times"></i></div>
    </div>

<!-- Theme Hook -->
<?php wp_footer(); ?>
<!-- End Document -->

<?php echo $barberry_options['tdl_custom_js_footer']; ?>
</body>
</html>